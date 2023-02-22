<?php

namespace oop;
//class Shape
//{
//    public $color ;
//    public $L;
//    public $W;
//
//    public function __construct($L,$W){
//        $this->L = $L;
//        $this->W = $W;
//    }
//
//    function calculateArea(){
//        return $this->L * $this->W;
//    }
//    function calculateLength(){
//        return $this->L*2 + $this->W*2;
//    }
//    function setColor($color){
//        $this->color = $color;
//    }
//    private function setColor($color){
//        $this->color = $color;
//    }
//    protected function setColor($color){
//        $this->color = $color;
//    }
//    function getColor(){
//       return$this->color;
//    }
//}

abstract class Shape{
    public $color;
    const DOMAIN = "mathematics";
    static public $subdomain = "geometry";

    static public function getUsage(){
        echo static::DOMAIN." ";
        echo self::$subdomain;
    }

    abstract public function calculateArea();
    abstract public function calculateLength();

}

