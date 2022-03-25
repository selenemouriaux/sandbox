<?php
namespace App\Repository;

class CommentRepository extends \App\Framework\AbstractModel
{

  /**
   * Insère un commentaire en base de données
   */
  function insertComment(string $content, int $idArticle, int $rate, int $userId)
  {
    $sql = 'INSERT INTO comment (content, articleId, rate, userId)
                VALUES (?, ?, ?, ?)';

    $this->db->prepareAndExecute($sql, [$content, $idArticle, $rate, $userId]);
  }

  /**
   * Sélectionne les commentaires associés à un article
   */
  function getCommentsByArticleId(int $idArticle): array
  {
    $sSql = 'SELECT content, C.createdAt, rate, firstname, lastname, idComment, articleId, U.idUser as userId, U.email as email
                FROM comment AS C
                INNER JOIN user AS U ON C.userId = U.idUser 
                WHERE articleId = ?
                ORDER BY createdAt DESC';

    $aComments = [];

    foreach ($this->db->getAllResults($sSql, [$idArticle]) as $aComment) {
      $oComment = (new \App\Entity\Comment)->hydrate($aComment);
      $oComment->setUser((new UserRepository)->getUserByEmail($aComment['email']));

      $aComments[] = $oComment;
    }
    if (!$aComments) {
      return [];
    }
    return $aComments;
  }

}