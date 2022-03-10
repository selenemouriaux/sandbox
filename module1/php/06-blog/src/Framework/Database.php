<?php 

class Database {

    /**
     * Propriété qui va stocker l'instance de la classe PDO, l'objet PDO 
     * pour se connecter à la base de données
     */
    private PDO $pdo;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->pdo = $this->getPDOConnection();
    }

    /**
     * Crée la connexion à la base de données avec PDO
     */
    function getPDOConnection(): PDO 
    {
        // Connexion à la BDD
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

        // On retourne l'objet PDO
        return $pdo;
    }

    /**
     * Prépare et exécute une requête SQL
     */
    function prepareAndExecute(string $sql, array $values = []): PDOStatement
    {
        // Préparation de la requête
        $pdoStatement = $this->pdo->prepare($sql);

        // Exécution 
        $pdoStatement->execute($values);

        // On retourne l'objet PDOStatement
        return $pdoStatement;
    }

    /**
     * exécute une requête de sélection et récupère UN résultat
     */
    function getOneResult(string $sql, array $values = []): array
    {
        // On prépare et on exécute la requête
        $pdoStatement = $this->prepareAndExecute($sql, $values);

        // On retourne LE résultat
        $result = $pdoStatement->fetch();

        if (!$result) {
            return [];
        }

        return $result;
    }

    /**
     * exécute une requête de sélection et récupère TOUS les résultats
     */
    function getAllResults(string $sql, array $values = []): array
    {
        // On prépare et on exécute la requête
        $pdoStatement = $this->prepareAndExecute($sql, $values);

        // On retourne LE résultat
        $results = $pdoStatement->fetchAll();

        if (!$results) {
            return [];
        }

        return $results;
    }

}