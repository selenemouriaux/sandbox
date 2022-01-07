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
            $y = 1;
            while ($y < 21 && $newGrid['row_' . $y][$x] == '.' ) {
                var_dump($newGrid['row_' . $y][$x]);
                var_dump($y);
                $possibleWin = true;
                for ($z = 0; $z < 10; $z++) {
                    if (!$z == $x && $newGrid['row_' . $y][$z] != '#') {
                        $possibleWin = false;
                        break;
                    }
                }
                if ($possibleWin && $newGrid['row_' . ($y + 1)][$x] == '#'
                    || $possibleWin && $newGrid['row_' . ($y + 2)][$x] == '#'
                    || $possibleWin && $newGrid['row_' . ($y + 3)][$x] == '#') {
                    $finalResults[$inputFileName] = 'BOOM ' . $x;
                } else {
                    $finalResults[$inputFileName] = 'NOPE';
                }
                $y++;
            }
            var_dump($finalResults[$inputFileName]);
            var_dump($finalResults[$inputFileName] == $expected);
        }
    }
}

processAndCheckIO(associateListings($listOfInputs, $listOfOutputs));

