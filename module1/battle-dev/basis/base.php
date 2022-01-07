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
        foreach ($contents as $line) {
            continue;
        }
    }
}

processAndCheckIO(associateListings($listOfInputs, $listOfOutputs));

