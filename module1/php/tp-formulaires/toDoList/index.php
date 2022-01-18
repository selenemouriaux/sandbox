<?php
require './modules/functions.php';
const TMP = './tmp.json';
const TASKS = './tasks.json';
const REQUEST = ['titre', 'description', 'date', 'priorite', 'erreurs'];

//echo '<hr>';
[$arr, $tasks] = initialize();
var_dump($_POST);
if ($_POST) {
    if (isset($_POST['indexes']) && isset($_POST['supprimer'])) {
        var_dump("CONDITION VRAIE");
        $tasks = deleteTask($_POST['indexes'], $tasks);
        jsonUpdate($tasks, TASKS);
        $tasks = initialize()[1];
    }
    $arr = updateArray($arr);
    [$arr, $isValid] = processArrays($arr);
    if ($isValid && !in_array($arr, $tasks) && $_POST['enregistrer']) {
        $tasks[] = $arr;
        jsonUpdate($tasks, TASKS);
    } elseif (in_array($arr, $tasks)) {
        $arr['erreurs']['erreurs'] = "!! Exact same ToDo already exists !!";
    }
    jsonUpdate($arr, TMP);

//    $arr = resetButtons($arr);
//    header('Location: index.php');
//    exit;
}

include 'index.phtml';





























