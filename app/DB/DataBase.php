<?php

namespace App\DB;

class DataBase
{
    protected $conn;
    public function __construct()
    {
        $this->conn = require __DIR__."/../../public/database/mysqli-procedural.php";
    }
    public function getConnection(){
        return $this->conn;
    }
    public function conInfo(){
       return [
           'host'     => 'localhost',
           'port'     => '3306',
           'username' => 'root',
           'password' => '',
           'database' => 'ecommerce'
        ];
    }

}