

// Xử lý ajax xóa sản phẩm
$(document).on('click', '#del_product', function() {
    let idJs = $(this).val();
    var startDate = $('#start_date').val()
    var endDate = $('#end_date').val()
    check = confirm("Bạn có muốn xóa sản phẩm?");
    if(check) {
        $.ajax({
            url : './Servers/ajax_process.php?action=del_product',
            type : 'POST',
            data: {
                id: idJs,
                startDate: startDate,
                endDate : endDate
            },
            dataType: 'html',
            success : function(response) {
                $('#list_product').html(response);
                toastr["success"]("Xóa sản phẩm thành công!")
            }      
        })
    }  
})

// Hàm show chi tiết sản phẩm
const showDescription = (idJs) => {
    $.ajax({
        type: "POST",
        url: "./Servers/ajax_process.php?action=description",
        data: {
            id: idJs //lỗi js
        },
        dataType: "html",
        success: function(response) {
            $('.modal-description').html(response);
        }
    });
}

// Hàm show số lượng sản phẩm trong kho
const showQuantity = (idJs) => {
    $.ajax({
        type: "POST",
        url: "./Servers/ajax_process.php?action=quantity",
        data: {
            id: idJs //lỗi js
        },
        dataType: "html",
        success: function(response) {
            $('.modal-quantity').html(response);
        }
    });
}

// Xử lý ajax xem thông tin sản phẩm
$(document).on('click', '.detail_product', function() {
    let idJs = $(this).val();
    $.ajax({
        url : './Servers/ajax_process.php?action=modal',
        type : 'POST',
        data: {
            id: idJs
        },
        dataType: 'html',
        success : function(response) {
            // console.log(response);
            // if(response) {
            // }
            showDescription(idJs);
            showQuantity(idJs);
            // $('.modal-description').html(response);
        }      
    })
})


// Xử lý ajax xóa đơn hàng
$(document).on('click', '#del_order', function() {
    let idJs = $(this).val();
    var startDate = $('#start_date').val()
    var endDate = $('#end_date').val()
    check = confirm("Bạn có muốn xóa đơn hàng?");
    if(check) {
        $.ajax({
            url : './Servers/ajax_process.php?action=del_order',
            type : 'POST',
            data: {
                id: idJs,
                startDate: startDate,
                endDate : endDate
            },
            dataType: 'html',
            success : function(response) {
                $('#list_order').html(response);
                toastr["success"]("Xóa đơn hàng thành công!")
            }      
        })
    }  
})

// Xử lý ajax show đơn hàng dựa theo từng ngày
$(document).on('click', '.applyBtn', function() {
    var startDate = $('#start_date').val()
    var endDate = $('#end_date').val()
    $.ajax({
        url : './Servers/ajax_process.php?action=show_order',
        type : 'POST',
        data: {
            startDate: startDate,
            endDate : endDate
        },
        dataType: 'html',
        success : function(response) {
            $('#list_order').html(response);
        }      
    })
})



// Xử lý ajax hiện thị thông tin sản phẩm theo ngày
$(document).on('click', '.applyBtn', function() {
    var startDate = $('#start_date').val()
    var endDate = $('#end_date').val()
    $.ajax({
        url : './Servers/ajax_process.php?action=show_product',
        type : 'POST',
        data: {
            startDate: startDate,
            endDate : endDate
        },
        dataType: 'html',
        success : function(response) {
            $('#list_product').html(response);
        }      
    })
})

$(`span.sub_avatar__remove`).click(function () { 
    let id = $(this).attr(`sub-avatar-id`);
    var itemId =  $(`.sub_avatar__id`).val();
    if(itemId == '') {
        $(`.sub_avatar__id`).val(id);
    } else {
        $(`.sub_avatar__id`).val(itemId+','+id);
    }
    $(`#sub_img__${id}`).remove();
});

$(document).ready(function () {
    $('.list-product').DataTable();

    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        
        $(`#start_date`).val(start.format('YYYY-MM-DD'));
        $(`#end_date`).val(end.format('YYYY-MM-DD'));
      });
});

$(document).ready(function () {
    $('.list_order').DataTable({
        order: [[1, 'desc']],
    });

    // $('input[name="daterange"]').daterangepicker({
    //     locale: {
    //         format: 'MM-YYYY-DD'
    //     }
    // });
    
});