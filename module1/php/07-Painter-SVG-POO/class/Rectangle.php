<?php 

class Rectangle extends Shape {

    // Ici entre les accolades je suis à l'intérieur de la classe Rectangle


    // Constantes de classe : informations qui ont une valeur fixe pour tous les objets de la classe


    /**
     * Propriétés : caractéristiques de la classe / des objets
     * Visibilité : public / private
     *    - public : la propriété est accessible partout
     *    - private : la propriété est accessible UNIQUEMENT à l'intérieur de la classe
     * Depuis la version 7.4 de PHP il est possible de typer les propriétés
     * On peut donner directement ici une valeur par défaut aux propriétés
     */ 
    protected int $width; // = 10;
    protected int $height;
    

    /**
     * Constructeur 
     * C'est une méthode "magique" : elle est appelée automatiquement par PHP 
     * Le constructeur est appelé lors de la création de l'objet (new ...)
     * On utilise le constructeur pour initialiser l'objet
     * Le constructeur peut prendre des paramètres
     */
    public function __construct()
    {
        // Appel explicite du constructeur du parent que est surchargé pa rla classe Rectangle
        parent::__construct();

        $this->width = 100;
        $this->height = 50;
    }

    /**
     * Setter pour les dimensions du rectangle
     */
    public function setSize(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Génère le code SVG du rectangle
     */
    public function draw(): string
    {
        // $svg = '<rect x="'.$this->x.'" y="'.$this->y.'" width="'.$this->width.'" height="'.$this->height.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';

        // return $svg;

        return genTag('rect', [
            'x' => $this->location->getX(),
            'y' => $this->location->getY(),
            'width' => $this->width,
            'height' => $this->height,
            'fill' => $this->color,
            'opacity' => $this->opacity
        ]);
    }

    /**
     * Getter ("accesseur") pour la propriété $width
     * Les méthodes possèdent comme les propriétés une visibilité, par défaut les méthodes sont public
     */
    // public function getWidth(): ?int
    // {
    //     return $this->width;
    // }

    /**
     * Setter ("mutateur") pour la propriété $width
     */
    // public function setWidth(int $width)
    // {
    //     $this->width = $width;
    // }
}



// Ici je suis à l'extérieur de la classe Rectangle