<?php

class CategoryModel extends AbstractModel
{
    /**
     * Sélectionne toutes les catégories déjà existantes
     */
    function getAllCategories(?int $limit = null): ?array
    {
        //requête SQL
        $sql = 'SELECT DISTINCT label 
                FROM category';
        if ($limit != null) {
            $sql .= ' LIMIT '.$limit;
        }
        // sélection des catégories
        $categories = $this->db->getAllResults($sql);
        return $categories;
    }

    /**
     * @param string $label
     * @return void
     * creates new category in DB, called by js on form watcher
     */
    function addCategory(string $label):void {
        $sql = 'INSERT INTO category (label)
                VALUES (?)';
        $this->db->prepareAndExecute($sql, [$label]);
    }

    /**
     * @param string $label
     * @return void
     * creates new category in DB, called by js on form watcher
     */
    function getCategoryIdByLabel(string $label):?int {
        $sql = 'SELECT idCategory
                FROM category
                WHERE label = ?';
        $id = $this->db->getOneResult($sql, [$label]);
        return $id[0];
    }
}