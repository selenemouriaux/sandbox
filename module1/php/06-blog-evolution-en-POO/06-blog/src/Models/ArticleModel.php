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
        $sql = 'SELECT idArticle, title, content, createdAt, image, label AS category_label  
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
     * @param array $article
     * @return void
     * adding article knowing among all, the categoryId ! Needs to resolve categoryId beforehand.
     */
    function addArticle(array $article):void {
        $sql = 'INSERT INTO article (title, content, categoryId, image)
                VALUES (?, ?, ?, ?)';

        $this->db->prepareAndExecute($sql, $article);
    }

    /**
     * @param int $articleId
     * @return void
     * deletes the entire article identified by its Id.
     */
    function deleteArticle(int $articleId):void {
        $sql = 'DELETE FROM article
                WHERE idArticle = ?';
        $this->db->prepareAndExecute($sql, [$articleId]);
    }

    function editArticle(array $update):void {
        $sql = 'UPDATE article
                SET
                    title = ?,
                    content = ?,
                    categoryId = ?,
                    image = ?
                WHERE idArticle = ?';
        $this->db->prepareAndExecute($sql, $update);
    }

}