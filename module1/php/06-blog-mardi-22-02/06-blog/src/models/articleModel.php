<?php 

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
    $articles = getAllResults($sql);

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
    $article = getOneResult($sql, [':idArticle' => $idArticle]);

    // Si il n'existe pas d'article pour cet id...
    if (!$article) {

        // On retourne un tableau vide (on pourrait aussi lancer une "exception")
        return [];
    }

    return $article;
}