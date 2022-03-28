<?php
namespace App\Repository;

use \App\Entity\Category;
use \App\Framework\AbstractModel;

class CategoryRepository extends AbstractModel
{
  /**
   * @return array
   */
  public function findAll(): array
  {
    $sSql = 'SELECT * FROM `'. Category::DB_TABLE.'` ORDER BY label';

    $aCategories = [];

    foreach ($this->db->getAllResults($sSql) as $aCategory) {
      $aCategories[] = (new Category())->hydrate($aCategory);
    }
    return $aCategories;
  }

  /**
   * @param array $aIds
   *
   * @return Category[]
   */
  public function findIndexedByIds(array $aIds): array
  {
    $sSql = 'SELECT * FROM `'. Category::DB_TABLE .'` 
                 WHERE `idCategory` IN ('. implode(',', $aIds).')';
    $aDbResults = $this->db->getAllResults($sSql);

    $aCategories = [];
    foreach ($aDbResults as $aCategory) {
      $aCategories[ $aCategory['idCategory'] ] = (new Category())->hydrate($aCategory);
    }

    return $aCategories;
  }

  /**
   * @param int $idCategory
   * @return Category|null
   */
  public function find(int $idCategory): ?Category
  {
    // Requête de sélection pour aller chercher l'article à afficher
    $sSql = 'SELECT idCategory, label
                FROM `'.Category::DB_TABLE.'`
                WHERE idCategory = :idCategory';

    // Sélection de l'article
    $aCategory = $this->db->getOneResult($sSql, [':idCategory' => $idCategory]);

    // Si il n'existe pas d'article pour cet id...
    if (!$aCategory) {

      // On retourne un tableau vide (on pourrait aussi lancer une "exception")
      return null;
    }

//    $oCategory = new Category();
//    $oCategory->setId($aCategory['idCategory']);
//    $oCategory->setLabel($aCategory['label']);

    return (new Category())->hydrate($aCategory);
  }
}