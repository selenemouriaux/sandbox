<?php
namespace App\Framework;

abstract class AbstractModel {

    protected Database $db;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }


}