<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <?php
            include_once './views/notification/alert.php';
            ?>
        <div id="noti"></div>
        <a href="index.php?page=product&method=add"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>Thêm sản phẩm</button></a>
        
            <div class="row m-t-30">
                <div class="col-md-12">
                <input type="text" name="daterange" class="daterange" value="<?= $firstOfMonthSub.' - '.$toDaySub ?>" />
                <input type="hidden" id="start_date" value="<?=$firstOfMonth?>">
                <input type="hidden" id="end_date" value="<?=$toDay?>">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 text-center list-product">
                            <thead>
                                <tr>
                                    <th>Ảnh đại diện</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Tình trạng</th>
                                    <th>Giá</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_product">
                                <?php
                                foreach($products as $product) {
                                    $store = $this->storeModel->showStoreById($product['id']);
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
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>

            

            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="more_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detail_product">Chi tiết sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="padding: 1rem 3rem !important;" class="modal-body modal-description">
        ...
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="quantity_product">Số lượng sản phẩm</h5>
      </div>
        <div class="modal-body modal-quantity">
            
        </div>
    </div>
  </div>
</div>