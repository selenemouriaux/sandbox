<?php
const OUTPUT_DIR = './output/';
const INPUT_DIR = './input/';

$listOfInputs = listingFiles(INPUT_DIR);
$listOfOutputs = listingFiles(OUTPUT_DIR);

$input = turnToNumber(file('./input/input4.txt', FILE_IGNORE_NEW_LINES));
$output = turnToNumber(file('./output/output4.txt', FILE_IGNORE_NEW_LINES));

function turnToNumber(array $whatever) {
    for ($i=0; $i<count($whatever); $i++) {
        $whatever[$i] = intval($whatever[$i]);
    }
    return $whatever;
}
function estimatingErgolNeeds($input) {
    $ignition = $input[0];
    $nbParsecs = $input[1];
    return [$ignition + $nbParsecs * 5];
}
function testIsOk($input, $output) {
    return $input == $output;
}
//var_dump(estimatingErgolNeeds($input));
//var_dump($output);
//var_dump(testIsOk(estimatingErgolNeeds($input), $output));
function listingFiles($directory) {
    return glob($directory.'*.txt');
}
//var_dump(listingFiles(INPUT_DIR));




?>