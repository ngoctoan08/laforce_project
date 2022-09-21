<?php
    include_once './public/banner.php';
    // echo '<pre>';
    // print_r($_SESSION['cart']);
    // echo '</pre>';
?> 

<!-- infor-pay -->
<section class="infor-pay">
    <div class="container">
        <div class="row">
            <!-- form-infor-customer -->
            <div class="col-md-6">
                <div class="form-infor-customer">
                    <div class="title-form">
                        <span>Thông tin cá nhân</span>
                    </div>
                    <form action="index.php?page=cart&method=process" method="POST">
                        <div class="box-inp-infor">
                            <input type="text" name="name" id="name" placeholder="Họ và tên" required>
                        </div>
                        <div class="box-inp-infor">
                            <input type="email" name="email" id="email" placeholder="Địa chỉ email" required>
                        </div>
                        <div class="box-inp-infor">
                            <input type="tel" name="phone" id="phone" placeholder="Số điện thoại" required>
                        </div>
                        
                        <div class="box-inp-infor">
                            <input type="text" name="address" id="address" placeholder="Địa chỉ của bạn" required>
                        </div>
                        <div class="box-inp-infor">
                            <textarea name="note" id="note" cols="30" rows="5" placeholder="Yêu cầu thêm của bạn về giao hàng..."></textarea>
                        </div>
                        <!-- <div class="box-radio-infor">
                            <div class="radio-infor d-flex">
                                <input type="radio" class="input-radio" name="ship" id="radio-cod" value="cod" checked="checked">
                                <label for="radio-cod">Thanh toán khi nhận hàng ( COD )</label>
                            </div>
                            <div class="radio-infor d-flex alg-center">
                                <input type="radio" class="input-radio" name="ship" id="radio-bacs" value="bacs">
                                <label for="radio-bacs">Chuyển khoản trước khi nhận hàng </label>
                            </div>
                        </div> -->
                        <div class="btn-pay">
                            <button type="submit" name="order">
                                <span class="order-product">Đặt hàng</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- infor-product-pay -->
            <div class="col-md-6">
                <div class="infor-product-pay">
                    <div class="quantity-product">
                        <?php
                            $qty = 0;
                            if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
                                foreach($_SESSION['cart'] as $id) {
                                    foreach($id as $product) {
                                        $qty += $product['qty'];
                                    }
                                }
                            }
                        ?>
                        <p>Đơn hàng (<?= $qty?> sản phẩm)</span> </p>
                    </div>
                    <div class="infor-product">
                        <div class="tb-infor-product">
                            <?php
                            if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
                                $total = 0;
                            ?>
                            <table class="content-tb-infor-product">
                                <?php
                                foreach($_SESSION['cart'] as $id) {
                                    foreach($id as $product) {
                                        $total += $product['price']*$product['qty'];
                                ?>
                                <!-- 1 -->
                                <tr>
                                    <td class="product-name-pay d-flex">
                                        <div class="img-infor-product-pay">
                                            <a href="index.php?page=product&method=detail&id=<?=$product['id']?>">
                                                <img src="./store_img/<?=$product['avatar']?>" alt="">
                                            </a>
                                        </div>
                                        <!-- text -->
                                        <div class="text-product-in-cart">
                                            <a href="index.php?page=product&method=detail&id=<?=$product['id']?>">
                                                <span class="name-product-in-cart"><?=$product['name']?> </span>
                                            </a>
                                            <div class="price-product-in-cart">
                                            <?=$product['qty']?> x <span> <?=currency_format($product['price'])?></span>
                                                <p class="text-size-pay">Size: <span><?=$product['size']?></span></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-quantity-remove">
                                        <div class="icon-product-remove-pay">
                                            <span class="del_order" id-product = "<?=$product['id']?>" size-product = "<?=$product['size']?>">
                                                <i class="fa-solid fa-xmark"></i>
                                            </span>
                                        </div>
                                        <div class="quantity-custom d-flex mb-30">
                                            <input aria-label="quantity" class="product_<?=$product['id']?>" min="1" max="10" name="" type="number" value="<?=$product['qty']?>">
                                            <div class="btn-up-down">
                                                <input class="plus is-form change_qty" type="button" value="+" id-product = "<?=$product['id']?>" size-product = "<?=$product['size']?>">
                                                <input class="minus is-form change_qty" type="button" value="-" id-product = "<?=$product['id']?>" size-product = "<?=$product['size']?>">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="total-money">
                        <ul class="list-total-money">
                            <li>
                                <p>Giá trị sản phẩm: </p>
                                <p>
                                    <span><?=currency_format($total)?></span>
                                    <span>Miễn phí vận chuyển </span> 
                                </p>
                            </li>
                            <li>
                                <p class="txt-total-money">Tổng tiền thanh toán:</p>
                                <p>
                                    <span class="txt-total-money"><?=currency_format($total)?></span>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
