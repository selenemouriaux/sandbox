<?php
namespace App\Repository;

use \App\Entity\Article;

class ArticleRepository extends \App\Framework\AbstractModel
{

  /**
   * Sélectionne tous les articles
   */
  function getAllArticles(?int $limit = null): array
  {
    // Requête SQL
    $sql = 'SELECT idArticle, title, content, createdAt, image, categoryId 
                FROM `'.Article::DB_TABLE.'`
                ORDER BY createdAt DESC';

    if ($limit != null) {
      $sql .= ' LIMIT ' . $limit;
    }

    // Sélection des articles
    $aArticles = [];

    foreach ($this->db->getAllResults($sql) as $aArticle) {
      $oArticle = (new Article)->hydrate($aArticle);
      $oArticle->setCategory((new CategoryRepository)->find($aArticle['categoryId']));
      $aArticles[] = $oArticle;
    }
    return $aArticles;
  }

  /**
   * Sélectionne UN article à partir de son ID
   */
  function getOneArticle(int $idArticle): ?Article
  {
    // Requête de sélection pour aller chercher l'article à afficher
    $sql = 'SELECT idArticle, title, content, createdAt, image, categoryId, image
                FROM article
                WHERE idArticle = :idArticle';

    // Sélection de l'article
    $article = $this->db->getOneResult($sql, [':idArticle' => $idArticle]);

    // Si il n'existe pas d'article pour cet id...
    if (!$article) {

      // On retourne un tableau vide (on pourrait aussi lancer une "exception")
      return null;
    }
    $oArticle = (new Article)->hydrate($article);
    $oArticle->setCategory((new CategoryRepository)->find($article['categoryId']));
    return $oArticle;
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