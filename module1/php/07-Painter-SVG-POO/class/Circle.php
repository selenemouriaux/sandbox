<?php 

class Circle extends Ellipse {

    /**
     * Setter pour les dimensions du rayon du cercle
     */
    public function setRadius(int $radius, $useless = null)
    {
        $this->xRadius = $radius;
        $this->xRadius = $radius;
    }

    /**
     * Génère le code SVG du rectangle
     */
    public function draw(): string
    {
        // $svg = '<circle cx="'.$this->cx.'" cy="'.$this->cy.'" r="'.$this->radius.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';

        // return $svg;

        return genTag('circle', [
            'cx' => $this->location->getX(),
            'cy' => $this->location->getY(),
            'r' => $this->xRadius,
            'fill' => $this->color,
            'opacity' => $this->opacity
        ]);
    }
}