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
                    <form action="">
                        <div class="box-inp-infor">
                            <input type="text" name="name" id="name" placeholder="Họ và tên" required>
                        </div>
                        <div class="box-inp-infor">
                            <input type="text" name="address" id="address" placeholder="Địa chỉ của bạn" required>
                        </div>
                        <div class="box-inp-infor">
                            <input type="tel" name="phone" id="phone" placeholder="Số điện thoại" required>
                        </div>
                        <div class="box-inp-infor">
                            <input type="email" name="email" id="email" placeholder="Địa chỉ email" required>
                        </div>
                        <div class="box-inp-infor">
                            <textarea name="content" id="content" cols="30" rows="5" placeholder="Yêu cầu thêm của bạn về giao hàng..." required\></textarea>
                        </div>
                        <div class="box-radio-infor">
                            <div class="radio-infor d-flex">
                                <input type="radio" class="input-radio" name="radio-cod" id="radio-cod" value="cod" checked="checked">
                                <label for="radio-cod">Thanh toán khi nhận hàng ( COD )</label>
                            </div>
                            <div class="radio-infor d-flex alg-center">
                                <input type="radio" class="input-radio" name="radio-bacs" id="radio-bacs" value="bacs">
                                <label for="radio-bacs">Chuyển khoản trước khi nhận hàng </label>
                            </div>
                        </div>
                        <div class="btn-pay">
                            <button type="submit">
                                <span>Đặt hàng</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- infor-product-pay -->
            <div class="col-md-6">
                <div class="infor-product-pay">
                    <div class="quantity-product">
                        <p>Đơn hàng <span>(1 sản phẩm)</span> </p>
                    </div>
                    <div class="infor-product">
                        <div class="tb-infor-product">
                            <table class="content-tb-infor-product">
                                <!-- 1 -->
                                <tr>
                                    <td class="product-name-pay d-flex">
                                        <div class="img-infor-product-pay">
                                            <a href="product-detail.html">
                                                <img src="./image/produc-detail/product-detail (1).png" alt="">
                                            </a>
                                        </div>
                                        <!-- text -->
                                        <div class="text-product-in-cart">
                                            <a href="product-detail.html">
                                                <span class="name-product-in-cart">Giày lười da nam Penny Loafer GNLA1199-D</span>
                                            </a>
                                            <div class="price-product-in-cart">
                                                1x <span> 1,150,000 ₫ </span>
                                                <p class="text-size-pay">Size: <span>41</span></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-quantity-remove">
                                        <div class="icon-product-remove-pay">
                                            <span>
                                                <i class="fa-solid fa-xmark"></i>
                                            </span>
                                        </div>
                                        <div class="quantity-custom d-flex mb-30">
                                            <input aria-label="quantity" class="input-qty" min="1" max="10" name="" type="number" value="1">
                                            <div class="btn-up-down">
                                                <input class="plus is-form" type="button" value="+">
                                                <input class="minus is-form" type="button" value="-">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- 2 -->
                                <tr>
                                    <td class="product-name-pay d-flex">
                                        <div class="img-infor-product-pay">
                                            <a href="product-detail.html">
                                                <img src="./image/product/product-wallet (1).png" alt="">
                                            </a>
                                        </div>
                                        <!-- text -->
                                        <div class="text-product-in-cart">
                                            <a href="product-detail.html">
                                                <span class="name-product-in-cart">Ví da bò nam dáng ngang VLAN3502-1-N</span>
                                            </a>
                                            <div class="price-product-in-cart">
                                                1x <span> 1,150,000 ₫ </span>
                                                <p class="text-size-pay"></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-quantity-remove">
                                        <div class="icon-product-remove-pay">
                                            <span>
                                                <i class="fa-solid fa-xmark"></i>
                                            </span>
                                        </div>
                                        <div class="quantity-custom d-flex mb-30">
                                            <input aria-label="quantity" class="input-qty" min="1" max="10" name="" type="number" value="1">
                                            <div class="btn-up-down">
                                                <input class="plus is-form" type="button" value="+">
                                                <input class="minus is-form" type="button" value="-">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="total-money">
                        <ul class="list-total-money">
                            <li>
                                <p>Giá trị sản phẩm: <span>4,460,000 ₫ </span></p>
                                <p>Miễn phí vận chuyển</p>
                            </li>
                            <li>
                                <p>Tổng tiền thanh toán: <span class="txt-total-money">4,460,000 ₫ </span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>