<?php
include_once './Core/Controller.php';
require_once './vendor/autoload.php';

use Carbon\Carbon;
class OrderController extends Controller
{
    public $customerModel;
    public function __construct()
    {
        $this->orderModel = parent::model('Order');
        $this->orderDetailModel = parent::model('OrderDetail');
        $this->storeModel = parent::model("Store");
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

                ##format cho cái input daterange
                $nowSub = Carbon::now();
                $toDaySub = $nowSub->format('m-d-Y');
                $firstOfMonthSub = $nowSub->firstOfMonth()->format('m-d-Y');
                
                $orders = $this->orderModel->showAllOrder($firstOfMonth, $toDay);
                include_once './views/transaction/order/show_order.php';
                break;
            case 'update':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $order = $this->orderModel->showOrderById($id);
                    $orderDetail = $this->orderDetailModel->showOrderDetailByOrderId($id);

                    $totalCheckOut = 0;
                    foreach($orderDetail as $product) {
                        $totalCheckOut += $product['total'];
                    }
                    if(isset($_POST['update_status'])) {
                        $status = $_POST['status'];
                        $updateStatus = $this->orderModel->updateStatus($id, $status); //Cập nhật trạng thái
                        // gọi đến hàm update qty ở store
                    }
                    if($updateStatus) {
                        $order = $this->orderModel->showOrderById($id);
                        // Nếu status là đang giao hàng thì update số lượng sản phẩm trong kho
                        if($order['status'] == 3) {
                            foreach($orderDetail as $product)
                            {
                                // chuyển đổi từ size :38 --> idsize :1
                                $size = $this->storeModel->getSize($product['product_size']);
                                // Cập nhật số lượng ở trong kho
                                $updateStore = $this->storeModel->updateQtyProduct($product['product_id'], $size['id'], $product['quantity']);
                            }
                        }
                        if($updateStatus)

                            header('location: index.php?page=order');
                    }
                }
                include_once './views/transaction/order/update_order.php';
                break;
            case 'delete':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $deleteOrder = $this->orderModel->deleteOrderById($id);
                    if($deleteOrder) {
                        $_SESSION['alert'] = 3;
                        header('location: index.php?page=order');
                    }
                }
                break;
        }
    }
}