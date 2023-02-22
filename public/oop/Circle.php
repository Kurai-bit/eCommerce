<?php

namespace oop;

require("../oop/Shape.php");

class Circle extends Shape
{
    public $radius;
    public $pi = 3.14159265359;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        return $this->radius*$this->radius * $this->pi;
    }
    public function calculateLength()
    {
        return 2*$this->pi * $this->radius;
    }
}