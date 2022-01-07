<?php
const INPUT_DIR = './input/';
const OUTPUT_DIR = './output/';

$listOfInputs = listingFiles(INPUT_DIR);
$listOfOutputs = listingFiles(OUTPUT_DIR);
function listingFiles($directory)
{
    return glob($directory . '*.txt');
}

function associateListings($i, $o)
{
    foreach (array_combine($i, $o) as $input => $output) {
        $filesList[$input] = $output;
    }
    return $filesList;
}

function processAndCheckIO($IOcouples)
{
    foreach ($IOcouples as $inputFileName => $outputFileName) {
        $contents = file($inputFileName, 2);
        $finalResults = [];
        array_shift($contents);
        $check = [];
        foreach ($contents as $word) {
            array_key_exists(rtrim($word), $check) ? $check[rtrim($word)] += 1 : $check[rtrim($word)] = 1 ;
        }
        $match = array_search(2, $check);
        $ok = $match == rtrim(file($outputFileName)[0]);
        $finalResults[] = $ok;
        echo "<p>bouton de l'input : $match.<br>est ce que c'est conforme à l'output ? $ok</p>";
    }
}

processAndCheckIO(associateListings($listOfInputs, $listOfOutputs));