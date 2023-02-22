<?php

namespace App\Controllers;

use App\DB\DataBase;

class LoginController extends BaseController
{
    public function renderLogin()
    {
        if (isset($_COOKIE['user'])) {
            $this->renderHome();
        }
        $this->bladeResponse([], "login-form");
    }

    public function login()
    {
        if (!empty($_POST['password']) and !empty($_POST['email'])) {
            $db = new DataBase();
            $conn = $db->getConnection();
            $sql = "SELECT email, password FROM users where email = '" . $_POST['email'] . "'";
            if (!$conn) {
                die("Connection failed: " .
                    mysqli_connect_error());
            }
            echo "Connected successfully" . "<br>";

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if ($row['password'] == md5($_POST['password'])) {
                setcookie("user", $_POST['email'], time() + 3600, '/');
                $this->renderHome();
            } else {
                // TODO message for incorrect password!!
            }
            mysqli_close($conn);
        } else {

        }
    }

    public function renderHome()
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM `products`";
        $result = mysqli_query($conn, $sql);
        mysqli_num_rows($result);
        $data=[];
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        $this->bladeResponse(["data"=>$data], "products/list");

    }

}