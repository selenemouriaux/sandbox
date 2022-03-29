<?php

// Autoload de composer
require '../app/config.php';
//spl_autoload_register(function (string $sClass) {
//  $sFilename = PROJECT_DIR . '/' . str_replace(['\\', 'App'], ['/', 'src'], $sClass) . '.php';
//  if (file_exists($sFilename)) {
//    require $sFilename;
//  }
//});
require '../vendor/autoload.php';
session_start();
require PROJECT_DIR . '/app/routes.php';

// Inclusion du fichier de configuration
//require PROJECT_DIR . '/src/Framework/Utils.php';

// Inclusion du fichier contenant les fonctions relatives à la validation des différents formulaires
//require PROJECT_DIR . '/src/Framework/Validation.php';

// Inclusion du fichier contenant les fonctions relatives à la gestion des messages flash
//require PROJECT_DIR . '/src/Framework/Flashbag.php';

// Inclusion du fichier contenant les fonctions relatives à l'enregistrement de l'utilisateur en session
//require PROJECT_DIR . '/src/Framework/UserSession.php';


// Inclusion des fichiers de classe (en attendant de mettre en place un autoloader)
//require PROJECT_DIR . '/src/Framework/AbstractModel.php';
//require PROJECT_DIR . '/src/Framework/Database.php';
//require PROJECT_DIR . '/src/Repository/ArticleRepository.php';
//require PROJECT_DIR . '/src/Repository/CommentRepository.php';
//require PROJECT_DIR . '/src/Repository/UserRepository.php';
//require PROJECT_DIR . '/src/Repository/CategoryRepository.php';
// @TODO Créer un autoloader pour charger les fichiers de classes

// Inclusion des fichiers-classe "Entity"
//require PROJECT_DIR . '/src/Entity/Category.php';
//require PROJECT_DIR . '/src/Entity/Article.php';
//require PROJECT_DIR . '/src/Entity/User.php';
//require PROJECT_DIR . '/src/Entity/Comment.php';

// Inclusion des fichiers contenant les contrôleurs
//require PROJECT_DIR . '/src/Controller/DefaultController.php';
//require PROJECT_DIR . '/src/Controller/AdminController.php';
//require PROJECT_DIR . '/src/Controller/UserController.php';

// On démarre la session dès le début pour être sûr de ne pas être embêté plus tard

//print_r( (new CategoryRepository())->find(1) );

/**
 * Plusieurs possiblités pour gérer les URLs
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php?action=article&id=37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article?id=37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article/37
 * http://localhost/greta/greta-live-gr8/06-blog/public/index.php/article/titre-del-article-sous-forme-de-slug
 */

//$oDefaultController = new DefaultController();
//$oAdminController = new AdminController();
//$oUserController = new UserController();

// On récupère l'action de l'URL courante, par défaut on va sur la page d'accueil 
// $action = 'home';
// if (array_key_exists('action', $_GET)) {
//     $action = $_GET['action'];
// }
$action = $_GET['action'] ?? 'home';

if (array_key_exists($action, $aRoutes)) {
  [$sControllerName, $sActionName] = explode('::', $aRoutes[$action]);
  echo (new $sControllerName)->$sActionName();
} else {
  echo 'ERREUR 404 : Page introuvable';
}
