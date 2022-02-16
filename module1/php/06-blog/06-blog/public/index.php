<?php 

// Inclusion du fichier de configuration 
require '../app/config.php';

// Inclusion du fichier contenant les contrôleurs
require PROJECT_DIR . '/src/controllers/controllers.php';

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
$action = $_GET['action'] ?? 'home'; var_dump($action);

// Routing : trouver et exécuter le controller associé à l'action 
switch($action) {

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

    default:
        echo 'ERREUR 404 : Page introuvable';
        break;
}