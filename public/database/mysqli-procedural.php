<?php
$logInfo = include  __DIR__ . '/../../config.php';

$port = $logInfo['database']['port'];
$server = $logInfo['database']['url'];
$username = $logInfo['database']['user'];
$password = $logInfo['database']['password'];
$db = $logInfo['database']['name'];

$conn = mysqli_connect($server, $username, $password, $db, $port);

if (!$conn) {
    die("Connection failed: " .
        mysqli_connect_error());
}
return $conn;
//
////$sql = "INSERT INTO users (first_name,last_name,email,address,phone,password,confirmed,token)
////VALUES ('mihaela','petricele','mihaela@email.com',null,'09874635162','123456789',true,'hskdhakhdkjahskjdkasucbmnbskhasiudaskbmnasbdkkasbd')";
//$sql = "SELECT id, first_name, last_name FROM users";
//$result = mysqli_query($conn, $sql);
////if (mysqli_query($conn, $sql)) {
////    echo "New record created successfully";
////} else {
////    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
////}
//
//if (mysqli_num_rows($result) > 0) {
//    // output data of each row
//    while($row = mysqli_fetch_assoc($result)) {
//        echo "id: " . $row["id"]. " - Name: " .
//            $row["first_name"]. " " . $row["last_name"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}
//
mysqli_close($conn);