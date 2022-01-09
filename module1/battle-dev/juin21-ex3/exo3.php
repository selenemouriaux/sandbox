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
    $finalResults = [];
    foreach ($IOcouples as $inputFileName => $outputFileName) {
        $grid = file($inputFileName, 2);
        $newGrid = [];
        $expected = file($outputFileName);
        $counter = 0;
        foreach ($grid as $line) {
            $counter++;
            $name = "row_" . $counter;
            $col = [];
            foreach (str_split($line) as $char) {
                $col[] = $char;
            }
            $newGrid[$name] = $col;
        }
//        echo '<pre>';
//        var_dump($newGrid);
//        echo '</pre><hr>';
        for ($x = 0; $x < 10; $x++) {
            $maxY = 20;
            for ($tmp = 1; $tmp < 21; $tmp++) {
                if ($newGrid['row_' . $tmp][$x] == '#') {
                    $maxY = $tmp - 1;
                    break;
                }
            }
            $y = $maxY;
            $x2 = $x + 1;
            $maxY == 0 ? $possibleWin = false : $possibleWin = true;
            while ($possibleWin && $y > ($maxY - 4) && $y > 0) {
                for ($z = 0; $z < 10; $z++) {
                    if ((!$z == $x) && ($newGrid['row_' . $y][$z] != '#')) {
                        $possibleWin = false;
                        break;
                    }
                }
                $y--;
            }
            $possibleWin ? $finalResults[$inputFileName] = 'BOOM ' . $x2 : '';
            array_key_exists($inputFileName, $finalResults) ? '' : $finalResults[$inputFileName] = 'NOPE';
        }
        var_dump($finalResults[$inputFileName]);
        var_dump($finalResults[$inputFileName] == $expected[0]);
        echo '<hr>';
    }
}

processAndCheckIO(associateListings($listOfInputs, $listOfOutputs));

