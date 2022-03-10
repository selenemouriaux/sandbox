<?php 

class UserModel extends AbstractModel {

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
    function getUserByEmail(string $email): ?array
    {
        $sql = 'SELECT * FROM user WHERE email = ?';

        return $this->db->getOneResult($sql, [$email]);
    }

    /**
     * Vérifie les idnetifiants de connexion de l'utilisateur
     * Si les identifiants sont corrects, on retourne l'utilisateur
     * Sinon (email qui n'existe pas ou mot de passe incorrect) on retourne false
     */
    function checkCredentials(string $email, string $password)
    {
        // On va chercher l'utilisateur à partir de l'email
        $user = $this->getUserByEmail($email);

        // Si l'utilisateur existe bien...
        if ($user) {

            // Si le mot de passe est correct
            if (password_verify($password, $user['password'])) {

                // Tout est OK, email et mot de passe, on retourne l'utilisateur
                return $user;
            }
        }

        // Si on arrive ici c'est qu'il y a un soucis soit avec l'email, soit avec le mot de passe
        return false;
    }
}