<?php

/**
 * Vérifie la validité d'un email
 */
function emailAlreadyInUse(string $email): ?string
{
    $result = null;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Préparation de la requête SQL
        $sql = 'SELECT email FROM user WHERE email="'.$email.'"';
        // Éxécution de la requête
        $req = getOneResult($sql);
        // Si dispo renvoie true sinon génération du code erreur et renvoie false
        if (count($req) !== 0) {
            $result = 'cet email existe déjà';
        }
    } else {
        $result = 'format invalide';
    }
    return $result;
}

/**
 * Ajoute un utilisateur en BDD
 */
function insertUser(stdClass $data) :bool {
    // préparation de la requête SQL
    $sql = 'INSERT INTO user (
                firstname,
                lastname,
                email,
                password,
                role
            )
            VALUES (?, ?, ?, ?, ?)';
    $status = prepareAndExecute($sql, [
        $data->firstname,
        $data->lastname,
        $data->email,
        $data->hash,
        null
    ])['status'];
    return $status;
}