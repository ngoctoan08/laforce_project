<?php
include_once './Core/Controller.php';
require_once './vendor/autoload.php';

use Carbon\Carbon;
class ProductController extends Controller
{
    public $productModel;
    public $categoryModel;
    public $sizeModel;
    public $storeModel;
    public function __construct()
    {
        $this->productModel = parent::model('Product');
        $this->categoryModel = parent::model('Category');
        $this->sizeModel = parent::model('Size');
        $this->storeModel = parent::model('Store');
        
        $this->index();
    }

    public function index ()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : 'show';
        switch($method) {
            case 'show':
                $now = Carbon::now();
                $toDay = $now->format('Y-m-d');
                $firstOfMonth = $now->firstOfMonth()->format('Y-m-d');

                $nowSub = Carbon::now();
                $toDaySub = $nowSub->format('m-d-Y');
                $firstOfMonthSub = $nowSub->firstOfMonth()->format('m-d-Y');
                // Hiện thị thông tin sản phẩm
                $products = $this->productModel->showProduct($firstOfMonth, $toDay);
                // số lượng sản phẩm trong kho
                // foreach($products as $product) {
                //     $store = $this->storeModel->showStoreById($product['id']);
                //     echo '<pre>';
                //     print_r($store);
                //     echo '</pre>';
                // }

                include_once './views/product/show_product.php';
                break;
            case 'add':
                $categories = $this->categoryModel->showCategory();
                include_once './views/product/add_product.php';
                $this->addProduct();
                break;
            case 'delete':
                $this->deleteProduct();
                break;
            case 'more':
                $this->moreProduct();
                break;
            case 'update':
                include_once './views/product/update_product.php';
                break;
            case 'edit':
                $this->editProduct();
                break;
        }
    }

    public function checkFile($fileName, $fileSize)
    {
        // validate file
        $flag = true;
        $fileType = ['png', 'jpg', 'jpeg'];
        // Lam the nao de chi upload hinh anh jpg, jpeg, png, ...
        $myFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); //duoi file: jpg, png, ...
        if(!in_array($myFileType, $fileType)) {
            $flag = false;
            // $_SESSION['errors'] = 'Tải file không hợp lệ!';
        }
        // Lam the na de gioi han dung luong upload
        if($fileSize >= 1000000000) {
            $flag = false;
            // $_SESSION['errors'] = 'Dung lượng file quá lớn!';
        }
        return $flag;
    }

    public function addProduct()
    {
        if(isset($_POST['add_product'])) {
            $errors = [];
            $categoryId = $_POST['title'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $filesAva = $_FILES['avatar'];
            $flag = false;
            if($this->checkFile($filesAva['name'], $filesAva['size'])) {
                $nameFileAva = converSlugUrl($filesAva['name']);
                $nameFileAva = time().$nameFileAva;
                $tmpFileAva = $filesAva['tmp_name'];
                $flag = true;
                move_uploaded_file($tmpFileAva, '../store_img/'.$nameFileAva);
                $addProduct = $this->productModel->createProduct($categoryId, $name, $price, $nameFileAva, $description);
            }
            $productId = $this->productModel->returnLastId();

            $fileSubAva = $_FILES['sub_avatar'];
            if(!empty($fileSubAva['name']) && count($fileSubAva['name']) > 1) {
                for ($i = 0; $i < count($fileSubAva['name']); $i++) {
                    if($this->checkFile($fileSubAva['name'][$i], $fileSubAva['size'][$i])) {
                        $nameFileSub = "sub".time().rand().$fileSubAva['name'][$i];
                        $nameFileSub = converSlugUrl($nameFileSub);
                        $tmpFileSub = $fileSubAva['tmp_name'][$i];
                        move_uploaded_file($tmpFileSub, '../store_img/'.$nameFileSub);
                        $addListImg = $this->productModel->insertSubAvatar($productId, $nameFileSub);
                    }
                }
           }
            if(isset($addProduct) && isset($addListImg) && $addProduct && $addListImg) {
                $_SESSION['alert'] = 1;
                header('location: index.php?page=product');
            }
            else {
                $_SESSION['errors'] = 1;
                $delProduct = $this->productModel->deleteById($productId);
                header('location: index.php?page=product&method=add');
            }
        }
    }
    public function editProduct()
    {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->productModel->showProductById($id);
            $listImg = $this->productModel->showImgProductById($id);
            $sizes  = $this->sizeModel->showSize();
            // $store = $this-> storeModel->
            // public $sizeModel;
            // public $storeModel;
            $product['list_image'] = $listImg;
            $categories = $this->categoryModel->showCategory();

            if(isset($_POST['edit_product'])) {
                // echo '<pre>';
                // print_r($_POST);
                // echo '</pre>';
                // update table products
                $categoryId = $_POST['title'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $active = $_POST['active'];
                $nameFileAva = $oldFile = $product['avatar'];
                $filesAva = $_FILES['avatar'];

                if (!empty($filesAva['name'])) {
                    $nameFileAva = time().$filesAva['name'];
                    $nameFileAva = converSlugUrl($nameFileAva);
                    $tmpFileAva = $filesAva['tmp_name'];
                    move_uploaded_file($tmpFileAva, '../store_img/'.$nameFileAva);
                    unlink('./store_img/'.$oldFile);
                }
                $update = $this->productModel->updateById($id, $categoryId, $name, $price, $nameFileAva, $description, $active);

                $oldFileSub = [];
                foreach($product['list_image'] as $img) {
                    array_push($oldFileSub, $img['path']);
                }
                
                // update size and quantity to store
                $sizePosts = $_POST['size'];
                $quantity = $_POST['quantity'];
                if($quantity > 0) {
                    foreach($sizePosts as $size) {
                        $insertStore = $this->storeModel->addStore($id, $quantity, $size);
                    }  
                }
                // die;
                
                // update table list image
                // update phải update từng ảnh

                // $fileSubAva = $_FILES['sub_avatar'];
                // if(!empty($fileSubAva['name'])) {
                //     for ($i =0;$i < count($fileSubAva['name']); $i++) {
                //         $nameFileSub = "sub".time().rand().$fileSubAva['name'][$i];
                //         $tmpFileSub = $fileSubAva['tmp_name'][$i];
                //         move_uploaded_file($tmpFileSub, './store_img/'.$nameFileSub);
                //         $updateSubAva = $this->productModel->updateSubById($id, $nameFileSub);
                //     }
                //     foreach($oldFileSub as $img) {
                //         unlink('./store_img/'.$img);
                //     }
                // }
                if($update || $insertStore) {
                    $_SESSION['alert'] = 3;
                    header('location: index.php?page=product');
                }
            }
            include_once './views/product/edit_product.php';
        }
    }

    public function deleteProduct() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->productModel->showProductById($id);
            unlink('./store_img/'.$product['avatar']);
            $delProduct = $this->productModel->deleteById($id);
            $listImg = $this->productModel->showImgProductById($id);
            foreach($listImg as $img) {
                unlink('./store_img/'.$img['path']);
            }
            $delImg = $this->productModel->deleteSubById($id);
            if($delProduct && $delImg) {
                $_SESSION['alert'] = 2;
                header('location: index.php?page=product');
            }
        }
    }

    public function moreProduct() {

    }
}