<?php
require 'functions/data-persistency.php';
require 'functions/data-processing.php';

$email = '';
$password = '';
$members = getCsv(FILEPATH);
$emails = getRegisteredEmails($members);
$user = '';
$error = '';

if ($_POST) {
    $bouli = false;
    if (in_array($_POST['email'], $emails)) {
        foreach ($members as $member) {
            if ($member[2] == $_POST['email'] && password_verify($_POST['password'], $member[3])) {
                $user = $member;
                $bouli = true;
                break;
            } elseif ($member[2] == $_POST['email'] && !password_verify($_POST['password'], $member[3])) {
                $error = "mot de passe incorrect";
                $bouli = true;
                break;
            }
        }
    }
    if (!$bouli) {
        $error = "l'email fourni n'existe pas dans nos registres";
    }
}

include './pages/signin.phtml';