<?php
namespace App\Repository;

use \App\Entity\User;

class UserRepository extends \App\Framework\AbstractModel {

    /**
     * Insert un nouvel utilisateur dans la base de données
     */
    function insertUser(string $firstname, string $lastname, string $email, string $password, string $role = 'ROLE_USER')
    {
        $sql = 'INSERT INTO user (firstname, lastname, email, password, role)
                VALUES (?,?,?,?,?)';

        $this->db->prepareAndExecute($sql, [$firstname, $lastname, $email, $password, $role]);
    }

    /**
     * Sélection un utilisateur à partir de son email
     */
    function getUserByEmail(string $email): ?User
    {
        $sql = 'SELECT * FROM user WHERE email = ?';

        $aResult = $this->db->getOneResult($sql, [$email]);
        if (!$aResult) {
          return null;
        }
        return (new User())->hydrate($aResult);
    }

    /**
     * Vérifie les idnetifiants de connexion de l'utilisateur
     * Si les identifiants sont corrects, on retourne l'utilisateur
     * Sinon (email qui n'existe pas ou mot de passe incorrect) on retourne false
     */
    function checkCredentials(string $email, string $password) :?User
    {
        // On va chercher l'utilisateur à partir de l'email
        $oUser = $this->getUserByEmail($email);

        // Si l'utilisateur existe bien...
        if ($oUser) {

          // Si le mot de passe est correct
            if (password_verify($password, $oUser->getPassword())) {

                // Tout est OK, email et mot de passe, on retourne l'utilisateur
                return $oUser;
            }
        }

        // Si on arrive ici c'est qu'il y a un soucis soit avec l'email, soit avec le mot de passe
        return null;
    }
}