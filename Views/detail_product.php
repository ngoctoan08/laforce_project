    <?php
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    ?>
    
    <!-- mini-menu -->
    <section class="mini-menu-header">
        <div class="box-mini-menu">
            <ul class="custom-nav menu-header-product-detail d-flex jtf-center alg-center">
                <li>
                    <a href="index.php">Trang chủ</a>
                </li>
                <li>/</li>
                <li>
                    <a href="index.php?page=product&method=western"><?=$product['title']?></a>
                </li>
                <li>/</li>
                <li>
                    <a href="index.php?page=product&method=detail&id=<?=$product['id']?>"><?=$product['name']?></a>
                </li>
            </ul>
        </div>
    </section>

    <!-- product-detail -->
    <section class="product-detail">
        <div class="container">
            <div class="row">
                <!-- img-product -->
                <div class="col-md-7">
                    <div class="box-img-product d-flex alg-center">
                        <div class="thumbnails">
                            <div class="thumb">
                                <?php
                                foreach($listImg as $img) {
                                ?>
                                    <a class="zoom" href="javascript:void(0)">
                                        <img src="./store_img/<?=$img['path']?>" alt="" onmouseover="changeImage(<?=$img['id']?>)" id="<?=$img['id']?>">
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="thumb">
                                <a class="zoom" href="javascript:void(0)">
                                    <img src="./store_img/<?=$product['avatar']?>" alt="" onmouseover="changeImage('six')" id="six">
                                </a>
                            </div>
                        </div>
                        <div class="big-slide-img">
                            <img src="./store_img/<?=$product['avatar']?>" id="img-main" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="content-product-detail">
                        <h1 class="title-product-detail"><?=$product['name']?></h1>
                        <div class="price-product">
                        <!-- <div class="text-price">
                            <span class="text-price-gray"><?=currency_format($product['price'] * 110 / 100) ?></span>
                            <span><?=currency_format($product['price']) ?></span>
                        </div> -->
                            <del style="opacity: 0.5;"><?=currency_format($product['price'] * 110 / 100) ?></del>
                            <span><?= currency_format($product['price']) ?></span>
                        </div>
                            <div class="choose-size">
                                <p>Size</p>
                                <div class="box-border-choose-size d-flex mb-15 ">
                                    <?php
                                    foreach($sizes[$product['id']] as $size) {
                                    ?>
                                    <div class="border-choose-size" product-size = "<?=$size['id']?>">
                                        <span><?=$size['size']?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                <!-- <input type="hidden" min = "1" max ="6" class="product-size" name="size" value="1"> -->
                            </div>
                            <div class="choose-quantity d-flex alg-center">
                                <p>Chọn số lượng</p>
                                <div class="quantity-custom d-flex">
                                    <input aria-label="quantity" class="input-qty" min="1" max="10" name="quantity" type="number" value="1">
                                    <div class="btn-up-down">
                                        <input class="plus is-form" type="button" value="+">
                                        <input class="minus is-form" type="button" value="-">
                                    </div>
                                </div>
                            </div>
                            <div class="tutorial-choose-size mt-30">
                                <div class="btn-tutorial-choose-size">
                                    <img src="./image/icon/ruler.png" alt="">
                                    <span>Hướng dẫn chọn size</span>
                                </div>
                            </div>
                            <div class="btn-product-detail">
                                <a href="index.php?page=cart"  >
                                    <button class="btn-submit-product-detail txt-center pay_now" value="<?=$product['id']?>">
                                        <span>Thanh toán ngay</span>
                                    </button>
                                </a>
                                <button class="btn-cart-product-detail">
                                    <span>
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </span>
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="detail-info">
        <div class="container">
            <div class="col-md-7">
                <div class="form-info-custom">
                    <div class="title-info-custom">
                        <span>Thông tin cá nhân</span>
                    </div>

                    <!-- Form đặt hàng nhanh -->
                    <form action="index.php?page=cart&method=quick-order" method="POST">
                        <!-- Thông tin sản phẩm -->
                        <input type="hidden" name="product-id" value="<?=$product['id']?>">
                        <input type="hidden" name="product-name" value="<?=$product['name']?>">
                        <input type="hidden" name="price" value="<?=$product['price']?>">
                        <input type="hidden" min = "1" max ="6" class="product-size" name="size" value="1">
                        <input type="hidden" class="qty-quick" min="1" max="10" name="quantity" value="1">
                        
                        <!-- Thông tin khách hàng -->
                        <div class="input-info-custom">
                            <input type="text" name="name" id="name" placeholder="Họ và tên" required>
                        </div>
                        <div class="input-info-custom">
                            <input type="tel" name="phone" id="phone" placeholder="Số điện thoại" required>
                        </div>
                        <div class="input-info-custom">
                            <input type="text" name="address" id="address" placeholder="Địa chỉ nhận hàng" required>
                        </div>
                        <div class="input-info-custom">
                            <button type="submit" class="btn-submit-product-detail quick-order" name="quick-order">
                                <span>Đặt hàng nhanh</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="info-detail-product">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- 1 -->
                        <div class="panel panel-default border-product-detail">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Thông tin chi tiết
                                        <span>+</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <?=$product['description']?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popup-choose-size">
        <div class="img-choose-size">
            <img src="./image/produc-detail/chon-size-giay.png" alt="">
            <div class="btn-close">
                <span>
                    <i class="fa-solid fa-xmark"></i>
                </span>
            </div>
        </div>
    </section>