<?php
//
//use Jenssegers\Blade\Blade;
//
//
//if (isset($_COOKIE['user']) and !empty($_COOKIE['user'])) {
//    require_once '../vendor/autoload.php';
//
//
//    session_start();
//
//
//    require_once '../helpers.php';
//    $cart = unserialize($_SESSION['Cart']);
//    if (empty($cart)){
//        $products=[];
//        $sum = 0;
//        $totalProd = 0;
//        $totalProdInCart = 0;
//    }else{
//        $products = $cart->getCart()['products'];
//        $sum = $cart->getCart()['priceSum'];
//        $totalProdInCart = $cart->getCart()['totalCartAmount'];
//
//    }
//
//    foreach ( array_keys($products) as $product) {
//    }
//
//    if (isset($_POST['control'])) {
//        $cart->changeUnits($_POST['id'],$_POST['control']);
//        $cart->removeProduct($_POST['id'],$_POST['control']);
//        $_SESSION['Cart'] = serialize($cart);
//        $cart = unserialize($_SESSION['Cart']);
//
//        http_response_code(200);
//        header('Access-Control-Allow-Origin: *');
//        header('Content-Type: application/json');
//        echo json_encode([$cart->getCart()['units'],$cart->getCart()['priceSum'], $cart->getCart()['totalCartAmount'],$_POST['id']]);
//        exit;
//    }
//
//    $blade = new Blade(basePath() . '/views', appPath() . '/cache');
//
//    echo $blade->render("Cart", ['products' => $products,
//                            "sum" => $sum,
//                            "totalProdInCart"=>$totalProdInCart]);
//} else {
//    header("Location: scripts/login.php");
//}
//
//
//
