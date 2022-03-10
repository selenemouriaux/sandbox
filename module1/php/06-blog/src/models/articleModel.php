<?php 

class ArticleModel extends AbstractModel {

    /**
     * Sélectionne tous les articles
     */
    function getAllArticles(?int $limit = null): array
    {
        // Requête SQL 
        $sql = 'SELECT idArticle, title, content, createdAt, image, label AS category_label  
                FROM article AS A
                INNER JOIN category AS C ON A.categoryId = C.idCategory
                ORDER BY createdAt DESC';

        if ($limit != null) {

            $sql .= ' LIMIT ' . $limit;
        }

        // Sélection des articles
        $articles = $this->db->getAllResults($sql);

        return $articles;
    }

    /**
     * Sélectionne UN article à partir de son ID
     */
    function getOneArticle(int $idArticle): array
    {
        // Requête de sélection pour aller chercher l'article à afficher
        $sql = 'SELECT idArticle, title, content, createdAt, image, label AS category_label, categoryId, image
                FROM article AS A
                INNER JOIN category AS C ON A.categoryId = C.idCategory
                WHERE idArticle = :idArticle';

        // Sélection de l'article
        $article = $this->db->getOneResult($sql, [':idArticle' => $idArticle]);

        // Si il n'existe pas d'article pour cet id...
        if (!$article) {

            // On retourne un tableau vide (on pourrait aussi lancer une "exception")
            return [];
        }

        return $article;
    }


    /**
     * Insert un nouvel article dans la base de données
     */
    function insert(string $title, string $content, int $categoryId, string $image)
    {
        $sql = 'INSERT INTO article (title, content, categoryId, image)
                VALUES (?,?,?,?)';

        $this->db->prepareAndExecute($sql, [$title, $content, $categoryId, $image]);
    }

    /**
     * Modifie un article existant dans la base de données
     */
    function update(string $title, string $content, int $categoryId, string $image, int $idArticle)
    {
        $sql = 'UPDATE article 
                SET title = ?, content = ?, categoryId = ?, image = ?
                WHERE idArticle = ?';

        $this->db->prepareAndExecute($sql, [$title, $content, $categoryId, $image, $idArticle]);
    }

    /**
     * Supprime un article dans la base de données
     */
    function delete(int $idArticle)
    {
        $sql = 'DELETE FROM article
                WHERE idArticle = ?';

        $this->db->prepareAndExecute($sql, [$idArticle]);
    }
}