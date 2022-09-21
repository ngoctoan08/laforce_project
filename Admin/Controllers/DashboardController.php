<?php
include_once './Core/Controller.php';
require_once './vendor/autoload.php';

use Carbon\Carbon;
class Dashboard extends Controller
{
    public function __construct()
    {
        $this->orderModel = parent::model('Order');
        $this->orderDetailModel = parent::model('OrderDetail');
        $this->index();
    }

    public function index ()
    {
        $now = Carbon::now();
        $toDay = $now->format('Y-m-d');
        $firstOfMonth = $now->firstOfMonth()->format('Y-m-d'); 
        $countOrder = $this->orderModel->countOrder();
        $orders = $this->orderModel->showTurnover();
        $turnover = 0;
        foreach($orders as $order) {
            $turnover += $order['check_out'];
        }

        include_once './views/dashboard.php';
    }
}