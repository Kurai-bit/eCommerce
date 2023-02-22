<?php

namespace oop;

require("../oop/Shape.php");


abstract class Polygon extends Shape
{
    public $size;

    public function __construct($size){
        $this->size = $size;
    }

    abstract public function calculateArea();
    public function calculateLength(){
        return array_sum($this->size);
    }
}