<?php 

class CategoryModel extends AbstractModel {

    public function getAllCategories()
    {
        $sql = 'SELECT * FROM category ORDER BY label';

        return $this->db->getAllResults($sql);
    }
}