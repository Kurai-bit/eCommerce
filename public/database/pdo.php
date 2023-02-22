<?php
$logInfo = include_once '../../config.php';
$server = $logInfo['database']['url'];
$username = $logInfo['database']['user'];
$password = $logInfo['database']['password'];
$db = $logInfo['database']['name'];
try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "INSERT INTO users (first_name,last_name,email,address,phone,password,confirmed,token)
//    VALUES ('sandu','popovici','sandu@email.com',null,'09874333162','123456789',true,'hskdh91872973198sa35asdvudaskb55sbdkkasbd')";
    $sql =
    // use exec() because no results are returned
//    echo "New record created successfully";
    $stmt = $conn->prepare("SELECT id, first_name, last_name FROM users");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        echo $row['id']." ".$row['first_name']." ".
        $row['last_name']."<br>";
          }
//    $conn->exec($rows);
} catch(PDOException $e) {
    echo $stmt . "<br>" . $e->getMessage();
}