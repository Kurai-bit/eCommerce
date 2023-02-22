<?php

namespace App\Controllers;

use App\DB\DataBase;
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

class ProductsController extends BaseController implements DashboardInterface
{

    public function getProducts()
    {
        $db = new DataBase();
        $conn = $db->conInfo();
        $dt = new Datatables(new MySQL($conn));

        $dt->query('SELECT id, name,price, units, description FROM products');
        $dt->add("actions", function ($row) {
            return "<a href='/editproducts/{$row['id']}' class='control_button_a'>Edit</a>" . "<button onclick='deleteProducts(this)' style='cursor: pointer;' class='control_button'>Delete</button>";
        });
        echo $dt->generate();
    }

    public function index()
    {
        $this->bladeResponse([], "productsDashboard");
    }

    public function show($id)
    {

    }

    public function create()
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "SELECT id, name FROM category";
        $result = mysqli_query($conn, $sql);
        while ($row=mysqli_fetch_row($result)){
            $data[$row[0]] = $row[1];
        }

        $this->bladeResponse(["data" => $data],"addProducts");
    }

    public function store()
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "INSERT INTO products (id, name, price, units, description, category_id) VALUES (null,'{$_POST['name']}', {$_POST['price']}, {$_POST['units']}, '{$_POST['description']}', {$_POST['category']})";
        mysqli_query($conn, $sql);
        header("Location: /products");
    }

    public function edit($id)
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "SELECT id, name, description,price,units,category_id FROM products WHERE id={$id}";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);

        $sql = "SELECT name FROM category WHERE id={$data['category_id']}";
        $result1 = mysqli_query($conn, $sql);
        $data1 = mysqli_fetch_assoc($result1);

        $this->bladeResponse(["name" => $data['name'], "description" => $data['description'], "price" => $data['price'], "units" => $data['units'],"category"=>$data1['name'], "id" => $id], "editProduct");
    }

    public function update($id)
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "UPDATE products SET name = '{$_POST['name']}', description = '{$_POST['newDescription']}', price = '{$_POST['price']}', units = '{$_POST['units']}' WHERE id = {$id}";
        mysqli_query($conn, $sql);
        header("Location: /products");
    }

    public function delete($id)
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "DELETE FROM products WHERE id = {$id}";
        mysqli_query($conn, $sql);
        $this->jsonResponse([]);
    }
}