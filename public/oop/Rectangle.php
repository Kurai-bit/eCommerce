<?php

namespace oop;

require("../oop/Polygon.php");

 class Rectangle extends Polygon
{
     public function __construct($size)
    {
        parent::__construct($size);
    }

    public function calculateArea()
    {
       return $this->size[0] * $this->size[1];
    }
}