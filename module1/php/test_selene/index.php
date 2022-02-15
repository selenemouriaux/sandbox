<?php
require 'functions/data-persistency.php';
require 'functions/data-processing.php';

// intialisation des vars pour pré remplissage et traitement
$nom = '';
$prenom = '';
$email = '';
$password = '';
$confirmation = '';
$members = getCsv(FILEPATH);
$errors = [];
//début du traitement en cas de soumission de form
if ($_POST) {
    //defining vars
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmation = $_POST['confirmation'];
    //checking validity of posted values with errors array AND an auto generated list of existing emails
    $errors = validate($nom, $prenom, $email, $password, $confirmation, getRegisteredEmails($members));
    //if form went through validation successfully, the customer is added
    if (!$errors) {
        addCustomer($nom, $prenom, $email, $password);
        header('Location: ./pages/confirmation.phtml');
        exit;
    }
}


include './pages/index.phtml';