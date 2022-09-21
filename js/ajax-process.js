// Xử lý ajax thêm sản phẩm: Bằng id và size

$(document).ready(function () {
    $(document).on('change', '.product_size', function() { //Lấy giá giá trị của select size
        let sizeJS = $(this).val();
    });
    $(document).on('click', '.add_to_cart', function() {
        var idProduct = $(this).val();
        var sizeProduct = $(".product_size_"+idProduct).val(); //idsize (1->6)
        console.log(idProduct);
        console.log(sizeProduct);
        $.ajax({
            type: "POST",
            url: "./Servers/CartProcess.php?action=add",
            data: {
                id : idProduct,
                size: sizeProduct,
                qty: 1
            },
            dataType: "html",
            success: function (response) {
                // alert(response);
                $(`.cart-order`).html(response);
            }
        });
    });
});


// Hàm cập nhật html ở trang cart

const renderOrderCart = () => {
    $.ajax({
        type: "GET",
        url: "./Servers/CartProcess.php?action=render",
        dataType: "html",

        success: function(response) {
            $('.infor-product-pay').html(response);
        }
    });
}

// Hàm cập nhật html ở icon cart
const updateCart = () => {
    $.ajax({
        type: "GET",
        url: "./Servers/CartProcess.php?action=update",
        dataType: "html",

        success: function(response) {
            $('.cart-order').html(response);
        }
    });
}

// Xử lý ajax xóa sản phẩm: Bằng id và size
$(document).ready(function () {
    $(document).on('click', '.del_order', function() {
        var idJS = $(this).attr("id-product"); 
        var sizeJS = $(this).attr("size-product"); //38 -> 43
        $.ajax({
            type: "POST",
            url: "./Servers/CartProcess.php?action=del",
            data: {
                id : idJS,
                size: sizeJS
            },
            dataType: "html",
            success: function (response) {
                if (response) {
                    renderOrderCart();
                    updateCart();
                }
            }
        });
    });
});


// Xử lý ajax thanh toán ngay tại trang product detail
$(document).ready(function () {
    $('.border-choose-size').click(function() {
        if($(this).hasClass(`active`)) {
            $('.product-size').val($(this).attr("product-size"));
        }
    });
    
    $(document).on('click', '.pay_now', function() {
        var idProduct = $(this).val();
        var sizeProduct = $('.product-size').val()
        var qtyProduct = $('.input-qty').val()
        $.ajax({
            type: "POST",
            url: "./Servers/CartProcess.php?action=add",
            data: {
                id : idProduct,
                size: sizeProduct,
                qty : qtyProduct
            },
            dataType: "html",
            success: function (response) {
                $(`.cart-order`).html(response);
            }
        });
    });
});


// Xử lý ajax cập nhật số lượng sản phẩm ở trang giỏ hàng
$(document).ready(function () {
    $(document).on('click', '.change_qty', function() {
        var x = $(this).val(); //Lấy ra là cộng hoặc trừ
        var idProduct = $(this).attr("id-product")
        var sizeProduct = $(this).attr("size-product")
        var temp = $('.product_'+idProduct).val()
        if (x == '+') {
            temp ++;
            $('.product_'+idProduct).val(temp);
            if ($('.product_'+idProduct).val() > 10 || $('.product_'+idProduct).val() <= 0) {
                $('.product_'+idProduct).val(1)
                toastr["info"]("Số lượng sản phẩm không hợp lệ!")
            }
        }
        if (x == '-') {
            temp --;
            $('.product_'+idProduct).val(temp);
            if ($('.product_'+idProduct).val() > 10 || $('.product_'+idProduct).val() <= 0) {
                $('.product_'+idProduct).val(1)
                toastr["info"]("Số lượng sản phẩm không hợp lệ!")
            }
        }
        var qtyProduct = $('.product_'+idProduct).val()
        if (qtyProduct > 0 && qtyProduct < 10) {
            $.ajax({
                type: "POST",
                url: "./Servers/CartProcess.php?action=edit",
                data: {
                    id : idProduct,
                    size: sizeProduct,
                    qty : qtyProduct
                },
                dataType: "html",
                success: function (response) {
                    if (response) {
                        renderOrderCart();
                        updateCart();
                    }
                }
            })
        }
    });
    
});


// Hiện thị thông tin chi tiết sản phẩm ở thanh pop up
$(document).ready(function () {
    $(document).on('click', '.view-infor', function() {
        var idProduct = $(this).attr("product-id");
        $.ajax({
            type: "POST",
            url: "./Servers/CartProcess.php?action=view",
            data: {
                id : idProduct
            },
            dataType: "json",
            success: function (response) {
                $(`.content-list-popup`).html(response);
            }
        });
    });
});


// Xử lý ajax lọc sản phẩm ở trang sản phẩm

// $(document).ready(function() {
//     $(".size_product").click(function(){
//         var filterSize = $('.filter_size').val()
//         $.each($("input[name='size_product']:checked"), function(){
//             idSize = $(this).val()
//             if(filterSize.includes(idSize)) { 
//                 console.log(3);
//             }
//             else {
//                 if (filterSize == '') {
//                     $('.filter_size').val(idSize)
//                 }
//                 else {
//                     $('.filter_size').val(filterSize+','+idSize)
//                 }
//             }
            
//         });
//         console.log(filterSize);
//         // alert("My favourite sports are: " + favorite.join(", "));
//     });
// });