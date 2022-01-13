<?php
require './modules/functions.php';
const TMP = './tmp.json';
const TASKS = './tasks.json';
const REQUEST = ['id', 'titre', 'description', 'date', 'priorite', 'modifier', 'supprimer',
    'idTache', 'selectionDeTaches', 'enregistrer', 'erreurs'];

var_dump("TODO : execute sense() on values after validation !");
echo '<hr>';
[$arr, $tasks] = initialize();
if ($_POST) {
    $arr = updateArray($arr);
//    PROCESS FORM

//    $arr = resetButtons($arr);
    jsonUpdate($arr, TMP);
//    header('Location: index.php');
//    exit;
}
var_dump($arr);

include 'index.phtml';





























