<?php

namespace App\cart;

interface Cartinterface
{
    public function addCart($id);
    public function getCart();
    public function checkout();
    public function addProduct($id);
    public function removeProduct($id,$control);
    public function changeUnits($id,$control);
}