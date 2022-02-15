<?php

const FILEPATH = "./customers.csv";

function validate(string $nom, string $prenom, string $email, string $password, string $confirmation, array $emails): ?array
{
    $errors = [];
    if (!$nom) {
        $errors['nom'] = "Ce champ est obligatoire !";
    }
    if (!$prenom) {
        $errors['prenom'] = "Ce champ est obligatoire !";
    }
    if (!$email) {
        $errors['email'] = "Ce champ est obligatoire !";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Ce n'est pas un format d'email valide, merci de saisir un email valide.";
    } elseif (in_array($email, $emails)) {
        $errors['email'] = "Cet email est déjà enregistré !";
    }
    if (!$password) {
        $errors['password'] = "Ce champ est obligatoire !";
    } elseif (strlen($password)<8) {
        $errors['password'] = "le mot de passe doit comporter au moins 8 caractères !";
    }
    if (!$confirmation || $confirmation != $password) {
        $errors['confirmation'] = "les mots de passe doivent être strictement identiques";
    }
    return $errors;
}

function getRegisteredEmails($members):array {
    $emails = [];
    foreach ($members as $member) {
        $emails[]=$member[2];
    }
    return $emails;
}

function addCustomer(string $nom, string $prenom, string $email, string $password):void {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $entry = [$nom, $prenom, $email, $hash];
    addEntryToCsv($entry, FILEPATH);
}