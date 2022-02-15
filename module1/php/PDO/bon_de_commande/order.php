<?php


die();


// Validation du paramètre orderNumber
if (!array_key_exists('orderNumber', $_GET) || !$_GET['orderNumber'] || !ctype_digit($_GET['orderNumber'])) {

    echo '<p>ERREUR : numéro de commande incorrect</p>';
    exit;
}

// On récupère le paramètre orderNumber que l'on a transmis dans les URLs des liens
$orderNumber = $_GET['orderNumber'];

///////////////////////////////////
// Connexion à une base de données
$pdo = new PDO(
    'mysql:host=localhost;dbname=classicmodels;charset=utf8', // DSN Data Source Name
    'root', // utilisateur de la base de données
    '' // mot de passe (chaîne vide si pas de mot de passe)
);

// Appel de la méthode exec() sur l'objet $pdo pour définir l'encodage de communication avec la BDD
$pdo->exec('SET NAMES utf8');

// Ajout de configuration pour l'objet PDO avec la méthode setAttribute() : https://www.php.net/manual/fr/pdo.setattribute.php
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Choix du mode de rapport d'erreur : création d'un exception PHP (erreur)
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


/////////////////////////////////////////
// Requête de sélection des infos client

// Etape 1 : écrire la requête SQL dans une chaîne de caractères et la stocker dans une variable
$sql = 'SELECT customerName, contactFirstname, contactLastname, addressLine1, addressLine2, city
        FROM customers AS C
        INNER JOIN orders AS O ON C.customerNumber = O.customerNumber
        WHERE orderNumber = ?';

// Etape 2 : préparer la requête
$pdoStatement = $pdo->prepare($sql);

// Etape 3 : exécution de la requête
$pdoStatement->execute([$orderNumber]);

// Etape 4 : récupérer le résultat
$customer = $pdoStatement->fetch();

//////////////////////////////////////////////
// Requête de sélection des produits commandés

// Etape 1 : écrire la requête SQL dans une chaîne de caractères et la stocker dans une variable
$sql = 'SELECT productName, priceEach, quantityOrdered, priceEach*quantityOrdered AS total
        FROM orderdetails AS O
        INNER JOIN products AS P ON O.productCode = P.productCode
        WHERE orderNumber = ?';

// Etape 2 : préparer la requête
$pdoStatement = $pdo->prepare($sql);

// Etape 3 : exécution de la requête
$pdoStatement->execute([$orderNumber]);

// Etape 4 : récupérer les résultats
$orderLines = $pdoStatement->fetchAll();

//////////////////////////////////////////////////
// Requête pour le calcul du total de la commande
$sql = 'SELECT SUM(priceEach * quantityOrdered) AS totalPrice
        FROM orderdetails
        WHERE orderNumber = ?';

$pdoStatement = $pdo->prepare($sql);
$pdoStatement->execute([$orderNumber]);

/**
 * Lorsqu'on souhaite récupérer UNE SEULE colonne sur la ligne de résultat
 * on peut faire appel à la méthode fetchColumn()  qui permet d'obtenir directement
 * la valeur de la colonne souhaitée. Par défaut => c'est la première (ici l'unique)
 * colonne qui est sélectionnée
 */
$total = $pdoStatement->fetchColumn();

/////////////////////////////////////
// Affichage : inclusion du template
include 'order.phtml';


