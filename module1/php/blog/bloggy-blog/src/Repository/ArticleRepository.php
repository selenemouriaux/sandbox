<?php

namespace App\Repository;

use App\Entity\Article;
use App\Framework\AbstractModel;

class ArticleRepository extends AbstractModel
{
  /**
   * Sélectionne tous les articles
   */
  function getAllArticles(?int $limit = null): array
  {
    // Requête SQL
    $sql = 'SELECT idArticle, title, content, createdAt, image, categoryId 
                FROM `' . Article::DB_TABLE . '`
                ORDER BY createdAt DESC';

    if ($limit != null) {
      $sql .= ' LIMIT ' . $limit;
    }

    $aDbResults = $this->db->getAllResults($sql);

    // Optimisation 2 : analyse des relations (Category) a récupérer et récupération en une seule requête SQL
    $aArticles = $aCategoryIds = [];
    foreach ($aDbResults as $aArticle) {
      $aCategoryIds[] = $aArticle['categoryId'];
    }

    // Récupération des catégories utiles d'un seul coup (avec dédoublonnage)
    $aCategories = (new CategoryRepository)->findIndexedByIds(array_unique($aCategoryIds));

    foreach ($aDbResults as $aArticle) {
      $aArticles[] = (new Article())
        // remplissage des données primaires
        ->hydrate($aArticle)
        // remplissage des clés étrangères
        ->setCategory($aCategories[$aArticle['categoryId']]);
    }

    return $aArticles;
  }

  /**
   * Sélectionne UN article à partir de son ID
   */
  function getOneArticle(int $idArticle): ?Article
  {
    // Requête de sélection pour aller chercher l'article à afficher
    $sql = 'SELECT idArticle, title, content, createdAt, image, categoryId
                FROM article
                WHERE idArticle = :idArticle';

    // Sélection de l'article
    $article = $this->db->getOneResult($sql, [':idArticle' => $idArticle]);

    // Si il n'existe pas d'article pour cet id...
    if (!$article) {
      // On retourne un tableau vide (on pourrait aussi lancer une "exception")
      return null;
    }

    $oCategory = (new CategoryRepository())->find($article['categoryId']);

    return (new Article())
      ->hydrate($article)
      ->setCategory($oCategory);
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
    $sql = 'UPDATE `' . Article::DB_TABLE . '`
                SET title = ?, content = ?, categoryId = ?, image = ?
                WHERE idArticle = ?';

    $this->db->prepareAndExecute($sql, [$title, $content, $categoryId, $image, $idArticle]);
  }

  /**
   * Supprime un article dans la base de données
   */
  function delete(int $idArticle)
  {
    $sql = 'DELETE FROM `' . Article::DB_TABLE . '`
                WHERE idArticle = ?';

    $this->db->prepareAndExecute($sql, [$idArticle]);
  }
}