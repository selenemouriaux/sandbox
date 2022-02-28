<?php 

class Point {

    private int $x;
    private int $y;

    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
    }

    public function setXY(int $x, int $y) 
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }
}