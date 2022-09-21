<?php
include_once './Core/Controller.php';
class ProductController extends Controller
{
    public $productModel;
    

    public function __construct()
    {
        $this->productModel = parent::model('Product');
        // $this->sizeModel = parent::model('Size');
        $this->index();
    }

    public function index()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : 'western';
        switch($method) {
            case 'western';
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->viewProduct($id);
                }
                else {
                    $showSizes = $this->productModel->showSize();
                    $products = $this->productModel->showProductWestern();
                    foreach($products as $product) {
                        $sizes[$product['id']] = $this->productModel->showSizeById($product['id']);
                    }
                    include_once './Views/product.php';
                }
                break;

            case 'lazy';
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->viewProduct($id);
                }
                else {
                    $products = $this->productModel->showProductLazy();
                    foreach($products as $product) {
                        $sizes[$product['id']] = $this->productModel->showSizeById($product['id']);
                    }
                    include_once './Views/product.php';
                    break;
                }
                
            case 'detail':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = $this->productModel->showProductById($id);
                    $listImg = $this->productModel->showImgProductById($id);
                    $sizes[$product['id']] = $this->productModel->showSizeById($product['id']);
                    include_once './Views/detail_product.php';
                }
                break;
        }
    }

    public function viewProduct($id)
    {
        $product = $this->productModel->showProductById($id);
        $listImg = $this->productModel->showImgProductById($id);
        $sizes[$product['id']] = $this->productModel->showSizeById($product['id']);
        include_once './Views/detail_product.php';
    }
}