<?php

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




// Etape 1 : écrire la requête SQL dans une chaîne de caractères et la stocker dans une variable
$sql = 'SELECT orderNumber, orderDate, shippedDate, `status` 
        FROM orders 
        ORDER BY orderDate DESC';

// Etape 2 : préparer la requête
$pdoStatement = $pdo->prepare($sql);

// Etape 3 : exécution de la requête
$pdoStatement->execute();

// Etape 4 : récupérer tous les résultats
$orders = $pdoStatement->fetchAll();

// Affichage : inclusion du template
include 'index.phtml';