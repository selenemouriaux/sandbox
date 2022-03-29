<?php

namespace App\Controller;

use \App\Repository\UserRepository;

class UserController extends AbstractController
{
  /**
   * Contrôleur de la page de création de compte
   */
  public function genSignup(): string
  {
    $firstname = '';
    $lastname = '';
    $email = '';
    $password = '';
    $password_confirm = '';

    // Si le formulaire est soumis...
    if (!empty($_POST)) {

      // On récupère les données du formulaire
      $firstname = trim($_POST['firstname']);
      $lastname = trim($_POST['lastname']);
      $email = trim($_POST['email']);
      $password = $_POST['password'];
      $password_confirm = $_POST['password-confirm'];

      // Validation du formulaire (à faire en dernier quand ça fonctionne sans erreur)
      $errors = $this->validateSignupForm($firstname, $lastname, $email, $password, $password_confirm);

      // S'il n'y a pas d'erreur, si tout est OK
      if (empty($errors)) {

        // Hashage du mot de passe
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // On fait appel au modèle ( la fonction insertUser() ) pour insérer les données dans la table user
        $userModel = new UserRepository();
        $userModel->insertUser($firstname, $lastname, $email, $hash);

        // Ajout d'un message flash en session
        $this->flashBag->addFlashMessage('Votre compte a bien été créé');

        // On redirige l'internaute pour l'instant vers la page d'accueil
        header('Location: index.php');
        exit;

      }
    }

    // Affichage : inclusion du fichier de template
//    $template = 'signup';
//    include TEMPLATE_DIR . '/base.phtml';
    return $this->render('signup', [
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
      'password' => $password,
      'password_confirm' => $password_confirm,
      'flashMessage' => $this->flashBag->getFlashMessage(),
    ]);
  }

  /**
   * Contrôleur de la page de connexion
   */
  public function genLogin(): string
  {
    // Si le formulaire est soumis
    if (!empty($_POST)) {

      // On récupère les données du formulaire (email et mot de passe)
      $email = $_POST['email'];
      $password = $_POST['password'];

      // On vérifie les identifiants ( fonction checkCredentials() )
//      $userModel = new UserRepository();
      $oUser = (new UserRepository)->checkCredentials($email, $password);

      // Si les identifiants sont corrects
      if ($oUser) {
        // On enregistre les données de l'utilisateur en session ( fonction userRegister() )
        $this->session->userRegister($oUser);

        // On ajoute un message flash ( fonction addFlashMessage() )
        $this->flashBag->addFlashMessage('Bonjour ' . $oUser->getFirstname());

        // Si l'utilisateur est un administrateur, on le redirige vers le dashboard
        if ($this->session->isAdmin()) {
          header('Location: index.php?action=admin');
          exit;
        }

        // On redirige l'internaute vers la page d'accueil
        header('Location: index.php');
        exit;
      }

      // Si les identifiants sont incorrects, on stocke un message d'erreur dans une variable
      $error = 'Identifiants incorrects';
    }

    // On récupère le message flash le cas échéant
    $flashMessage = $this->flashBag->getFlashMessage();

    // Affichage : inclusion du fichier de template
//    $template = 'login';
//    include TEMPLATE_DIR . '/base.phtml';
    return $this->render('login', [
      'flashMessage' => $flashMessage,
    ]);
  }

  /**
   * Contrôleur de la déconnexion
   */
  public function genLogout(): void
  {
    // On se déconnecte
    $this->session->logout();

    // Message flash
    $this->flashBag->addFlashMessage('Vous êtes bien déconnecté');

    // Redirection vers l'accueil
    header('Location: index.php');
    exit;
  }

  private function validateSignupForm($firstname, $lastname, $email, $password, $password_confirm): ?array
  {
    $errors = [];

    // LASTNAME
    if (!$lastname) {
      $errors['lastname'] = 'Le champ "Nom" est obligatoire';
    }

    // FIRSTNAME
    if (!$firstname) {
      $errors['firstname'] = 'Le champ "Prénom" est obligatoire';
    }

    // VALIDATION EMAIL
    if (!$email) { // ou bien if (empty($email)) { ou if (strlen($email) == 0) { ou if ($email == '') {
      $errors['email'] = 'Le champ "Email" est obligatoire';
    } // Si le champ est bien rempli, on fait les autres tests
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Si l'email n'est pas valide...
      $errors['email'] = "Le format de l'email n'est pas correct";
    } // Vérification de l'existence de l'email
    elseif ((new UserRepository)->getUserByEmail($email)) {
      $errors['email'] = "Vous êtes déjà enregistré";
    }

    // PASSWORD
    if (!$password) {
      $errors['password'] = 'Le champ "Mot de passe" est obligatoire';
    } elseif (strlen($password) < 8) {
      $errors['password'] = 'Le champ "Mot de passe" doit comporter au moins 8 caractères';
    } elseif ($password != $password_confirm) {
      $errors['password-confirm'] = 'Les mots de passe ne sont pas identiques';
    }

    // Retourne le tableau d'erreurs
    return $errors;
  }
}