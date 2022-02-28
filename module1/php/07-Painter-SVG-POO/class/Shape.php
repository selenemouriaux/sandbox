<?php 

/**
 * Class abstraite : on ne peut pas l'instancier, on ne peut pas créer d'objet avec
 * Elle ne sert que de modèle pour les classes qui en héritent
 */
abstract class Shape {

    // protected int $x;
    // protected int $y;
    protected Point $location;
    protected string $color;
    protected float $opacity;

    // Méthode abstraite : les classes enfant sont obligées de l'implémenter
    abstract public function draw(): string;

    public function __construct()
    {
        // $this->x = 0;
        // $this->y = 0;
        $this->location = new Point();
        $this->color = 'black';
        $this->opacity = 1;
    }

    /**
     * Setter pour la position du rectangle
     */
    public function setLocation(int $x, int $y)
    {
        // $this->x = $x;
        // $this->y = $y;
        $this->location->setXY($x, $y);
    }

    /**
     * Setter pour le remplissage du rectangle
     */
    public function setFill(string $color, float $opacity)
    {
        $this->color = $color;
        $this->opacity = $opacity;
    }
}