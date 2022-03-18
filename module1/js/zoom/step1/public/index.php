<?php

// Inclusion du fichier de configuration 
require '../app/config.php';

// Inclusion du fichier contenant les contrôleurs
require PROJECT_DIR . '/src/controllers/controllers.php';

$action = $_GET['action'] ?? 'home';

// Routing : trouver et exécuter le controller associé à l'action 
switch ($action) {

  case 'home':
    genHome();
    break;

  case 'pixabay':
    genPixabay();
    break;

  default:
    echo 'ERREUR 404 : Page introuvable';
    break;
}