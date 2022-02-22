<?php

/**
 * Recherche un user par son email
 */
function getUserByEmail(string $email): ?stdClass
{
    $user = null;
    $sql = 'SELECT * FROM user WHERE email=?';
    $req = prepareAndExecute($sql, [$email]);
    $status = $req['status'];
    $res = $req['pdoStatement']->fetch();
    if ($status && $res) {
        $user = new stdClass();
        foreach ($res as $key=>$value) {
            $user->$key = $value;
        }
    }
    var_dump($user);
    return $user;
}

/**
 * Vérifie la validité d'un email
 */
function emailAlreadyInUse(string $email): ?string
{
    $result = null;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $user = getUserByEmail($email);
        if ($user) {
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
function insertUser(stdClass $data): bool
{
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