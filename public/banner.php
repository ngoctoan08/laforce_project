<section class="banner">
        <div class="img-banner">
            <img src="./image/banner/banner-list-detail-product.jpg" alt="">
        </div>
        <div class="mini-list-banner">
            <ul class="custom-nav d-flex jtf-center alg-center">
                <li>
                    <a href="./index.php">Trang chủ</a>
                </li>
                <li>/</li>
                <li>
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : '';
                    
                    ?>
                    <a href="./index.php?page=<?=$page?>">
                        <?php
                        switch($page) {
                            case 'product':
                                $page = "Sản phẩm";
                                break;
                            case 'category':
                                $page = "Danh mục";
                                break;
                            case 'cart':
                                $page = "Giỏ hàng";
                                break;
                            case 'news':
                                $page = "Tin tức";
                                break;
                            case 'detail_news':
                                $page = "Tin tức";
                                break;
                            case 'introduce':
                                $page = "Giới thiệu";
                                break;
                            case 'contact':
                                $page = "Liên hệ";
                                break;
                        }
                            echo $page;
                        ?>
                    </a>
                </li>
            </ul>
            <div class="name-page">
                <span><?=$page?></span>
            </div>
        </div>
    </section>