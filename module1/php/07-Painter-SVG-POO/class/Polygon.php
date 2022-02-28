<?php 

class Polygon extends Shape {

    protected array $points;  

    public function construct()
    {
        parent::__construct();

        $this->points = [];
    }

    /**
     * Setter pour les coordonnées des points du polygone
     */
    public function setPoints(array $points)
    {
        $this->points = $points;
    }

    public function draw(): string
    {
        return genTag('polygon', [
            'points' => implode(' ', $this->points),
            'fill' => $this->color,
            'opacity' => $this->opacity
        ]);
    }
}