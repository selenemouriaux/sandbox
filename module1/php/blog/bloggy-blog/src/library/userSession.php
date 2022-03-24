<?php

/**
 * Enregistre les données de l'utilisateur en session
 */
function userRegister(int $userId, string $firstname, string $lastname, string $email, string $role)
{
    startSession();

    $_SESSION['user'] = [
        'userId' => $userId,
        'lastname' => $lastname,
        'firstname' => $firstname,
        'email' => $email,
        'role' => $role
    ];
}

/**
 * Vérifie si l'utilisateur est connecté ou non
 */
function isConnected(): bool 
{
    startSession();

    return array_key_exists('user', $_SESSION) && isset($_SESSION['user']);
}

/**
 * Déconnecte l'utilisateur
 */
function logout()
{
    if (isConnected()) {
        $_SESSION['user'] = null;
        session_destroy();
    }
}

/**
 * Retourne l'id de l'utilisateur connecté
 */
function getUserId(): ?int 
{
    return isConnected() ? $_SESSION['user']['userId'] : null;
}

/**
 * Retourne le prénom de l'utilisateur connecté
 */
function getUserFirstname(): ?string 
{
    return isConnected() ? $_SESSION['user']['firstname'] : null;
}

/**
 * Retourne le nom de l'utilisateur connecté
 */
function getUserLastname(): ?string 
{
    return isConnected() ? $_SESSION['user']['lastname'] : null;
}

/**
 * Retourne l'email de l'utilisateur connecté
 */
function getUserEmail(): ?string 
{
    return isConnected() ? $_SESSION['user']['email'] : null;
}

/**
 * Est-ce que l'utilisateur connecté est un administrateur ? 
 */
function isAdmin(): bool
{
    if (!isConnected()) {
        return false;
    }

    return $_SESSION['user']['role'] == 'ROLE_ADMIN';
}