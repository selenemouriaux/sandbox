<!-- ***** CODE PHP ***** -->

<?php
function tirage()
{
    $results = array_fill(0, 6, 0);
    for ($i = 0; $i < sizeof($results); $i++) {
        $t = rand(1, 49);
        in_array($t, $results) ? $i -= 1 : $results[$i] = $t;
    }
    sort($results);
    return $results;
}

//$tirage = tirage();

include "./loto.phtml";
?>


<!--*********** CODE HTML ***********-->
<!-- Dans un autre fichier en .PHTML -->