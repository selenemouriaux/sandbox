<?php

!empty($_POST) ? $mot = $_POST['mot'] : $mot = null;
$traduire_en = $_POST['traduire_en'] ?? 'toFr';

function translate($mot, $traduire_en)
{
    $dico = ['toEng' => ['pomme' => 'apple', 'chien' => 'dog'],
        'toFr' => ['apple' => 'pomme', 'dog' => 'chien']];
    $mot = trim(strtolower($mot));
    if ($mot =='') {
        return 'Veuillez entrer un mot à traduire :)';
    } else {
    $translation = array_key_exists($mot, $dico[$traduire_en]) ? $dico[$traduire_en][$mot] : 'désolée, je ne connais pas ce mot :/';
    return $translation;
    }
}

$translation = translate($mot, $traduire_en);

include 'translator.phtml';