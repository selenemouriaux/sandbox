<?php

/**
 * Contrôleur de la page d'accueil
 */
function genHome()
{
    // Sélection des articles
    $articles = getAllArticles(5);

    // Affichage : inclusion du fichier de template
    $template = 'home';
    include TEMPLATE_DIR . '/base.phtml';
}

/**
 * Contrôleur de la page Article
 */
function genArticle()
{
    // Valider le paramètre idArticle
    if (!array_key_exists('idArticle', $_GET) || !$_GET['idArticle'] || !ctype_digit($_GET['idArticle'])) {
        echo '<p>ERREUR : Id Article manquant ou incorrect</p>';
        exit;
    }

    // Récupérer le paramètre idArticle
    $idArticle = (int)$_GET['idArticle'];

    // Sélection de l'article
    $article = getOneArticle($idArticle);

    // Test pour savoir si l'article existe
    if (!$article) {
        echo 'ERREUR : aucun article ne possède l\'ID ' . $idArticle;
        exit;
    }


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

            // Insertion du commentaire en base de données
            insertComment($content, $idArticle, $rate);

            // Redirection
            header('Location: index.php?action=article&idArticle=' . $idArticle);
            exit;
        }

    }

    // Sélection des commentaires associésà l'article
    $comments = getCommentsByArticleId($idArticle);

    // Affichage : inclusion du fichier de template
    $template = 'article';
    include TEMPLATE_DIR . '/base.phtml';
}

/**
 * Contrôleur de la page Contact
 */
function genContact()
{
    // Affichage : inclusion du fichier de template
    $template = 'contact';
    include TEMPLATE_DIR . '/base.phtml';
}

/**
 * Contrôleur de la page Mentions légales
 */
function genMentions()
{
    // Affichage : inclusion du fichier de template
    $template = 'mentions';
    include TEMPLATE_DIR . '/base.phtml';
}

/**
 * Contrôleur dde la page Signup
 */
function genSignUp()
{
    // Initialisation du tableau des erreurs à null
    $errors = ['firstname' => null, 'lastname' => null, 'email' => null, 'password' => null, 'password_confirm' => null,];

    // Traitement des entrées du formulaire
    if ($_POST) {

        // création d'un objet dans lequel je vais stocker toutes les infos cleanées du formulaire
        $data = new stdClass();
        foreach ($_POST as $field => $value) {
            $data->$field = htmlspecialchars($value);
        }

        // appel au UserModel pour la validité de l'email et gestion d'erreurs
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

        // Ordre au UserModel d'insérer le nouvel utilisateur si aucune erreur n'est détectée après avoir hashé le mot de passe pour le sauvegarder
        if (!array_filter($errors)) {
            $data->hash = password_hash($data->password, PASSWORD_DEFAULT);
            $status = insertUser($data);
            if ($status) {
                // génerer le flash message !!
                // redirect connexion.php
            } else {
                // flash message : ERREUR BDD, please retry
                $template = 'signup';
                include TEMPLATE_DIR . '/base.phtml';
            }
        }
    }
}