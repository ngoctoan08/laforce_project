<?php
include_once './configs/Connect.php';
class Product extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showProductWestern()
    {
        $sql = "SELECT products.id, products.name, category.title, products.price, products.avatar  FROM products JOIN category ON products.category_id = category.id WHERE products.active = 1 and category.id = 1";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function showProductLazy()
    {
        $sql = "SELECT products.id, products.name, category.title, products.price, products.avatar  FROM products JOIN category ON products.category_id = category.id WHERE products.active = 1 and category.id = 2";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function showSizeById($id)
    {
        $sql = "SELECT sizes.id, sizes.size FROM store JOIN sizes ON store.size_id = sizes.id WHERE store.quantity > 0 AND store.product_id = :id GROUP BY sizes.id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function showProductById($id)
    {
        $sql = "SELECT products.id, products.name, products.avatar, products.category_id, category.title, products.description, products.price, products.active FROM products JOIN category ON products.category_id = category.id WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function showImgProductById($id)
    {
        $sql = "SELECT list_image.id, list_image.path FROM list_image WHERE list_image.product_id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showSize()
    {
        $sql = "SELECT * FROM sizes";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}