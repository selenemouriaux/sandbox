<?php

//définition de toutes les fonctions de traitement des fichiers csv

function getCsv(string $filepath): array {
    $data = [];
    $file = fopen(($filepath), "a+");
    rewind($file);
    while ($line = fgetcsv($file)) {
        $data[]=$line;
    }
    fclose($file);
    return $data;
}

function addEntryToCsv(array $entry, string $filepath):void {
    $file = fopen($filepath, "a+");
    fputcsv($file, $entry);
    fclose($file);
}

