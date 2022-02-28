<?php 

/**
 * Insère un commentaire en base de données
 */
function insertComment(string $content, int $idArticle, int $rate, int $userId)
{
    $sql = 'INSERT INTO comment (content, articleId, rate, userId)
            VALUES (?, ?, ?, ?)';

    prepareAndExecute($sql, [$content, $idArticle, $rate, $userId]);
}

/**
 * Sélectionne les commentaires associés à un article
 */
function getCommentsByArticleId(int $idArticle): array 
{
    $sql = 'SELECT content, C.createdAt, rate, firstname, lastname
            FROM comment AS C
            INNER JOIN user AS U ON C.userId = U.idUser 
            WHERE articleId = ?
            ORDER BY createdAt DESC';

    $comments = getAllResults($sql, [$idArticle]);

    if (!$comments) {
        return [];
    }

    return $comments;
}