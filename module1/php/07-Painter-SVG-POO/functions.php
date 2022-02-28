<?php 

//////////////
// Fonctions /
//////////////

function genTag(string $tag, array $attributes = [])
{
    $result = '<'. $tag . ' ';

    foreach ($attributes as $attrName => $attrValue) {
        $result .= $attrName . '="' . $attrValue . '" ';
    }

    $result .= '/>';

    return $result;
}









// function genRectangle(int $x, int $y, int $width, int $height, string $color = 'black', float $opacity = 1): string
// {
//     $svg = '<rect x="'.$x.'" y="'.$y.'" width="'.$width.'" height="'.$height.'" fill="'.$color.'" opacity="'.$opacity.'" />';

//     // $svg = "<rect x=\"$x\" y=\"$y\" width=\"$width\" height=\"$height\" fill=\"$color\" opacity=\"$opacity\"  />"

//     return $svg;
// }

// function genSquare(int $x, int $y, int $size, string $color = 'black', float $opacity = 1): string
// {
//     $svg = '<rect x="'.$x.'" y="'.$y.'" width="'.$size.'" height="'.$size.'" fill="'.$color.'" opacity="'.$opacity.'" />';

//     return $svg;
// }

// function genEllipse(int $cx, int $cy, int $xRadius, int $yRadius, string $color = 'black', float $opacity = 1): string
// {
//     $svg = '<ellipse cx="'.$cx.'" cy="'.$cy.'" rx="'.$xRadius.'" ry="'.$yRadius.'" fill="'.$color.'" opacity="'.$opacity.'" />';

//     return $svg;
// }

// function genCircle(int $cx, int $cy, int $radius, string $color = 'black', float $opacity = 1): string
// {
//     $svg = '<circle cx="'.$cx.'" cy="'.$cy.'" r="'.$radius.'" fill="'.$color.'" opacity="'.$opacity.'" />';

//     return $svg;
// }

// function genTriangle(int $x1, int $y1, int $x2, int $y2, int $x3, int $y3, string $color = 'black', float $opacity = 1): string
// {
//     $svg = '<polygon points="'.implode(' ', [$x1, $y1, $x2, $y2, $x3, $y3]).'" fill="'.$color.'" opacity="'.$opacity.'" />';

//     return $svg;
// }

// function genPolygon(array $points, string $color = 'black', float $opacity = 1): string
// {
//     $svg = '<polygon points="'.implode(' ', $points).'" fill="'.$color.'" opacity="'.$opacity.'" />';

//     return $svg;
// }