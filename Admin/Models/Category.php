<?php
include_once '../configs/Connect.php';
class Category extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showCategory()
    {
        $sql = "SELECT * FROM category";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    
}