<?php

/**
 * Vérification de la validité des informations soumises au formulaire d'inscription
 */
function validateSignupform(stdClass $data): array {
    $errors = [];
    if (emailAlreadyInUse($data->email)) {
        $errors['email'] = emailAlreadyInUse($data->email);
    }

    // Vérification et gestion des erreurs de mot de passe
    if (strlen($data->password) < 8) {
        $errors['password'] = "le mot de passe est trop court";
    }
    if ($data->password !== $data->password_confirm) {
        $errors['password_confirm'] = "les mots de passe ne correspondent pas";
    }
    return $errors;
}