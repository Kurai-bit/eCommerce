<?php

use Jenssegers\Blade\Blade;
require_once '../../vendor/autoload.php';
use App\cart\Cart;

if (isset($_COOKIE['user']) and !empty($_COOKIE['user'])){
    session_start();

    $cart = unserialize($_SESSION['Cart']);
    if (isset($_SESSION['Cart']) and empty($_SESSION['Cart'])) {
        echo "CART IS EMPTY" . "<br>";
    } else {
        $cart->checkout();
    }
}
else{
    header("Location: login.php");
}
