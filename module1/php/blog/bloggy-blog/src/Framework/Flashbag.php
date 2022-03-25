<?php 
namespace App\Framework;


final class Flashbag {
  /**
   * Démarre la session le cas échéant (si la session n'est pas encore démarrée)
   */
  public function __construct()
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }

  /**
   * Ajoute un message en session
   */
  public function addFlashMessage(string $message)
  {
    $_SESSION['flashbag'] = $message;
  }

  /**
   * Récupère le message flash enregistré en session et le supprime de la session puis le retourne
   * Ou bien renvoie la valeur null si pas de message
   */
  public function getFlashMessage(): ?string
  {

    if ($this->hasFlashMessage()) {
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
  private function hasFlashMessage(): bool
  {
    return isset($_SESSION['flashbag']);
  }
}