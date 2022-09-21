<?php
include_once '../Controllers/ServerController.php';
include_once '../../helper/helper.php';

if(isset($_GET['action'])) {
    $method = $_GET['action'];
    switch($method) {
        case 'del_product':
            if(isset($_POST['id']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $id = $_POST['id'];
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $server = new ServerController();
                $server->updateProductById($id);
                // check nếu del thành công thì return ra đoạn html chèn vào body table
                if($server) {
                    $products = $server->showProduct($startDate, $endDate);
                    foreach($products as $product) {
                        $store = $server->showStoreById($product['id']);
                        ?>
                        <tr class="tr-shadow">
                            <td>
                                <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                    <img style="width: 150px;" src="../store_img/<?=$product['avatar']?>" alt="">
                                </a>
                                
                            </td>
                            <td class="desc">
                                <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                <?=$product['name']?></td>
                                </a>
                                
                            <td><?=$product['title']?></td>
                            <td> <span class="<?=addColorStatusProduct($store['total'], $product['active'])?>"><?= checkStatusProduct($store['total'], $product['active'])?></span></td>
                            <td><?=currency_format($product['price'])?></td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                    </button>

                                    <!-- del cách 2: sử dụng ajax -->

                                    <button value="<?=$product['id']?>" id="del_product" class="item"  data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>

                                    <!-- show description -->
                                    
                                    <button value="<?=$product['id']?>"class="item detail_product"  data-toggle="modal" data-placement="top" title="More" data-target="#more_product">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                }
            }
            break;
        case 'show_product':
            if(isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $server = new ServerController();
                $products = $server->showProduct($startDate, $endDate);
                foreach($products as $product) {
                    $store = $server->showStoreById($product['id']);
                    ?>
                    <tr class="tr-shadow">
                        <td>
                            <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                <img style="width: 150px;" src="../store_img/<?=$product['avatar']?>" alt="">
                            </a>
                            
                        </td>
                        <td class="desc">
                            <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                            <?=$product['name']?></td>
                            </a>
                            
                        <td><?=$product['title']?></td>
                        <td> <span class="<?=addColorStatusProduct($store['total'], $product['active'])?>"><?= checkStatusProduct($store['total'], $product['active'])?></span></td>
                        <td><?=currency_format($product['price'])?></td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                </button>

                                <!-- del cách 2: sử dụng ajax -->

                                <button value="<?=$product['id']?>" id="del_product" class="item"  data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                <!-- show description -->
                                
                                <button value="<?=$product['id']?>"class="item detail_product"  data-toggle="modal" data-placement="top" title="More" data-target="#more_product">
                                    <i class="fa fa-eye"></i>
                                </button>
                                
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
            }
            break;
        case 'description':
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                $server = new ServerController();
                $server->showDescription($id);
            }
            break;
        case 'quantity':
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                $server = new ServerController();
                $quantitys = $server->showQtySizeProuduct($id);
                storeProduct($quantitys);
            }
            break;
        case 'modal':
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                echo true;
            }
            break;
        case 'del_order':
            if(isset($_POST['id']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $id = $_POST['id'];
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $server = new ServerController();
                $server->deleteOrder($id);
                if($server) {
                    $orders = $server->showOrder($startDate, $endDate);
                    foreach($orders as $order) {
                    ?>
                        <tr class="tr-shadow">
                            <td><?=$order['id']?></td>
                            <td><?=$order['created_at']?></td>
                            <td class="desc"><?=$order['name']?></td>
                            <td><?=currency_format($order['check_out'])?></td>
                            <td><?=$order['status'] == 4 ? currency_format($order['check_out']) : ''?></td>
                            <td>
                                <span class="<?=addColorStatus($order['status'])?>"><?= checkStatus($order['status'])?></span>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <a href="index.php?page=order&method=update&id=<?=$order['id']?>">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                    </button>
                                    <button value="<?=$order['id']?>" id="del_order" class="item"  data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php }
                }
            }
            break;
        case 'show_order':
            if(isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $server = new ServerController();
                $orders = $server->showOrder($startDate, $endDate);
                foreach($orders as $order) {
                    ?>
                        <tr class="tr-shadow">
                            <td><?=$order['id']?></td>
                            <td><?=$order['created_at']?></td>
                            <td class="desc"><?=$order['name']?></td>
                            <td><?=currency_format($order['check_out'])?></td>
                            <td><?=$order['status'] == 4 ? currency_format($order['check_out']) : ''?></td>
                            <td>
                                <span class="<?=addColorStatus($order['status'])?>"><?= checkStatus($order['status'])?></span>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <a href="index.php?page=order&method=update&id=<?=$order['id']?>">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                    </button>
                                    <button value="<?=$order['id']?>" id="del_order" class="item"  data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php }
            }
            break;
        }
    }


function descriptionProduct()
{
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $server = new ServerController();
        $server->showDescription($id);
    }
}

function storeProduct($quantitys)
{
    ?>
    <table class="table table-data2 text-center">
<thead>
    <tr>
        <th>Size</th>
        <th>Số lượng</th>
    </tr>
</thead>
<tbody id="list_quantity">
    <?php
    if(!empty($quantitys)) {
    foreach($quantitys as $quantity) {
    ?>
    <tr class="tr-shadow">
        <?php
        if($quantity['total_qty'] == 0) {
            ?>
            <td> <b>HẾT HÀNG</b></td>
            <?php
        }
        else {
        ?>
        <td> <?=$quantity['size']?></td>
        <td class="desc"> <?=$quantity['total_qty']?></td>
        <?php
            }
        ?>
    </tr>
    <?php
    }}
    else {
        ?>
        <tr class="tr-shadow">
            <td> <b>CHƯA NHẬP HÀNG</b></td>
        </tr>
    <?php
    }
    ?>
</tbody>
</table>
<?php
}