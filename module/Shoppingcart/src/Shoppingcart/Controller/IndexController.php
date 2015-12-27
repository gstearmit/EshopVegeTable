<?php

namespace Shoppingcart\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Invoice\Model\Oder;
use Invoice\Model\Oderdetail;
use Shoppingcart\Model\Mypaypal;
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;

class IndexController extends AbstractActionController {

    protected $Catalog_Adt;

    public function getCatalogAdtTable() {
        if (!$this->Catalog_Adt) {
            $sm = $this->getServiceLocator();
            $this->Catalog_Adt = $sm->get('Apotravinycz\Model\CatalogTable');
        }
        return $this->Catalog_Adt;
    }

    protected $Product_Adt;

    public function getProductAdtTable() {
        if (!$this->Product_Adt) {
            $sm = $this->getServiceLocator();
            $this->Product_Adt = $sm->get('Apotravinycz\Model\ApotravinyczproductTable');
        }
        return $this->Product_Adt;
    }

    protected $Order;

    public function getOrderAdtTable() {
        if (!$this->Order) {
            $sm = $this->getServiceLocator();
            $this->Order = $sm->get('Invoice\Model\OderTable');
        }
        return $this->Order;
    }

    protected $Orderdeail;

    public function getOrderdetailAdtTable() {
        if (!$this->Orderdeail) {
            $sm = $this->getServiceLocator();
            $this->Orderdeail = $sm->get('Invoice\Model\OderdetailTable');
        }
        return $this->Orderdeail;
    }

    public function addcartAction() {

        $this->layout('layout/apotravinytheme');
        $container = new Container('shopcart');
        $quanlity = addslashes(trim($this->params()->fromPost("qty")));
        $productId = addslashes(trim($this->params()->fromPost("id-product")));
        $number_pro = addslashes(trim($this->params()->fromPost("number-product")));
        if($quanlity <= 0 || $quanlity > $number_pro){
            echo '<script>alert("Počet výrobků nesmí být menší než 0 nebo větší než'.$number_pro.'"); window.history.go(-1);</script>';
        }else{
        $this->checkcart($productId, $quanlity);
        $this->redirect()->toUrl(WEBPATH . '/shoppingcart/viewcart');
        }
    }

    public function updatecartAction() {
        $container = new Container('shopcart');
        $quanlity = addslashes(trim($this->params()->fromPost("qty")));
        $productId = addslashes(trim($this->params()->fromPost("id-product")));
        $mes = $this->checkcart($productId, $quanlity);
        echo $mes . '-' . count($container->cart);
        die;
    }

    private function checkcart($productId, $quanlity) {
        $container = new Container('shopcart');
        $arraycart = $container->cart;
        $mes = "";
        if (isset($arraycart[$productId])) {
            $quanlityoffset = $arraycart[$productId];
            $quanlityupdate = $quanlityoffset + $quanlity;

            $arraycart[$productId] = $quanlityupdate;
            $mes = "Cập nhật sản phẩm giỏ hàng thành công.";
        } else {
            $arraycart[$productId] = $quanlity;
            $mes = "Thêm sản phẩm vào giỏ hàng thành công.";
        }
        $container->cart = $arraycart;
        return $mes;
    }

    public function viewcartAction() {
        $this->layout('layout/apotravinytheme');
        $this->getcatalog();
        $product_hot = $this->getProductAdtTable()->producthot();
        //die;
        $container = new Container('shopcart');
        $arraycart = $container->cart;
        if ($arraycart != null) {
            foreach ($arraycart as $key => $value) {
                $arrayproduct[] = $key;
            }
            $listproduct = $this->getProductAdtTable()->product_viewcart($arrayproduct);
        }
        return array(
            'product_hot' => $product_hot,
            'listproduct' => $listproduct
        );
    }

    public function checkoutAction() {
        $this->layout('layout/apotravinytheme');
        $this->getcatalog();
        $container = new Container('shopcart');
        $arraycart = $container->cart;
        if ($this->request->isPost()) {
            $name = addslashes(trim($this->params()->fromPost('name')));
            $mail = addslashes(trim($this->params()->fromPost('email')));
            $phone = addslashes(trim($this->params()->fromPost('phone')));
            $address = addslashes(trim($this->params()->fromPost('address')));
            $checkout = addslashes(trim($this->params()->fromPost('checkout')));
            $total_price = addslashes(trim($this->params()->fromPost('totalprice')));
            $time = addslashes(trim($this->params()->fromPost('time')));

            //Add oder
            $data_oder = array(
                'id_user' => '',
                'customer' => $name,
                'email' => $mail,
                'address' => $address,
                'phone' => $phone,
                'time' => $time,
                'totalprice' => $total_price,
                'type' => $checkout
            );

            $obj = new Oder();
            $obj->exchangeArray($data_oder);
           // $this->getOrderAdtTable()->addoder($obj);

            //Add oder detail
            $get_odernew = $this->getOrderAdtTable()->getoder_new();
            $id_odernew = $get_odernew['id'];
            foreach ($arraycart as $key => $value) {
                $arrayproduct[] = $key;
            }
            $listproduct_cat = $this->getProductAdtTable()->product_viewcart($arrayproduct);

            $total_money = '';
            foreach ($listproduct_cat as $key1 => $value1) {
                $qty = $arraycart[$value1['id']];
                $id_product = $value1['id'];
                $price_product = $value1['price'];

                $datadetail = array(
                    'oder_id' => $id_odernew,
                    'quantity' => $qty,
                    'id_product' => $id_product,
                    'price_product' => $price_product,
                );

                $objdetail = new Oderdetail();
                $objdetail->exchangeArray($datadetail);
               // $this->getOrderdetailAdtTable()->addoder_detail($objdetail);

             
                // Lấy tổng số san phẩm và danh sách sản phẩm đẻ gửi đến mail khách hàng
                $money = $qty * $price_product;
                $total_money +=$money;
                $listproduct_mail .= "
		           <tr style='background-color: #ebecee;text-align: center;'>
		                <td style='padding: 0.6em 0.4em 0.6em 1em;text-align: left;'>" . $value1['name'] . "</td>
		                <td style='padding: 0.6em 0.4em;text-align: right;'>" . $qty . "</td>
		                <td style='padding: 0.6em 0.4em;text-align: right;'>" . $value1['price'] . "  Kč</td> 
		                <td style='padding: 0.6em 0.4em;text-align: right;'>" . $money . " Kč</td>     
		            </tr>";
            }// end foreach

            //-----------------------------------------------------
            // Gửi thong tin hóa đơn đên Mail khách hàng
            $date = date('Y-m-d H:i:s');
            $message = new Message();
            $message->addTo($mail)
                    ->addFrom('sales@apotraviny.cz')
                    ->setSubject('Thông tin đơn hàng');

// Setup SMTP transport using LOGIN authentication
            $transport = new SmtpTransport();
           $options = new SmtpOptions(array(
                'host' => '212.129.40.198',
                'connection_class' => 'login',
                'connection_config' => array(
                    'ssl' => 'tls',
                    'username' => 'sales@apotraviny.cz',
                    'password' => '+1*KR!y@-mn}'
                ),
                'port' => 25,
            ));
            $content_mail = "
            <p>Cám ơn quý khách hàng đã quan tâm và đặt hàng của chúng tôi.
					            Sau khi xác nhận đơn hàng chúng tôi sẽ giao hàng cho quý khách trong thời gian sớm nhất.</p>
					            <p style='line-height:25px'>Khách hàng: $name</p>
					            <p style='line-height:15px'>Mã đơn hàng: $id_odernew</p>
					            <p style='line-height:15px'>Ngày giờ đặt hàng: $date</p>
					             <p style='line-height:15px'>Số điện thoại: $phone</p>
					            <p style='line-height:15px'>Địa chỉ nhận hàng: $address</p>
					          <table border='0' style='width:100%;color:#000;'>
					        <tr style='background-color:#b9babe;text-align:center;line-height: 22px;'>
					            <th>Tên sản phẩm</th>            
					            <th>Số lượng</th> 
					            <th>Đơn giá</th> 
					            <th>Thành tiền</th> 
					        </tr>
					       $listproduct_mail
					        <tr style='text-align:right; line-height: 22px;'>
					            
					            <td colspan='3' style='background-color: #b9babe;padding:0.6em 0.4 em;'><strong>Tổng Tiền:</strong></td>
					            <td style='background-color: #b9babe;  padding: 0.6em 0.4em;text-align: right;'><strong>" . $total_money . " Kč</strong></td>
					        </tr>
					    </table>";
            $html = new MimePart($content_mail);
            $html->type = "text/html";

            $body = new MimeMessage();
            $body->addPart($html);

            $message->setBody($body);

            $transport->setOptions($options);
            $transport->send($message);
            //-----------------------------------------------------
            
            $this->clearcart();            
         
        }

        return array();
    }

    public function checkoutsucessAction() {
        $this->layout('layout/apotravinytheme');
    }

    public function cancelAction() {
        $this->layout('layout/apotravinytheme');
    }

    public function checkoutpaypalAction() {
        $this->layout('layout/apotravinytheme');
        $this->getcatalog();
        $container = new Container('shopcart');
        $arraycart = $container->cart;
        //if($this->request->isPost()){     

        $name = addslashes(trim($this->params()->fromPost('name')));
        $mail = addslashes(trim($this->params()->fromPost('email')));
        $phone = addslashes(trim($this->params()->fromPost('phone')));
        $address = addslashes(trim($this->params()->fromPost('address')));
        $checkout = addslashes(trim($this->params()->fromPost('checkout')));
        $total_price = addslashes(trim($this->params()->fromPost('totalprice')));
        $time = addslashes(trim($this->params()->fromPost('time')));

        $paypalmode = (PayPalMode == 'sandbox') ? '.sandbox' : '';
        $PayPalCurrencyCode = 'USD'; //Paypal Currency Code
        $PayPalReturnURL = WEBPATH . '/shoppingcart/checkoutpaypal'; //Point to process.php page
        $PayPalCancelURL = WEBPATH . '/shoppingcart/cancel'; //Cancel URL if user clicks cancel



        $customer = array(
            'id_user' => '',
            'customer' => $name,
            'email' => $mail,
            'address' => $address,
            'phone' => $phone,
            'time' => $time,
            'totalprice' => $total_price,
            'type' => $checkout
        );

        foreach ($arraycart as $key => $value) {
            $arrayproduct[] = $key;
        }
        $listproduct_cat = $this->getProductAdtTable()->product_viewcart($arrayproduct);


        $post = $this->getRequest();

        if ($post->isPost()) {

            $TotalTaxAmount = 2.58;  //Sum of tax for all items in this order. 
            $HandalingCost = 2.00;  //Handling cost for this order.
            $InsuranceCost = 1.00;  //shipping insurance cost for this order.
            $ShippinDiscount = -3.00; //Shipping discount for this order. Specify this as negative number.
            $ShippinCost = 3.00;

            $paypal_data = '';
            $ItemTotalPrice = 0;



            foreach ($listproduct_cat as $key => $itmname) {
                $Qty = $arraycart[$itmname['id']];
                $paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $key . '=' . urlencode($itmname['name']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $key . '=' . urlencode($itmname['id']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $key . '=' . urlencode($itmname['price']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $key . '=' . urlencode($Qty);

                // item price X quantity
                $subtotal = ($Qty * $itmname['price']);

                //total price
                $ItemTotalPrice = $ItemTotalPrice + $subtotal;

                //create items for session
                $paypal_product['items'][] = array(
                    'name' => $itmname['name'],
                    'Qty' => $Qty,
                    'price' => $itmname['price'],
                    'id' => $itmname['id'],
                );
            }



            //Grand total including all tax, insurance, shipping cost and discount
            $GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);


            $paypal_product['assets'] = array('tax_total' => $TotalTaxAmount,
                'handaling_cost' => $HandalingCost,
                'insurance_cost' => $InsuranceCost,
                'shippin_discount' => $ShippinDiscount,
                'shippin_cost' => $ShippinCost,
                'grand_total' => $GrandTotal);

            $session_paypal_products = new Container('paypal_products');
            $session_paypal_products->paypal_products = $paypal_product;

            $session_customer = new Container('customer');
            $session_customer->customer = $customer;






            //Parameters for SetExpressCheckout, which will be sent to PayPal
            $padata = '&METHOD=SetExpressCheckout' .
                    '&RETURNURL=' . urlencode($PayPalReturnURL) .
                    '&CANCELURL=' . urlencode($PayPalCancelURL) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    $paypal_data .
                    '&NOSHIPPING=0' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping
                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                    '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
                    '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) .
                    '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($HandalingCost) .
                    '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($ShippinDiscount) .
                    '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($InsuranceCost) .
                    '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
                    '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode) .
                    '&LOCALECODE=GB' . //PayPal pages to match the language on your website.
                    '&LOGOIMG=http://s11.bestmediainvestgroup.eu/public/advhtml/image/logo.png' . //site logo
                    '&CARTBORDERCOLOR=FFFFFF' . //border color of cart
                    '&ALLOWNOTE=1';

            /*
              echo "padata :<pre>";
              print_r($padata);
              echo "</pre>";

              die;
             */

            //We need to execute the "SetExpressCheckOut" method to obtain paypal token
            $paypal = new MyPayPal();
            $httpParsedResponseAr = $paypal->PPHttpPost(
                    'SetExpressCheckout', $padata, PayPalApiUsername, PayPalApiPassword, PayPalApiSignature, PayPalMode
            );

            //Respond according to message we receive from Paypal
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                //Redirect user to PayPal store with Token received.
                $paypalurl = 'https://www' . $paypalmode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
                $this->redirect()->toUrl($paypalurl);
                //header('Location: '.$paypalurl);
            } else {
                //Show error message
                echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                echo '<pre>';
                print_r($httpParsedResponseAr);
                echo '</pre>';
            }
        }



//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
        if (isset($_GET["token"]) && isset($_GET["PayerID"])) {


            $token = $_GET["token"];
            $payer_id = $_GET["PayerID"];




            $session_customer_new = new Container('customer');
            $paypal_productrts = $session_customer_new->customer;

            $session_paypal_products = new Container('paypal_products');
            $paypal_productrt = $session_paypal_products->paypal_products;

            $paypal_datan = '';
            $ItemTotalPrice2 = 0;


            if (!empty($paypal_productrt)) {
                $j = 0;
                foreach ($paypal_productrt['items'] as $key => $p_item) {
                    $Qty = $arraycart[$p_item['id']];
                    $paypal_datan .= '&L_PAYMENTREQUEST_0_NAME' . $j . '=' . urlencode($p_item['name']);
                    $paypal_datan .= '&L_PAYMENTREQUEST_0_NUMBER' . $j . '=' . urlencode($p_item['id']);
                    $paypal_datan .= '&L_PAYMENTREQUEST_0_AMT' . $j . '=' . urlencode($p_item['price']);
                    $paypal_datan .= '&L_PAYMENTREQUEST_0_QTY' . $j . '=' . urlencode($Qty);



                    // item price X quantity
                    $subtotal2 = ($Qty * $p_item['price']);

                    //total price
                    $ItemTotalPrice2 = ($ItemTotalPrice2 + $subtotal2);
                    $j++;
                }
            }

            $padatan = '&TOKEN=' . urlencode($token) .
                    '&PAYERID=' . urlencode($payer_id) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    $paypal_datan .
                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice2) .
                    '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($paypal_productrt['assets']['tax_total']) .
                    '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($paypal_productrt['assets']['shippin_cost']) .
                    '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($paypal_productrt['assets']['handaling_cost']) .
                    '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($paypal_productrt['assets']['shippin_discount']) .
                    '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($paypal_productrt['assets']['insurance_cost']) .
                    '&PAYMENTREQUEST_0_AMT=' . urlencode($paypal_productrt['assets']['grand_total']) .
                    '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode);

            //$oder_id_n = $paypal_productrt['assets']['oder'];
            //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
            $paypal = new MyPayPal();
            $httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padatan, PayPalApiUsername, PayPalApiPassword, PayPalApiSignature, PayPalMode);

            //Check if everything went ok..
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

                //echo '<h2>Success</h2>';
                //echo 'Your Transaction ID : ' . urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
                //Lưu lại ID paypal để lưu vào db
                $_SESSION['id_paypal'] = urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
                /*
                  //Sometimes Payment are kept pending even when transaction is complete.
                  //hence we need to notify user about it and ask him manually approve the transiction
                 */

                if ('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
                } elseif ('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    echo '<div style="color:red">Transaction Complete, but payment is still pending! ' .
                    'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
                }


                $padata = '&TOKEN=' . urlencode($token);
                $paypal = new MyPayPal();
                $httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, PayPalApiUsername, PayPalApiPassword, PayPalApiSignature, PayPalMode);

                if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {



                    $buyerName = urldecode($httpParsedResponseAr["FIRSTNAME"]) . ' ' . urldecode($httpParsedResponseAr["LASTNAME"]);
                    $buyerEmail = urldecode($httpParsedResponseAr["EMAIL"]);

                    //echo '<pr>';
                    // echo $buyerName . '<br/>';
                    //echo $buyerEmail . '<br/>';
                    $session_customer_new = new Container('customer');
                    $customer_add = $session_customer_new->customer;
                    //print_r($customer_add);die;
                    // Lưu thông tin hóa đơn vào database
                    $dataoder = array(
                        'customer' => $customer_add['customer'],
                        'email' => $customer_add['email'],
                        'address' => $customer_add['address'],
                        'phone' => $customer_add['phone'],
                        'time' => $customer_add['time'],
                        'totalprice' => $customer_add['totalprice'],
                        'type' => $customer_add['type']
                    );
                    $obj = new Oder();
                    $obj->exchangeArray($dataoder);
                    $this->getOrderAdtTable()->addoder($obj);

                    //Add oder detail
                    $get_odernew = $this->getOrderAdtTable()->getoder_new();
                    $id_odernew = $get_odernew['id'];
                    foreach ($arraycart as $key => $value) {
                        $arrayproduct[] = $key;
                    }
                    $listproduct_cat = $this->getProductAdtTable()->product_viewcart($arrayproduct);

                    foreach ($listproduct_cat as $key1 => $value1) {
                        $qty = $arraycart[$value1['id']];
                        $id_product = $value1['id'];
                        $price_product = $value1['price'];

                        $datadetail = array(
                            'oder_id' => $id_odernew,
                            'quantity' => $qty,
                            'id_product' => $id_product,
                            'price_product' => $price_product,
                        );

                        $objdetail = new Oderdetail();
                        $objdetail->exchangeArray($datadetail);
                        $this->getOrderdetailAdtTable()->addoder_detail($objdetail);
                    }
                    $this->clearcart();
                    //print_r($session_customer->name);
                    //echo '<pre>';
                    // print_r($httpParsedResponseAr);
                    //echo '</pre>';
                } else {
                    echo '<div style="color:red"><b>GetTransactionDetails failed:</b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                    echo '<pre>';
                    print_r($httpParsedResponseAr);
                    echo '</pre>';
                }
            } else {
                echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                echo '<pre>';
                print_r($httpParsedResponseAr);
                echo '</pre>';
            }
        }
        //}// End Post Data
    }

    public function oderhistoryAction() {
        $check_login = new Acount();
        $check_login->checklogin();
        $this->datalayout();
        $session_user = new Container('userlogin');
        $id_Us = $session_user->idus;
        $data = $this->getOderTable()->getoder_user($id_Us);
        foreach ($data as $key => $value) {
            $id_oder = $value['order_Id'];
            $total_product[$id_oder] = $this->getOderdetailTable()->gettoatl_oder_user($id_oder); //Lấy hóa đon chi tiết theo id_ hóa đơn
            foreach ($total_product[$id_oder] as $key1 => $value1) { // Lây thông tin sản phẩm theo Id sản phaamrtrong hóa dơn chi tiết
                $id_product = $value1['product_Id'];
                $dataproduct[$id_product] = $this->getProductTable()->product_viewcart($id_product);
            }
        }

        return array(
            'data' => $data,
            'total_product' => $total_product,
            'data_product' => $dataproduct
        );
    }

    public function delcartAction() {
        $productId = $this->params()->fromRoute('id');
        $container = new Container('shopcart');
        $arraycart = $container->cart;
        unset($arraycart[$productId]);
        $container->cart = $arraycart;
        $this->redirect()->toUrl(WEBPATH . '/shoppingcart/viewcart');
    }

    public function clearallcartAction() {
        $this->clearcart();
        $this->redirect()->toUrl(WEBPATH . '/shoppingcart/viewcart');
    }

    private function clearcart() {
        $container = new Container('shopcart');
        $arraycart = $container->cart;
        unset($arraycart);
        $container->cart = $arraycart;
    }

    private function getcatalog() {
        $data = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        $this->layout()->setVariable('menu', $data);
        $this->layout()->setVariable('submenu', $sub_menu);
    }

}
