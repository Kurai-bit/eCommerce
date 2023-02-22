<?php
$logInfo = include_once '../../config.php';

$server = $logInfo['database']['url'];
$username = $logInfo['database']['user'];
$password = $logInfo['database']['password'];
$db = $logInfo['database']['name'];

$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"."<br>";

//$sql = "INSERT INTO users (first_name,last_name,email,address,phone,password,confirmed,token)
//VALUES ('gabriela','torsza','gabriela@email.com',null,'09101230321','123456789',true,'hfijfncijfnjaa9871jsj937sjr9ddd3sdl')";

//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

$sql = "SELECT id, first_name, last_name FROM users";
$result = $conn->query($sql); //OO
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " .
            $row["first_name"]. " " . $row["last_name"]. "<br>";
    }
} else {
    echo "noresults";
}

$conn->close();