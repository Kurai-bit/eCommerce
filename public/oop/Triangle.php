<?php

namespace oop;

//require("../oop/Polygon.php");


class Triangle extends Polygon
{
    static public $subdomain = "3 side polygon";
    public function __construct($size)
    {
        parent::__construct($size);
    }

    public function calculateArea()
    {
        $semiper = array_sum($this->size)/2;
        $a = $semiper - $this->size[0];
        $b = $semiper - $this->size[1];
        $c = $semiper - $this->size[2];
        return sqrt($semiper*$a*$b*$c);
    }
}