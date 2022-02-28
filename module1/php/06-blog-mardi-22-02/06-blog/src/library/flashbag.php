<?php 

/**
 * Démarre la session le cas échéant (si la session n'est pas encore démarrée)
 */
function startSession()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

/**
 * Ajoute un message en session
 */
function addFlashMessage(string $message)
{
    startSession();
    $_SESSION['flashbag'] = $message;
}

/**
 * Récupère le message flash enregistré en session et le supprime de la session puis le retourne
 * Ou bien renvoie la valeur null si pas de message
 */
function getFlashMessage(): ?string 
{
    startSession();
    
    if (hasFlashMessage()) {
        $flashMessage = $_SESSION['flashbag'];
        unset($_SESSION['flashbag']);
        return $flashMessage;
    }
    return null;
}

/**
 * Y a-t-il un message en session ?
 * Retourne true si oui, false si non
 */
function hasFlashMessage(): bool 
{
    startSession();
    return isset($_SESSION['flashbag']);
}

