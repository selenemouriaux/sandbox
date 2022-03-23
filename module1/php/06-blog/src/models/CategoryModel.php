<?php

class CategoryModel extends AbstractModel
{

  public function getAllCategories(): array
  {
    $sql = 'SELECT * FROM category ORDER BY label';

    return $this->db->getAllResults($sql);
  }

  public function find(int $idCategory): ?Category
  {
    // Requête de sélection pour aller chercher l'article à afficher
    $sSql = 'SELECT idCategory, label
                FROM category
                WHERE idCategory = :idCategory';

    // Sélection de l'article
    $aCategory = $this->db->getOneResult($sSql, [':idCategory' => $idCategory]);

    // Si il n'existe pas d'article pour cet id...
    if (!$aCategory) {

      // On retourne un tableau vide (on pourrait aussi lancer une "exception")
      return null;
    }

    $oCategory = new Category();
    $oCategory->setId($aCategory['idCategory']);
    $oCategory->setLabel($aCategory['label']);

    return $oCategory;
  }
}