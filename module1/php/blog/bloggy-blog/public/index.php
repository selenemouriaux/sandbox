<?php

// Autoload de composer
require '../vendor/autoload.php';

// Inclusion du fichier de configuration 
require '../app/config.php';
require PROJECT_DIR . '/app/routes.php';
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

// Inclusion des fichiers-classe "Entity"
require PROJECT_DIR . '/src/Entity/Category.php';
require PROJECT_DIR . '/src/Entity/Article.php';
require PROJECT_DIR . '/src/Entity/User.php';
require PROJECT_DIR . '/src/Entity/Comment.php';

// Inclusion des fichiers contenant les contrôleurs
require PROJECT_DIR . '/src/Controller/DefaultController.php';
require PROJECT_DIR . '/src/Controller/AdminController.php';
require PROJECT_DIR . '/src/Controller/UserController.php';

// On démarre la session dès le début pour être sûr de ne pas être embêté plus tard
session_start();

//print_r( (new CategoryModel())->find(1) );

/**
 * Plusieurs possiblités pour gérer les URLs
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php?action=article&id=37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article?id=37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article/37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article/titre-del-article-sous-forme-de-slug
 */

$oDefaultController = new DefaultController();
$oAdminController = new AdminController();
$oUserController = new UserController();

// On récupère l'action de l'URL courante, par défaut on va sur la page d'accueil 
// $action = 'home';
// if (array_key_exists('action', $_GET)) {
//     $action = $_GET['action'];
// }
$action = $_GET['action'] ?? 'home';

if (array_key_exists($action, $aRoutes)) {
  [$sControllerName, $sActionName] = explode('::', $aRoutes[$action]);
  (new $sControllerName)->$sActionName();
} else {
  echo 'ERREUR 404 : Page introuvable';
}
