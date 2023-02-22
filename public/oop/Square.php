<?php

namespace oop;

require("Rectangle.php");

class Square extends Rectangle
{
    public function __construct($size)
    {
        parent::__construct($size);
    }

    public function calculateArea()
    {
        return pow($this->size[0],2);
    }
}