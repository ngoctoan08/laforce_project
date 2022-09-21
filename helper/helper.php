<?php

if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}

if(!function_exists('converSlugUrl')){
    function converSlugUrl($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
        
            return preg_replace("/( )/", '-', $str);
    }
}

// check active


if(!function_exists('checkActive')){
    function checkActive($value = 'home')
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        if($page == $value) {
            return 'active';
        }
    }
}


if(!function_exists('checkPageDetail')){
    function checkPageDetail()
    {
        // $method = isset($_GET['id']) ? $_GET['method'] : '';
        // if($method == 'detail') {
        //     return 'color-product-detail';
        // }
        if(isset($_GET['id'])) {
            return 'color-product-detail';
        }
    }
} 

if(!function_exists('checkStatus')) {
    function checkStatus($value) {
        if($value == 1)
            return "Chưa xử lý";
        elseif ($value == 2) {
            return "Đang xử lý";
        }
        elseif ($value == 3) {
            return "Đang giao hàng";
        }
        elseif ($value == 4) {
            return "Đã hoàn thành";
        }
        elseif ($value == 5) {
            return "Đã hủy";
        }
        else {
            return "";
        }
    }
}


if(!function_exists('addColorStatus')) {
    function addColorStatus($value) {
        if($value == 1)
            return "status--denied";
        elseif ($value == 2) {
            return "status--process";
        }
        elseif ($value == 3) {
            return "status--process";
        }
        elseif ($value == 4) {
            return "status--process";
        }
        elseif ($value == 5) {
            return "status--denied";
        }
        else {
            return "";
        }
    }
}


if(!function_exists('addSelected')) {
    function addSelected($status, $value) {
        if($status == $value)
            return "selected";
    }
}

if(!function_exists('checkStatusProduct')) {
    function checkStatusProduct($value, $active = 1) {
        if($active == 1) {
            if($value == "")
                return "Chưa nhập hàng";
            if($value == 0)
                return "Hết hàng";
            if($value > 0)
                return "Đang hoạt động";
        }
        else
            return "Dừng hoạt động";
    }
}

if(!function_exists('addColorStatusProduct')) {
    function addColorStatusProduct($value, $active = 1) {
        if($active == 1) {
            if($value == "")
            return "status--denied";
            if ($value == 0) 
                return "status--denied";
            if ($value > 0) 
                return "status--process";
        }
        else
            return "status--denied";
    }
}

if(!function_exists('alertColorStatusOrder')) {
    function alertColorStatusOrder($qtyStore, $qtyOrder, $active) {
        if($active == -1) {
            return "status--denied";
        }
        else {
            if($qtyStore < $qtyOrder) {
                return "status--denied";
            }
            else {
                return "";
            }
        }
    }
}

if(!function_exists('alertStatusOrder')) {
    function alertStatusOrder($qtyStore, $qtyOrder, $active) {
        if($active == -1) {
            return "Ngừng bán";
        }
        else {
            if($qtyStore < $qtyOrder) {
                return "Hết hàng";
            }
            else {
                return "";
            }
        }
    }
}
