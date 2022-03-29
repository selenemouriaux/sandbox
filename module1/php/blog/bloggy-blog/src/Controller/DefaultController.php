<?php

namespace App\Controller;

use \App\Repository\ArticleRepository;
use \App\Repository\CommentRepository;


class DefaultController extends AbstractController
{
  /**
   * Contrôleur de la page d'accueil
   */
  public function genHome(): string
  {
    // Sélection des articles
//    $articleModel = new ArticleRepository();
//    $aArticles = (new ArticleRepository)->getAllArticles(5);

    // On récupère le message flash le cas échéant
//    $sFlashMessage = $this->flashBag->getFlashMessage();

    // Affichage : inclusion du fichier de template
//    $template = 'home';
//    include TEMPLATE_DIR . '/base.phtml';

    return $this->render('home', [
      'articles' => (new ArticleRepository)->getAllArticles(5),
      'flashMessage' => $this->flashBag->getFlashMessage(),
    ]);
  }

  /**
   * Contrôleur de la page Article
   */
  public function genArticle(): string
  {
    // Valider le paramètre idArticle
    if (!array_key_exists('idArticle', $_GET) || !$_GET['idArticle'] || !ctype_digit($_GET['idArticle'])) {
      echo '<p>ERREUR : Id Article manquant ou incorrect</p>';
      exit;
    }

    // Récupérer le paramètre idArticle
    $idArticle = (int)$_GET['idArticle'];

    // Sélection de l'article
    $article = (new ArticleRepository)->getOneArticle($idArticle);

    // Test pour savoir si l'article existe
    if (!$article) {
      echo 'ERREUR : aucun article ne possède l\'ID ' . $idArticle;
      exit;
    }

    // Création d'un objet CommentRepository
    $commentModel = new CommentRepository();
    $oSession = $this->session;
    $oUtils = $this->utils;

    // Traitement des données du formulaire d'ajout de commentaires
    if (!empty($_POST)) {

      // Récupération des données
      $content = trim($_POST['content']);
      $rate = (int)$_POST['rate'];

      // Validation
      $errors = [];

      // Si le champ "content" est vide => message d'erreur
      if (!$content) {
        $errors['content'] = 'Le champ "Commentaire" est obligatoire';
      }

      // Si pas d'erreurs
      if (empty($errors)) {

        // On récupère l'id de l'utilsiateur connecté
        $userId = $this->session->getUserId();

        // @TODO vérifier qu'on récupère bien un userId !

        // Insertion du commentaire en base de données
        $commentModel->insertComment($content, $idArticle, $rate, $userId);

        // Redirection
        header('Location: index.php?action=article&idArticle=' . $idArticle);
        exit;
      }

    }

    // Sélection des commentaires associésà l'article
//    $comments = $commentModel->getCommentsByArticleId($idArticle);

    return $this->render('article', [
      'comments' => $commentModel->getCommentsByArticleId($idArticle),
      'oSession' => $oSession,
      'oUtils' => $oUtils,
      'article' => $article,
    ]);

    // Affichage : inclusion du fichier de template
//    $template = 'article';
//    include TEMPLATE_DIR . '/base.phtml';
  }

  /**
   * Contrôleur de la page Contact
   */
  public function genContact(): string
  {
    // Affichage : inclusion du fichier de template
    return $this->render('contact');
  }

  /**
   * Contrôleur de la page Mentions légales
   */
  public function genMentions(): string
  {
    // Affichage : inclusion du fichier de template
    return $this->render('mentions');
  }

}