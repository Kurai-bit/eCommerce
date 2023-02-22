<?php

namespace App\Controllers;
use App\cart\Cart;
class CartController extends BaseController
{
    public function cartRender(){
        if (!isset($_SESSION['Cart'])){
            $_SESSION['Cart'] = serialize(new Cart);
        }
        $Cart = unserialize($_SESSION['Cart']);
        $products = $Cart->getCart();

        $this->bladeResponse(["products"=>$products['products'], "sum" => $products['priceSum'], "totalProdInCart"=>$products['totalCartAmount']],"cart");
    }
    public function addToCart(){
        if (!isset($_SESSION['Cart'])){
            $_SESSION['Cart'] = serialize(new Cart);
        }
        $Cart = unserialize($_SESSION['Cart']);
        if (isset($_POST['id'])){
            $Cart->addProduct($_POST['id']);
            $Cart->addCart($_POST['id']);
        }
        $_SESSION['Cart'] = serialize($Cart);
    }
    public function cartControls(){
        $cart = unserialize($_SESSION['Cart']);
        if (empty($cart)){
            $products=[];
            $sum = 0;
            $totalProd = 0;
            $totalProdInCart = 0;
        }else{
            $products = $cart->getCart()['products'];
            $sum = $cart->getCart()['priceSum'];
            $totalProdInCart = $cart->getCart()['totalCartAmount'];

        }

        foreach ( array_keys($products) as $product) {
        }

        if (isset($_POST['control'])) {
            $cart->changeUnits($_POST['id'],$_POST['control']);
            $cart->removeProduct($_POST['id'],$_POST['control']);
            $_SESSION['Cart'] = serialize($cart);
            $cart = unserialize($_SESSION['Cart']);

            http_response_code(200);
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            echo json_encode([$cart->getCart()['units'],$cart->getCart()['priceSum'], $cart->getCart()['totalCartAmount'],$_POST['id']]);
            exit;
        }
        $this->bladeResponse(['products' => $products,
                                "sum" => $sum,
                                "totalProdInCart"=>$totalProdInCart,],"cart");
    }

}