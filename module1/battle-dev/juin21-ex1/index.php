<?php
$input = turnToNumber(file('./input/input1.txt'));
$output = turnToNumber(file('./output/output1.txt'));

function turnToNumber(array $whatever) {
    for ($i=0; $i<count($whatever); $i++) {
        $whatever[$i] = intval($whatever[$i]);
    }
    return $whatever;
}

?>