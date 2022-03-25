<?php
namespace App\Controller;

use \App\Repository\UserRepository;

class UserController extends AbstractController
{
  /**
   * Contrôleur de la page de création de compte
   */
  public function genSignup() :void
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
      $errors = validateSignupForm($firstname, $lastname, $email, $password, $password_confirm);

      // S'il n'y a pas d'erreur, si tout est OK
      if (empty($errors)) {

        // Hashage du mot de passe
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // On fait appel au modèle ( la fonction insertUser() ) pour insérer les données dans la table user
        $userModel = new UserRepository();
        $userModel->insertUser($firstname, $lastname, $email, $hash);

        // Ajout d'un message flash en session
        addFlashMessage('Votre compte a bien été créé');

        // On redirige l'internaute pour l'instant vers la page d'accueil
        header('Location: index.php');
        exit;

      }
    }

    // Affichage : inclusion du fichier de template
    $template = 'signup';
    include TEMPLATE_DIR . '/base.phtml';
  }

  /**
   * Contrôleur de la page de connexion
   */
  public function genLogin() :void
  {
    // Si le formulaire est soumis
    if (!empty($_POST)) {

      // On récupère les données du formulaire (email et mot de passe)
      $email = $_POST['email'];
      $password = $_POST['password'];

      // On vérifie les identifiants ( fonction checkCredentials() )
      $userModel = new UserRepository();
      $oUser = $userModel->checkCredentials($email, $password);
      var_dump($oUser);

      // Si les identifiants sont corrects
      if ($oUser) {

        // On enregistre les données de l'utilisateur en session ( fonction userRegister() )
        userRegister($oUser);

        // On ajoute un message flash ( fonction addFlashMessage() )
        addFlashMessage('Bonjour ' . $oUser->getFirstname());

        // Si l'utilisateur est un administrateur, on le redirige vers le dashboard
        if (isAdmin()) {
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
    $flashMessage = getFlashMessage();

    // Affichage : inclusion du fichier de template
    $template = 'login';
    include TEMPLATE_DIR . '/base.phtml';
  }

  /**
   * Contrôleur de la déconnexion
   */
  public function genLogout() :void
  {
    // On se déconnecte
    logout();

    // Message flash
    addFlashMessage('Vous êtes bien déconnecté');

    // Redirection vers l'accueil
    header('Location: index.php');
    exit;
  }
}