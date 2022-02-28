<?php 

class Ellipse extends Shape {

    /**
     * Propriétés : caractéristiques de la classe / des objets
     * Visibilité : public / private
     *    - public : la propriété est accessible partout
     *    - private : la propriété est accessible UNIQUEMENT à l'intérieur de la classe
     * Depuis la version 7.4 de PHP il est possible de typer les propriétés
     * On peut donner directement ici une valeur par défaut aux propriétés
     */ 
    protected int $xRadius; 
    protected int $yRadius;

    /**
     * Constructeur 
     * C'est une méthode "magique" : elle est appelée automatiquement par PHP 
     * Le constructeur est appelé lors de la création de l'objet (new ...)
     * On utilise le constructeur pour initialiser l'objet
     * Le constructeur peut prendre des paramètres
     */
    public function __construct()
    {
        parent::__construct();

        $this->xRadius = 100;
        $this->yRadius = 50;
    }

    /**
     * Setter pour les dimensions des rayons de l'ellipse
     */
    public function setRadius(int $xRadius, int $yRadius)
    {
        $this->xRadius = $xRadius;
        $this->yRadius = $yRadius;
    }

    /**
     * Génère le code SVG du rectangle
     */
    public function draw(): string
    {
        // $svg = '<ellipse cx="'.$this->cx.'" cy="'.$this->cy.'" rx="'.$this->xRadius.'" ry="'.$this->yRadius.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';

        // return $svg;

        return genTag('ellipse', [
            'cx' => $this->location->getX(),
            'cy' => $this->location->getY(),
            'rx' => $this->xRadius,
            'ry' => $this->yRadius,
            'fill' => $this->color,
            'opacity' => $this->opacity
        ]);
    }
}



// Ici je suis à l'extérieur de la classe Rectangle