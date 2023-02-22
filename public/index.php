<?php

require_once '../vendor/autoload.php';
session_start();

$request = new App\Core\Request();

$app = new App\Core\Application();

$app->handle($request);

//
//use Jenssegers\Blade\Blade;
//
//if (isset($_COOKIE['user']) and !empty($_COOKIE['user'])) {
////    require_once '../vendor/autoload.php';
//
//    setcookie("time", date("Y-m-d-s"));
//
//
//    require_once '../helpers.php';
//
//    $products = require_once '../data/products.php';
//
//
//    $blade = new Blade(basePath() . '/views', appPath() . '/cache');
//
////TODO - do your sorting stuff here - would be nice to include some files with functions and here just call them
////TODO - so this file can remain clean and easy to read
//
//    //prima ini
//    if (!isset($_SESSION['Cart'])) {
//        $_SESSION['Cart'] = serialize(new \App\cart\Cart());
//    }
//    function sortArr($product1, $product2)
//    {
//        if ($_SESSION[$_GET['sort']]['dir']) {
//            return ($product1[$_GET['sort']] < $product2[$_GET['sort']]) ? -1 : 1;
//        } else {
//            return ($product1[$_GET['sort']] < $product2[$_GET['sort']]) ? 1 : -1;
//        }
//
//    }
//
//    if (isset($_GET['sort'])) {
//        if (!isset($_SESSION[$_GET['sort']]['dir'])) {
//            $_SESSION[$_GET['sort']]['dir'] = true;
//        }
//        usort($products, "sortArr");
//        $_SESSION[$_GET['sort']]['dir'] = !$_SESSION[$_GET['sort']]['dir'];
//
//    }
//    echo $blade->render('products/list', [
//        'username' => 'andrei.test',
//        'firstName' => 'Andrei',
//        'lastName' => 'Arba',
//        'products' => $products
//    ]);
//} else {
//    header("Location: /login");
//}
