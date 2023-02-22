<?php

namespace App\Controllers;

use App\DB\DataBase;

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

class DashboardController extends BaseController implements DashboardInterface
{
    public function renderAdmin()
    {
        $this->bladeResponse([], "admin");

    }

    public function getCategories()
    {
        $db = new DataBase();
        $conn = $db->conInfo();
        $dt = new Datatables(new MySQL($conn));

        $dt->query('SELECT id, name, description FROM category');
        $dt->add("actions", function ($row) {
            return "<a class='btn_view' href='/view/{$row['id']}'>View</a>" . "<a href='/edit/{$row['id']}' class='control_button_a'>Edit</a>" . "<button onclick='deleteCategory(this)' style='cursor: pointer;' class='control_button'>Delete</button>";
        });
        echo $dt->generate();
    }


    public function index()
    {

        $this->bladeResponse([], "categories");
    }

    public function renderDashboard($id)
    {
        $this->bladeResponse(["id"=>$id], "dashboard");
    }

    public function show($id)
    {
        $db = new DataBase();
        $conn = $db->conInfo();
        $dt = new Datatables(new MySQL($conn));
        $dt->query('SELECT id, name, description FROM products WHERE category_id ='.$id);
        $dt->add("actions", function ($row) {
            return"<a href='/edit/{$row['id']}' class='control_button_a'>Edit</a>" . "<button onclick='deleteCategory(this)' class='control_button'>Delete</button>";
        });
        echo $dt->generate();
    }

    public function create()
    {
        $this->bladeResponse([], "createCategory");
    }

    public function store()
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "INSERT INTO category (id,name,description) VALUES (NULL" . ",'" . $_POST['name'] . "','" . $_POST['description'] . "') ";
        mysqli_query($conn, $sql);
        header("Location: /categories");
    }

    public function edit($id)
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "SELECT id, name, description FROM category WHERE id={$id}";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);

        $this->bladeResponse(["name" => $data['name'], "description" => $data['description'], "id" => $id], "editCategory");
    }

    public function update($id)
    {
        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "UPDATE category SET name = '" . $_POST['name'] . "'" . "," . "description = " . "'" . $_POST['newDescription'] . "'" . " WHERE id = '" . $id . "'";
        mysqli_query($conn, $sql);
        header("Location: /categories");
    }

    public function delete($id)
    {

        $db = new DataBase();
        $conn = $db->getConnection();
        $sql = "DELETE FROM category WHERE id = {$id}";
        mysqli_query($conn, $sql);
        $this->jsonResponse([]);
    }
}