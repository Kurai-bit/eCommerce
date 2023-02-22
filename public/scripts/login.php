<?php
//if (!isset($logInfo)){
//    $logInfo = include_once '../../config.php';
//}
//session_start();
//if(!empty($_POST['password']) and !empty($_POST['email'])){
//    $conn = mysqli_connect($logInfo['database']['url'], $logInfo['database']['user'], $logInfo['database']['password'], $logInfo['database']['name']);
//    $sql = "SELECT email, password FROM users where email = '".$_POST['email']."'";
//    if (!$conn) {
//        die("Connection failed: " .
//            mysqli_connect_error());
//    }
//    echo "Connected successfully"."<br>" ;
//
//    $result = mysqli_query($conn, $sql);
//    $row = mysqli_fetch_assoc($result);
//
//    if ($row['password'] == md5($_POST['password'])){
//        setcookie("user", $_POST['email'],time()+3600,'/');
//        header("Location: ../index.php");
//    }
//    else{
//        header("Location: ../login-form.php");
//        // TODO message for incorrect password!!
//    }
//
//
//    mysqli_close($conn);
//}
//else{
//    header("Location: ../login-form.php");
//}