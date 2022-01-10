<?php
/*
 * PARTIE GÉRANT LA CRÉATION D'UNE LISTE D'ENSEMBLES CLÉ/VALEUR "filesList" UTILISANT :
 * COMME CLÉ LE CHEMIN D'ACCÈS À CHAQUE INPUT FILE
 * COMME VALEUR LE CHEMIN D'ACCÈS À SON FICHIER OUTPUT
 */
const INPUT_DIR = './input/';
const OUTPUT_DIR = './output/';

$listOfInputs = listingFiles(INPUT_DIR); // je crée une liste de chemins d'accès aux fichiers input
$listOfOutputs = listingFiles(OUTPUT_DIR); // et une aux output
function listingFiles($directory)
{
    return glob($directory . '*.txt'); // glob retourne une liste des fichiers .txt dans le répertoire spécifié
}

function associateListings($i, $o) // je crée la liste clé/valeur avec input => output
{
    foreach (array_combine($i, $o) as $input => $output) { // array_combine permet de faire un double foreach
        $filesList[$input] = $output;                      // pour associer les deux entrées sans gérer d'index
    }
    return $filesList;
}

function processAndCheckIO($IOcouples)
{
    $finalResults = [];
    foreach ($IOcouples as $inputFileName => $outputFileName) { //boucle extérieure, je gère un ensemble input/output entier
        $grid = file($inputFileName, 2); //je crée un tableau de 20 lignes brutes (cf ".........." etc)
        $newGrid = []; // je crée la matrice que je vais remplir avec $grid
        $expected = file($outputFileName)[0]; //j'enregistre le résultat attendu annoncé dans l'output actuel
        $counter = 0; //me sert à concaténer le nom de chaque ligne de ma matrice
        foreach ($grid as $line) { // ici je transforme chaque ligne de $grid en tableau de 10 cases de 1 string (=10 colonnes)
            $counter++;
            $name = "row_" . $counter; // nommage itératif des lignes (de row1 à row20)
            $col = []; // array temporaire pour la transformation de string(10) en array(10)
            foreach (str_split($line) as $char) {
                $col[] = $char;
            }
            $newGrid[$name] = $col; // ajout de ligne rowX composée d'un array des 10 colonnes de la ligne (2 dimensions)
        }
        //affichage optionnel de la matrice pour jeter un oeil
//        echo '<pre>';
//        var_dump($newGrid);
//        echo '</pre><hr>';
        for ($x = 0; $x < 10; $x++) { // on boucle à la base sur les colonnes que l'on va complètement traiter une par une
            $maxY = 20; // boucle de recherche de la profondeur à laquelle tester les conditions de victoire par colonne
            for ($tmp = 1; $tmp < 21; $tmp++) { // ex: mon bloc pourrait descendre de 7 cases avant d'etre en appui, donc maxY=7
                if ($newGrid['row_' . $tmp][$x] == '#') { // etre en appui signifie que la case d'en dessous (8) est égale à '#'
                    $maxY = $tmp - 1;
                    break; // quand j'ai trouvé l'appui, je sors de ma boucle de recherche
                }
            }
            $y = $maxY; // je définis le débout de ma nouvelle boucle à la position 'en appui' de mon bloc de 4
            $x2 = $x + 1; // je sauve l'index pour la concaténation "BOOM $x2" avec un offset pour l'écart [0] == 1
            $maxY == 0 ? $possibleWin = false : $possibleWin = true; // j'initialise ma condition de sortie du while
            while ($possibleWin && $y > ($maxY - 4) && $y > 0) { // je teste les 4 lignes max jusqu'en haut de la grille
                for ($z = 0; $z < 10; $z++) { //par ligne je check que toutes les Autres cases de la ligne soient pleines '#'
                    if ((!$z == $x) && ($newGrid['row_' . $y][$z] != '#')) {
                        $possibleWin = false; // si une des autres cases n'est pas pleine '#', je sors de ma boucle et je coupe
                        break;                // ma vérification de victoire sur cette ligne en faisant remonter
                    }                         // l'info que c'est perdu.
                }
                $y--; // je remonte d'une ligne pour tester sur les 4 lignes au dessus de l'appui a cause de la longueur du bloc
            }
            $possibleWin ? $finalResults[$inputFileName] = 'BOOM ' . $x2 : ''; // si a ce stade je n'ai pas pu invalider la réussite, ca veut dire que je peux considérer la colonne comme gagnante
            array_key_exists($inputFileName, $finalResults) ? '' : $finalResults[$inputFileName] = 'NOPE'; // si je n'ai pas enregistré de victoire, alors c'est une défaite
        }
        var_dump($finalResults[$inputFileName]);
        var_dump($finalResults[$inputFileName] == $expected);
        echo '<hr>';
    }
}

processAndCheckIO(associateListings($listOfInputs, $listOfOutputs));
// j'appelle ma fonction de résolution sur :
// l'association de
// la liste de fichiers d'inputs et d'outputs
