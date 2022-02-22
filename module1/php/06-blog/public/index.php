<?php

// Inclusion du fichier de configuration 
require '../app/config.php';

// Inclusion du fichier contenant les fonctions relatives à la BDD
require PROJECT_DIR . '/src/library/database.php';

// Inclusion des fichiers de modèles
require PROJECT_DIR . '/src/models/articleModel.php';
require PROJECT_DIR . '/src/models/commentModel.php';
require PROJECT_DIR . '/src/models/userModel.php';

// Inclusion du fichier contenant les contrôleurs
require PROJECT_DIR . '/src/controllers/controllers.php';

// Inclusion des fichiers outils
require PROJECT_DIR . '/src/library/validation.php';
require PROJECT_DIR . '/src/library/flashbag.php';

/**
 * Plusieurs possiblités pour gérer les URLs
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php?action=article&id=37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article?id=37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article/37
 */

// On récupère l'action de l'URL courante, par défaut on va sur la page d'accueil 
// $action = 'home';
// if (array_key_exists('action', $_GET)) {
//     $action = $_GET['action'];
// }
$action = $_GET['action'] ?? 'home';

// Routing : trouver et exécuter le controller associé à l'action 
switch ($action) {

    case 'home':
        genHome();
        break;

    case 'article':
        genArticle();
        break;

    case 'contact':
        genContact();
        break;

    case 'mentions':
        genMentions();
        break;

    case 'signup':
        genSignUp();
        break;
    case 'login':
        genLogin();
        break;

    default:
        echo 'ERREUR 404 : Page introuvable';
        break;
}