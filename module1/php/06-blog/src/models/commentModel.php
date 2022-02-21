<?php 

/**
 * Insère un commentaire en base de données
 */
function insertComment(string $content, int $idArticle, int $rate)
{
    $sql = 'INSERT INTO Comment (content, articleId, rate)
            VALUES (?, ?, ?)';

    prepareAndExecute($sql, [$content, $idArticle, $rate]);
}

/**
 * Sélectionne les commentaires associés à un article
 */
function getCommentsByArticleId(int $idArticle): array 
{
    $sql = 'SELECT *
            FROM Comment
            WHERE articleId = ?
            ORDER BY createdAt DESC';

    $comments = getAllResults($sql, [$idArticle]);

    if (!$comments) {
        return [];
    }

    return $comments;
}