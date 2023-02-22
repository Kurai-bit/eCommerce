<?php

namespace App\cart;

use App\DB\DataBase;

//use function Symfony\Component\Translation\t;

class Cart implements Cartinterface
{
    protected $cartSum;
    protected $totalCartAmount;
    protected $cartProd; // array
    protected $elemUnits;

    public function __construct()
    {
        $this->cartProd = [];
        $this->totalCartAmount = 0;
        $this->cartSum = 0;
        $this->elemUnits = 0;
    }

    public function getCart()
    {
        return ['products' => $this->cartProd,
            "priceSum" => $this->cartSum,
            "totalCartAmount" => $this->totalCartAmount,
            "units" => $this->elemUnits];

    }

    public function checkout()
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        foreach (array_keys($this->cartProd) as $pid) {
            $sql = "SELECT units FROM products where id = " . $pid;
            $result = mysqli_query($conn, $sql);
            $amo = mysqli_fetch_assoc($result);
            if ($amo['units'] >= $this->cartProd[$pid]["units"]) {
                $sql = "SELECT id FROM users where email = '" . htmlspecialchars($_COOKIE['user']) . "'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);//row=2;
                $sql = "INSERT INTO `_order` (user_id, total_price)
                    VALUES (" . $row['id'] . "," . $this->cartSum . ");";
                if (mysqli_query($conn, $sql)) {
                    echo "Comanda realizata cu succes!!";
                    $lastid = mysqli_insert_id($conn);
                } else {
                    echo "esuat";
                }
                $sql = "SELECT id FROM `_order` where user_id = " . $row['id'];
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);//row=1;
                $sql = "INSERT INTO `order_items` (product_id,order_id,units)
            VALUES (" . $pid . "," . $lastid . "," . $this->elemUnits . ");";
                mysqli_query($conn, $sql);
                $newAmount = $amo['units']-$this->elemUnits;
                $sql = "UPDATE `products` SET `units` = '".$newAmount."'"." WHERE `id` = ".$pid;
                mysqli_query($conn,$sql);
            }
            else {
                echo "Amount of '" . $pid['name'] . "'" . " is " . $amo['units'] . ", your amount is " .$this->elemUnits."<br>";
            }
        }
    }

    public function addCart($id)
    {
        echo "awasdw";
        $this->cartSum += $this->cartProd[$id]['price'];
        $this->totalCartAmount += $this->cartProd[$id]['units'];
    }

    public function addProduct($id)
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM products WHERE id ='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $this->cartProd[$id] = ["name" => $row['name'],
            "price" => $row["price"],
            "units" => 1,
            "description" => $row['description']];
    }

    public function removeProduct($id, $control)
    {
        if ($control == "del") {
            $this->totalCartAmount -= $this->cartProd[$id]['units'];
            $this->cartSum -= $this->cartProd[$id]['price'] * $this->cartProd[$id]['units'];
            $this->cartProd[$id]['units'] = 0;
            unset($this->cartProd[$id]);

        }
    }

    public function changeUnits($id, $control)
    {
        if ($control == "+") {
            $this->totalCartAmount += 1;
            $this->cartProd[$id]['units'] += 1;
            $this->cartSum += $this->cartProd[$id]['price'];
            $this->elemUnits = $this->cartProd[$id]["units"];

        }
        if ($control == "-") {
            $this->totalCartAmount -= 1;
            $this->cartProd[$id]['units'] -= 1;
            $this->cartSum -= $this->cartProd[$id]['price'];
            $this->elemUnits = $this->cartProd[$id]["units"];
            if ($this->elemUnits == 0) {
                $this->totalCartAmount -= $this->cartProd[$id]['units'];
                $this->cartSum -= $this->cartProd[$id]['price'] * $this->cartProd[$id]['units'];
                $this->cartProd[$id]['units'] = 0;
                unset($this->cartProd[$id]);
            }
        }

    }
}