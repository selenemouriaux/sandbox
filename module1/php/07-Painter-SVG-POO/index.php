<?php

//////////////////////////////
// Inclusion des dépendances /
//////////////////////////////
require 'functions.php';
// require 'Point.php';
// require 'Shape.php';
// require 'Rectangle.php';
// require 'Square.php';
// require 'Ellipse.php';
// require 'Circle.php';
// require 'Polygon.php';
// require 'Triangle.php';

// Autoloader
spl_autoload_register('autoload');

function autoload(string $classname)
{
    require 'class/' . $classname . '.php';
}

///////////////////////
// Traitement PHP ici /
///////////////////////


// Création des objets de formes géométriques
$rectangle = new Rectangle();
$rectangle->setSize(100, 50);
$rectangle->setLocation(50, 100);
$rectangle->setFill('orange', 0.8);

$square = new Square();
$square->setSize(150);
$square->setLocation(500,550);
$square->setFill('green', 0.5);

$ellipse = new Ellipse();
$ellipse->setRadius(50, 120);
$ellipse->setLocation(250, 200);
$ellipse->setFill('crimson', 1);

$circle = new Circle();
$circle->setRadius(25);
$circle->setLocation(400, 100);
$circle->setFill('blue', 0.4);

$triangle = new Triangle();
$triangle->setFill('purple', 0.9);
$triangle->setCoordinates(100, 85, 64, 220 ,300, 150);

$polygon = new Polygon();
$polygon->setFill('yellow', 0.6);
$polygon->setPoints([500, 185, 250, 40 ,75, 420, 80, 15, 90, 400]);

// On stocke les objets dans un tableau
$shapes = [];
$shapes[] = $rectangle;
$shapes[] = $ellipse;
$shapes[] = $square;
$shapes[] = $circle;
$shapes[] = $triangle;
$shapes[] = $polygon;

// Construction du code SVG

$svg = '<svg width="800" height="600">';

// On parcours nos objets et on appelle la méthode draw() sur chacun d'entre eux
foreach ($shapes as $shape) {
    $svg .= $shape->draw();
}

// $svg .= $rectangle->draw();
// $svg .= $square->draw();
// $svg .= $ellipse->draw();
// $svg .= $circle->draw();
// $svg .= $triangle->draw();
// $svg .= $polygon->draw();

// $svg .= genRectangle(50, 100, 200, 50, 'orange', 0.8);
// $svg .= genRectangle(100, 150, 400, 50, 'red', 0.7);
// $svg .= genSquare(150,200,50,'green', 0.5);
// $svg .= genEllipse(500,150,50,75,'red', 0.5);
// $svg .= genCircle(250, 300, 100, 'crimson', 1);
// $svg .= genTriangle(100, 85, 64, 220 ,300, 150, 'blue', 0.7);
// $svg .= genPolygon([450, 150, 800, 400, 20, 60, 120, 500, 400, 200], 'pink', 0.4);
$svg .= '</svg>';


//////////////////////////////////////
// Affichage : inclusion du template /
//////////////////////////////////////
include 'index.phtml';