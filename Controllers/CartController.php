<?php
include_once './Core/Controller.php';
class CartController extends Controller
{
    public $cartModel;

    public function __construct()
    {
        $this->cartModel = parent::model('Cart');
        $this->index();
    }

    public function index()
    {
        include_once './Views/cart.php';
        $method = isset($_GET['method']) ? $_GET['method'] : 'process';
        switch($method) {
            case 'process':
                $this->customerProcess();
                break;
            case 'quick-order':
                $this->quickOrder();
                break;
        }

    }
  
    public function quickOrder()
    {
        if(isset($_POST['quick-order'])) {
            ## Thông tin của khách hàng
            $name = $_POST['name'];
            $email = '';
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = '';

            ## Thông tin sản phẩm
            $productId = $_POST['product-id'];
            $productName = $_POST['product-name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $idSize = $_POST['size'];
            $size = $this->cartModel->showSizeById($idSize);
            $total = $price * $quantity;

            $createCustomer = $this->cartModel->insertCustomer($name, $email, $phone, $address);
            $idCustomer = $this->cartModel->returnLastId();
            $createOrder = $this->cartModel->insertOrder($idCustomer, $note);
            $idOrder = $this->cartModel->returnLastId();

            $createOrderDetail = $this->cartModel->insertOrderDetail($idOrder, $productId, $productName, $size['size'], $price, $quantity, $total);
            if($createOrderDetail) {
                header('location: index.php?page=home');
            }
        }
    }

    public function customerProcess()
    {
        if(isset($_POST['order'])) {
            ## Thông tin khách hàng
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = $_POST['note'];

            $createCustomer = $this->cartModel->insertCustomer($name, $email, $phone, $address);
            $idCustomer = $this->cartModel->returnLastId();
            $infoCustomer = $this->cartModel->showInfoCustomerById($idCustomer);
            $createOrder = $this->cartModel->insertOrder($idCustomer, $note);
            $idOrder = $this->cartModel->returnLastId();

            if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
                // Nội dung gửi mail là một table bao gồm các trường thông tin như dưới
                $content = "<h3 style='font-size: 0.9em; font-family: sans-serif; padding: 12px 15px;'> Cảm ơn quý khách đã đặt hàng tại Laforce </h3>";
                $content .= "<h3 style='font-size: 0.9em; font-family: sans-serif; padding: 12px 15px;'> Mã đơn hàng: ".$idOrder."</h3>";
                $content .= "<table style='
                    border-collapse: collapse;
                    margin: 25px 0;
                    font-size: 0.9em;
                    font-family: sans-serif;
                    min-width: 800px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                    text-align: center;'>
                            <thead>
                                <tr style='background-color: #009879;
                                color: #ffffff;
                                text-align: center;'>
                                    <th style='padding: 12px 15px;'> STT</th>
                                    <th> Tên sản phẩm</th>
                                    <th> Size</th>
                                    <th> Đơn giá</th>
                                    <th> SL</th>
                                    <th> Tổng tiền</th>
                                </tr>
                        </thead>
                        <tbody>
                        ";
                $count = 0;
                $totalCheckOut = 0;
                foreach($_SESSION['cart'] as $id) {
                    foreach($id as $product) {
                        $total = $product['qty'] * $product['price'];
                        $totalCheckOut += $total;
                        $count ++;
                        $content.="
                            <tr style='font-weight: bold;
                            color: #009879;'>
                                <td style='padding: 12px 15px;'>".$count."</td>
                                <td>".$product['name']."</td>
                                <td>".$product['size']."</td>
                                <td>".currency_format($product['price'])."</td>
                                <td>".$product['qty']."</td>
                                <td>".currency_format($total)."</td>
                            </tr>";
                        $createOrderDetail = $this->cartModel->insertOrderDetail($idOrder, $product['id'], $product['name'], $product['size'], $product['price'], $product['qty'], $total);
                    }
                }
                $content.="</tbody> </table>" ;      
                $content.= "<h3 style='font-size: 0.9em; font-family: sans-serif; padding: 12px 15px;'> Tổng tiền thanh toán: <span style='color: red;'>".currency_format($total)."</span></h3>";

                $content.= "<table style='
                border-collapse: collapse;
                    margin: 25px 0;
                    font-size: 0.9em;
                    font-family: sans-serif;
                    min-width: 800px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); 
                    text-align:center'>
                        <tr style='font-weight: bold; text-align:center'>
                            <td style='padding: 12px 15px; '>Khách hàng: </td>
                            <td>".$infoCustomer['name']."</td>
                        </tr>
                        <tr style='font-weight: bold; text-align:center'>
                            <td style='padding: 12px 15px; '>Địa chỉ: </td>
                            <td>".$infoCustomer['address']."</td>
                        </tr>
                        <tr style='font-weight: bold; text-align:center'>
                            <td style='padding: 12px 15px; '>Số điện thoại: </td>
                            <td>".$infoCustomer['phone']."</td>
                        </tr>
                        <tr style='font-weight: bold; text-align:center'>
                            <td style='padding: 12px 15px;'>Email</td>
                            <td>".$infoCustomer['email']."</td>
                        </tr>
                </table>";
                $title = "Bạn đã mua hàng thành công tại Laforce";
            }
            if($createOrderDetail) {
                // Gửi mail
                include_once './Core/Mailer.php';
                $mail = new Mailer();
                $mail -> sendMail($email, $name, $title, $content);

                unset($_SESSION['cart']);
                header('location: index.php?page=home');
            }
        }
    }
}