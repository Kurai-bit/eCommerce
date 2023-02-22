<?php
if (!isset($logInfo)) {
    $logInfo = include_once '../../config.php';
}

if (!empty($_POST['last_name']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['phone'])) {
    $conn = mysqli_connect($logInfo['database']['url'], $logInfo['database']['user'], $logInfo['database']['password'], $logInfo['database']['name']);
    $sql = "SELECT email FROM users where email = '" . $_POST['email'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $regex = "/^([a-zA-Z0-9.]+@+[a-zA-Z]+(.)+[a-zA-Z]{2,3})$/";
    if (preg_match($regex, $_POST['email'])) {
        echo "Mail is valid"."<br>";
        if (isset($row['email'])) {
            if ($row['email'] == $_POST['email']) {
                $errorMessage = "cont existent";
                echo $errorMessage;
                die();
            }
        }
        if (empty($_POST['first_name'])) {
            $first_name = null;
        } else {
            $first_name = $_POST['first_name'];
        }
        $sql = "INSERT INTO users (first_name,last_name,email,address,phone,password,confirmed,token)
        VALUES (" . "'" . $first_name . "'" . "," . "'" . $_POST['last_name'] . "'" . "," . "'" . $_POST['email'] . "'" . "," . "'" . $_POST['address'] . "'" . "," . "'" . $_POST['phone'] . "'" . "," . "'" . md5($_POST['password']) . "'" . "," . 0 . "," . "'" . null . "'" . ");";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            $tokenString = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz";
            $token = "";
            for ($i = 0; $i < 16; $i++) {
                $token = $token . substr(str_shuffle($tokenString), 0, 8);
            }
            $sql = "UPDATE `users` SET `token` = '" . $token . "'" . "WHERE `users`.email = '" . $_POST['email'] . "'";
            if (mysqli_query($conn, $sql)) {
                echo nl2br("\n\nToken update success");

                //TODO email colnfirmation !!
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else{
        echo "Mail is not valid"."<br>";
    }
    mysqli_close($conn);

} else {
    header("Location: ../register-form.php");
}



