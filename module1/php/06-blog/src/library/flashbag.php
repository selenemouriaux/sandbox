<?php

/**
 * Démarrage de session
 */
function startSession(): void
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

/**
 * Ajouter un message flash en session
 */
function addFlashMessage(string $message): void
{
    startSession();
    $_SESSION["flashMessage"] = $message;
}

/**
 * récupère et réinitialise le message
 */
function getFlashMessage(): ?string
{
    startSession();
    if (hasFlashMessage()) {
        $message = $_SESSION["flashMessage"];
        unset($_SESSION["flashMessage"]);
        return $message;
    }
    return null;
}

/**
 * vérifie la présence d'un message flash
 */
function hasFlashMessage(): bool
{
    startSession();
    return isset($_SESSION["flashMessage"]);
}