<?php 

// Autoload de composer
require '../vendor/autoload.php';

// Inclusion du fichier de configuration 
require '../app/config.php';
require PROJECT_DIR . '/src/library/utils.php';

// Inclusion du fichier contenant les fonctions relatives à la validation des différents formulaires
require PROJECT_DIR . '/src/library/validation.php';

// Inclusion du fichier contenant les fonctions relatives à la gestion des messages flash
require PROJECT_DIR . '/src/library/flashbag.php';

// Inclusion du fichier contenant les fonctions relatives à l'enregistrement de l'utilisateur en session
require PROJECT_DIR . '/src/library/userSession.php';


// Inclusion des fichiers de classe (en attendant de mettre en place un autoloader)
require PROJECT_DIR . '/src/Framework/AbstractModel.php';
require PROJECT_DIR . '/src/Framework/Database.php';
require PROJECT_DIR . '/src/Models/ArticleModel.php';
require PROJECT_DIR . '/src/Models/CommentModel.php';
require PROJECT_DIR . '/src/Models/UserModel.php';
require PROJECT_DIR . '/src/Models/CategoryModel.php';
// @TODO Créer un autoloader pour charger les fichiers de classes


// Inclusion des fichiers de modèles
// require PROJECT_DIR . '/src/models/articleModel.php';
// require PROJECT_DIR . '/src/models/commentModel.php';
// require PROJECT_DIR . '/src/models/userModel.php';

// Inclusion des fichiers contenant les contrôleurs
require PROJECT_DIR . '/src/controllers/controllers.php';
require PROJECT_DIR . '/src/controllers/adminControllers.php';

// On démarre la session dès le début pour être sûr de ne pas être embêté plus tard
session_start();

/**
 * Plusieurs possiblités pour gérer les URLs
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php?action=article&id=37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article?id=37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article/37 
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article/titre-del-article-sous-forme-de-slug
 */

// On récupère l'action de l'URL courante, par défaut on va sur la page d'accueil 
// $action = 'home';
// if (array_key_exists('action', $_GET)) {
//     $action = $_GET['action'];
// }
$action = $_GET['action'] ?? 'home';

// Routing : trouver et exécuter le controller associé à l'action 
switch($action) {

    // Page d'accueil
    case 'home': 
        genHome();
        break;

    // Page Article
    case 'article':
        genArticle();
        break;

    // Formulaire de contact
    case 'contact':
        genContact();
        break;

    // Mentions légales
    case 'mentions':
        genMentions();
        break;

    // Formulaire de création de compte
    case 'signup':
        genSignUp();
        break;

    // Formulaire de connexion
    case 'login':
        genLogin();
        break;

    // Déconnexion
    case 'logout':
        genLogout();
        break;

    // Dashboard administration
    case 'admin':
        genDashboard();
        break;

    // Création d'un article
    case 'admin_article_add':
        genAddArticle();
        break;

    // Modification d'un article
    case 'admin_article_edit':
        genEditArticle();
        break;

    // Suppression d'un article
    case 'admin_article_delete':
        genDeleteArticle();
        break;

    // On n'a pas trouvé de page pour l'action présente dans l'URL => erreur 404
    default:
        echo 'ERREUR 404 : Page introuvable';
        break;
}