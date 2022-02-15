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


// Excéution directe d'une requête SQL
$pdoStatement = $pdo->query('SELECT * FROM products'); // La méthode query() retourne un objet de la classe PDOStatement : https://www.php.net/manual/fr/class.pdostatement

// A partir de l'objet PDOStatement, je récupère TOUS les résultats de la requête
$products = $pdoStatement->fetchAll();

// On récupère les résultats sous la forme d'un tableau qui contient des tableaux associatifs
// dont les clés correspondent aux nom des colonnes de la base de données : productCode, productName, etc
// var_dump($products);

// Par exemple pour récupérer le nom du premier produit
// var_dump($products[0]['productName']);

/**
 * Par défaut on récupère les résultats dans des tableaux avec à la fois des clés et des indices
 * On peut changer le mode de résultat, voir https://www.php.net/manual/fr/pdostatement.fetch.php
 * Par exemple pour récupérer un tableau associatif, on va utiliser le mode PDO::FETCH_ASSOC
 *
 * Je peux préciser le mode de retour à chaque fois que je récupère des résultats,
 * ou bien une fois pour toutes au moment de la création de l'objet PDO :
 * $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
 */


// Exécution d'une requête de sélection pour aller cherche UN produit à partir du code produit

$productCode = 'S10_4757';

// Etape 1 : écrire la requête SQL dans une chaîne de caractères et la stocker dans une variable
$sql = 'SELECT * FROM products WHERE productCode = "' . $productCode . '"';

$pdoStatement = $pdo->query($sql);

// A partir de l'objet PDOStatement, je récupère UN résultat
$product = $pdoStatement->fetch();

// var_dump($product);

// WARNING !!
// Pour des raisons de sécurité, pour se protéger des injections SQL, il ne faut jamais concaténer une variable directement dans une requête SQL !

//////////////////////////////
// LA BONNE MANIERE DE FAIRE :

// Etape 1 : écrire la requête SQL dans une chaîne de caractères et la stocker dans une variable
$sql = 'SELECT * FROM products WHERE productCode = ?';

// Etape 2 : préparer la requête
$pdoStatement = $pdo->prepare($sql);

// Etape 3 : exécution de la requête
$pdoStatement->execute([$productCode]);

// Etape 4 : récupérer le résultat
$product = $pdoStatement->fetch();

// var_dump($product);

//////////////
// Alternative aux placeholders anonymes (?) : les placeholders nommés

// Etape 1 : écrire la requête SQL dans une chaîne de caractères et la stocker dans une variable
$sql = 'SELECT * FROM products WHERE productCode = :productCode';

// Etape 2 : préparer la requête
$pdoStatement = $pdo->prepare($sql);

// Etape 3 : exécution de la requête
$pdoStatement->execute([
    ':productCode' => $productCode
]);

// Etape 4 : récupérer le résultat
$product = $pdoStatement->fetch();

// var_dump($product);

//////////////
// Alternative avec le bindValue() - Voir https://www.php.net/manual/fr/pdostatement.bindvalue
// Voir la liste des types de paramètres : https://www.php.net/manual/fr/pdo.constants.php

// Etape 1 : écrire la requête SQL dans une chaîne de caractères et la stocker dans une variable
$sql = 'SELECT * FROM products WHERE productCode = :productCode';

// Etape 2 : préparer la requête
$pdoStatement = $pdo->prepare($sql);

// Etape 2 bis
$pdoStatement->bindValue(':productCode', $productCode, PDO::PARAM_STR);

// Etape 3 : exécution de la requête
$pdoStatement->execute();

// Etape 4 : récupérer le résultat
$product = $pdoStatement->fetch();

var_dump($product);