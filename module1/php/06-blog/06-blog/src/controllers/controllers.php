<?php 

/**
 * Contrôleur de la page d'accueil
 */
function genHome()
{
    // 0. Connexion à la BDD
    $pdo = new PDO(
        'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', // DSN Data Source Name
        DB_USER, // utilisateur de la base de données
        DB_PASSWORD // mot de passe (chaîne vide si pas de mot de passe)
    );

    // Appel de la méthode exec() sur l'objet $pdo pour définir l'encodage de communication avec la BDD
    $pdo->exec('SET NAMES utf8');

    // Ajout de configuration pour l'objet PDO avec la méthode setAttribute() : https://www.php.net/manual/fr/pdo.setattribute.php
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Choix du mode de rapport d'erreur : création d'un exception PHP (erreur)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Etape 1 : écrire la requête SQL dans une chaîne de caractères et la stocker dans une variable
    $sql = 'SELECT idArticle, title, content, createdAt, image, label AS category_label  
            FROM article AS A
            INNER JOIN category AS C ON A.categoryId = C.idCategory
            ORDER BY createdAt DESC LIMIT 5';

    // Etape 2 : préparer la requête
    $pdoStatement = $pdo->prepare($sql);

    // Etape 3 : exécution de la requête
    $pdoStatement->execute();

    // Etape 4 : récupérer tous les résultats
    $articles = $pdoStatement->fetchAll();

    // Affichage : inclusion du fichier de template
    $template = 'home';
    include TEMPLATE_DIR . '/base.phtml'; 
}

/**
 * Contrôleur de la page Article
 */
function genArticle()
{
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