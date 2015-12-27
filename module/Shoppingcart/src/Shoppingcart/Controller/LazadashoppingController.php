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

class LazadashoppingController extends AbstractActionController {

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

    protected $City;

    public function getCityTable() {
        if (!$this->City) {
            $sm = $this->getServiceLocator();
            $this->City = $sm->get('Shoppingcart\Model\CityTable');
        }
        return $this->City;
    }

    protected $District;

    public function getDistrictTable() {
        if (!$this->District) {
            $sm = $this->getServiceLocator();
            $this->District = $sm->get('Shoppingcart\Model\DistrictTable');
        }
        return $this->District;
    }

    public function addcartAction() {

        $container = new Container('shopcart_lazada');
        $arraycart = $container->cart_lazada;
        $quanlity = addslashes(trim($this->params()->fromPost("qty")));
        $productId = addslashes(trim($this->params()->fromPost("id_pro")));
        $number_pro = addslashes(trim($this->params()->fromPost("number_pro"))); // số luongj sản phẩm trong db
        $qtys = $arraycart[$productId] + $quanlity; // tính tổng số lượng khách hàng nhập vào
        if ($qtys > $number_pro) { //số lượng sản phẩm trong giỏ hàng khong được lơn trong db
            echo 'error';
            die;
        } else {
            $this->checkcart($productId, $quanlity);
            //$mes = $this->checkcart($productId, $quanlity);
            //echo $mes . '-' . count($container->cart_lazada); 
            $container = new Container('shopcart_lazada');
            $arraycart = $container->cart_lazada;
            if ($arraycart != null) {
                foreach ($arraycart as $key => $value) {
                    $arrayproduct[] = $key;
                }
                $listproduct = $this->getProductAdtTable()->product_viewcart($arrayproduct);
                foreach ($listproduct as $key => $value) {
                    $qty = $arraycart[$value['id']];

                    echo '<tr> 
                                    <td> <a href="/may-nh-kts-fujifilm-s9400w-16-2mp-va-zoom-quang-50x-en-941937.html?mp=1">
                                            <img src="' . WEBPATH_UPLOAD_PATH_IMG_THUNB_ . $value['img'] . '" width="117" height="117" alt="" onerror=this.src="' . ROHLIK_LAZADA . '/img/no-product.png" >
                                        </a>
                                    </td>
                                    <td >
                                        <div class="productdescription">' . $value['name'] . '</div>
                                        <!--<div class="productdetails">Fujifilm</div>-->
                                        <span class="stock instock">
                                            <i class="fa fa-check"></i> Còn hàng </span>

                                       <!-- <span class="productlink">
                                            <a href="#"  data-price="4399000" class="cart-product-actions-link sel-product-move-to-wishlist">
                                                Thêm vào danh sách yêu thích                                        </a>
                                        </span>-->
                                        <span class="productlink">
                                            <a  data-price="4399000" onclick="deletecart(' . $value['id'] . ')" href="javascript:void(0);" class="cart-product-actions-link cartItemRemove sel-cart-remove-item-FU404ELAU6SXVNAMZ-459211">
                                                Xóa   </a>
                                        </span>
                                    </td>
                                    <td class="price_center">';
                    if ($value['sale_products'] == 1) {
                        $price = $value['price'] - ($value['price'] * $value['promotions'] / 100);
                        echo '<span>' . $price . ' Kč</span><br>
                                        <span class="mbs cart-product-oldprice-value">
                                            <del>' . $value['price'] . ' Kč</del>
                                        </span><br>
                                        <span class="txtGreen strong">
                                            Giảm giá ' . $value['promotions'] . '%
                                        </span>';
                    } else {
                        echo '<span>' . $value['price'] . ' Kč</span>';
                        $price =$value['price'];
                    }
                    echo '</td>
                                   <td class="width_10 price center">
                                        <input style="width: 40px;" type="number"  value="' . $qty . '" id="qty' . $value['id'] . '"/>
                                        <input style="width: 40px;" type="hidden"  value="' . $qty . '" id="qty_old' . $value['id'] . '"/>
                                        <i onclick="updatecart(' . $value['id'] . ')" class="fa fa-refresh"></i>
                                    </td>
                                    <td class="width_20 right_align price lastcolumn">
                                        ' . $qty * $price . ' Kč
                                        <!--<div style="color:green">- 439.900 VND</div>-->

                                    </td>

                                </tr>
                                
                                ' . $total_money +=$qty * $price;
                } // end foreach
                echo '<input type="hidden" id="get-count-cart" value="' . count($arraycart) . '" />                                   <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"> Tổng cộng</td>
                                    <td>' . $total_money . ' Kč</td>

                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"> <strong>Thành Tiền</strong></td>
                                    <td> <strong>' . $total_money . ' Kč</strong></br>
                                        Đã bao gồm VAT
                                    </td>

                                </tr>';
            }
            die;
        }
    }

    public function updatecartAction() {
        $container = new Container('shopcart_lazada');
        $quanlity = addslashes(trim($this->params()->fromPost("qty")));
        $productId = addslashes(trim($this->params()->fromPost("id_pro")));
        $this->checkcart($productId, $quanlity);
        //$mes = $this->checkcart($productId, $quanlity);
        //echo $mes . '-' . count($container->cart_lazada);
        $arraycart = $container->cart_lazada;
        if ($arraycart != null) {
            foreach ($arraycart as $key => $value) {
                $arrayproduct[] = $key;
            }
            $listproduct = $this->getProductAdtTable()->product_viewcart($arrayproduct);
            foreach ($listproduct as $key => $value) {
                $qty = $arraycart[$value['id']];

                echo '<tr> 
                                    <td> <a href="/may-nh-kts-fujifilm-s9400w-16-2mp-va-zoom-quang-50x-en-941937.html?mp=1">
                                            <img src="' . WEBPATH_UPLOAD_PATH_IMG_THUNB_ . $value['img'] . '" width="117" height="117" alt="" onerror=this.src="' . ROHLIK_LAZADA . '/img/no-product.png" >
                                        </a>
                                    </td>
                                    <td >
                                        <div class="productdescription">' . $value['name'] . '</div>
                                        <!--<div class="productdetails">Fujifilm</div>-->
                                        <span class="stock instock">
                                            <i class="fa fa-check"></i> Còn hàng </span>

                                       <!-- <span class="productlink">
                                            <a href="#"  data-price="4399000" class="cart-product-actions-link sel-product-move-to-wishlist">
                                                Thêm vào danh sách yêu thích                                        </a>
                                        </span>-->
                                        <span class="productlink">
                                            <a  data-price="4399000" onclick="deletecart(' . $value['id'] . ')" href="javascript:void(0);" class="cart-product-actions-link cartItemRemove sel-cart-remove-item-FU404ELAU6SXVNAMZ-459211">
                                                Xóa   </a>
                                        </span>
                                    </td>
                                    <td class="price_center">';
                                       if ($value['sale_products'] == 1) {
                                                    $price = $value['price'] - ($value['price'] * $value['promotions'] / 100);
                                                    echo '<span>' . $price . ' Kč</span><br>
                                        <span class="mbs cart-product-oldprice-value">
                                            <del>' . $value['price'] . ' Kč</del>
                                        </span><br>
                                        <span class="txtGreen strong">
                                            Giảm giá ' . $value['promotions'] . '%
                                        </span>';
                                                } else {
                                                    echo '<span>' . $value['price'] . ' Kč</span>';
                                                    $price = $value['price'];
                                                }
                                    echo '</td>
                                    <td class="width_10 price center">
                                         <input type="hidden" id="number-pro' . $value['id'] . '" value="' . $value['availability'] . '"/>
                                        <input style="width: 40px;" type="number"  value="' . $qty . '" id="qty' . $value['id'] . '"/>
                                        <input style="width: 40px;" type="hidden"  value="' . $qty . '" id="qty_old' . $value['id'] . '"/>
                                        <i onclick="updatecart(' . $value['id'] . ')" class="fa fa-refresh"></i>
                                    </td>
                                    <td class="width_20 right_align price lastcolumn">
                                        ' . $qty * $price . ' Kč
                                        <!--<div style="color:green">- 439.900 VND</div>-->

                                    </td>

                                </tr>
                                
                                ' . $total_money +=$qty * $price;
            } // end foreach
            echo '<input type="hidden" id="get-count-cart" value="' . count($arraycart) . '" />                                   <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"> Tổng cộng</td>
                                    <td>' . $total_money . ' Kč</td>

                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"> <strong>Thành Tiền</strong></td>
                                    <td> <strong>' . $total_money . ' Kč</strong></br>
                                        Đã bao gồm VAT
                                    </td>

                                </tr>';
        }
        die;
    }

    private function checkcart($productId, $quanlity) {
        $container = new Container('shopcart_lazada');
        $arraycart = $container->cart_lazada;
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
        $container->cart_lazada = $arraycart;
        return $mes;
    }

    public function viewcartAction() {
        $this->layout('layout/lazadatheme');
        $container = new Container('shopcart_lazada');
        $arraycart = $container->cart_lazada;
        if ($arraycart != null) {
            foreach ($arraycart as $key => $value) {
                $arrayproduct[] = $key;
            }
            $listproduct = $this->getProductAdtTable()->product_viewcart($arrayproduct);
        }

        return $listproduct;
    }

    public function getcityAction() {
        $id_city = $this->params()->fromPost('id_city');
        $data_district = $this->getDistrictTable()->get_city($id_city);
        foreach ($data_district as $key => $value) {
            echo '<option value="' . $value['ID'] . '" >' . $value['TenQuanHuyen'] . '</option>';
        }
        die;
    }

    public function buynowAction() {
        $this->layout('layout/lazadatheme');
        $data_city = $this->getCityTable()->listcity();
        $date = date('Y-m-d');
        if ($this->request->isPost()) {
            $name = addslashes(trim($this->params()->fromPost('name')));
            $mail = addslashes(trim($this->params()->fromPost('email')));
            $phone = addslashes(trim($this->params()->fromPost('phone')));
            $address = addslashes(trim($this->params()->fromPost('address')));
            $id_pro = addslashes(trim($this->params()->fromPost('id_pro')));
            $total_price = addslashes(trim($this->params()->fromPost('price')));
            $id_us = addslashes(trim($this->params()->fromPost('idus')));
            $name_pro = addslashes(trim($this->params()->fromPost('name_pro')));

            //Add oder
            $data_oder = array(
                'id_user' => $id_us,
                'customer' => $name,
                'email' => $mail,
                'address' => $address,
                'phone' => $phone,
                'time' => '',
                'totalprice' => $total_price,
                'type' => 0,
            );
            //print_r($data_oder);die;
            $obj = new Oder();
            $obj->exchangeArray($data_oder);
            $this->getOrderAdtTable()->addoder($obj);

            //Add oder detail
            $get_odernew = $this->getOrderAdtTable()->getoder_new();
            $id_odernew = $get_odernew['id'];


            $datadetail = array(
                'oder_id' => $id_odernew,
                'quantity' => 1,
                'id_product' => $id_pro,
                'price_product' => $total_price,
            );

            $objdetail = new Oderdetail();
            $objdetail->exchangeArray($datadetail);
            $this->getOrderdetailAdtTable()->addoder_detail($objdetail);


            // Lấy tổng số san phẩm và danh sách sản phẩm đẻ gửi đến mail khách hàng

            $listproduct_mail .= "
		           <tr style='background-color: #ebecee;text-align: center;'>
		                <td style='padding: 0.6em 0.4em 0.6em 1em;text-align: left;'>" . $name_pro . "</td>
		                <td style='padding: 0.6em 0.4em;text-align: right;'>1</td>
		                <td style='padding: 0.6em 0.4em;text-align: right;'>" . $total_price . "  Kč</td> 
		                <td style='padding: 0.6em 0.4em;text-align: right;'>" . $total_price . " Kč</td>     
		            </tr>";



            $content_mail = "  <p>Cám ơn quý khách hàng đã quan tâm và đặt hàng của chúng tôi.
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
					            <td style='background-color: #b9babe;  padding: 0.6em 0.4em;text-align: right;'><strong>" . $total_price . " Kč</strong></td>
					        </tr>
					    </table>";

            $html = new MimePart($content_mail);
            $html->type = "text/html";

            $body = new MimeMessage();
            $body->addPart($html);

            // Gửi thong tin hóa đơn đên Mail khách hàng
            $date = date('Y-m-d H:i:s');
            $message = new Message();
            $message->addTo($mail)
                    ->addFrom('sales@apotraviny.cz')
                    ->setSubject('Hóa đơn Shop');
            $message->setBody($body);

            // Setup SMTP transport using LOGIN authentication
            $transport = new SmtpTransport();

            // if($_SERVER['SERVER_ADDR'] == IP_SERVER_TEST) {
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

            $transport->setOptions($options);
            $transport->send($message);
            $this->redirect()->toUrl(WEBPATH . '/shoppingcart/lazada/checkoutsucess');
        }


        $this->layout()->setVariable('listproduct', $listproduct);
        return array('data_city' => $data_city, 'listproduct' => $listproduct);
    }

    public function checkoutAction() {
        $this->layout('layout/lazadacheckout');
        $data_city = $this->getCityTable()->listcity();
        $container = new Container('shopcart_lazada');
        $arraycart = $container->cart_lazada;
        if ($arraycart != null) {
            foreach ($arraycart as $key => $value) {
                $arrayproduct[] = $key;
            }
            $listproduct = $this->getProductAdtTable()->product_viewcart($arrayproduct);
            foreach ($listproduct as $key1 => $value1) {
                $qty = $arraycart[$value1['id']];
                if($value1['sale_products']==1){
                $price = $value1['price'] -($value1['price']*$value1['promotions']/100); 
               
                $total_price += $qty * $price;
                }else{
                 $total_price += $qty * $value1['price'];
                }
            }
        }
      
        if ($this->request->isPost()) {
            $name = addslashes(trim($this->params()->fromPost('name')));
            $mail = addslashes(trim($this->params()->fromPost('email')));
            $phone = addslashes(trim($this->params()->fromPost('phone')));
            $address = addslashes(trim($this->params()->fromPost('address')));
            $checkout = addslashes(trim($this->params()->fromPost('checkout')));
            $id_us = addslashes(trim($this->params()->fromPost('idus')));
            // $total_price = addslashes(trim($this->params()->fromPost('totalprice')));
            //$time = addslashes(trim($this->params()->fromPost('time')));
            //Add oder
            $data_oder = array(
                'id_user' => $id_us,
                'customer' => $name,
                'email' => $mail,
                'address' => $address,
                'phone' => $phone,
                'time' => '',
                'totalprice' => $total_price,
                'type' => $checkout
            );

            $obj = new Oder();
            $obj->exchangeArray($data_oder);
            $this->getOrderAdtTable()->addoder($obj);

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
                $this->getOrderdetailAdtTable()->addoder_detail($objdetail);


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
            }


            $content_mail = "  <p>Cám ơn quý khách hàng đã quan tâm và đặt hàng của chúng tôi.
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

            // Gửi thong tin hóa đơn đên Mail khách hàng
            $date = date('Y-m-d H:i:s');
            $message = new Message();
            $message->addTo($mail)
                    ->addFrom('sales@apotraviny.cz')
                    ->setSubject('Hóa đơn Shop');
            $message->setBody($body);

            // Setup SMTP transport using LOGIN authentication
            $transport = new SmtpTransport();

            // if($_SERVER['SERVER_ADDR'] == IP_SERVER_TEST) {
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

            $transport->setOptions($options);
            $transport->send($message);

            $container = new Container('shopcart_lazada');
            $arraycart = $container->cart_lazada;
            unset($arraycart);
            $container->cart_lazada = $arraycart;
            $this->redirect()->toUrl(WEBPATH . '/shoppingcart/lazada/checkoutsucess');
        }


        $this->layout()->setVariable('listproduct', $listproduct);
        return array('data_city' => $data_city, 'listproduct' => $listproduct);
    }

    public function checkoutsucessAction() {
        $this->layout('layout/lazadatheme');
    }

    public function cancelAction() {
        $this->layout('layout/apotravinytheme');
    }

    public function checkoutpaypalAction() {
        $this->layout('layout/lazadacheckout');
        $container = new Container('shopcart_lazada');
        $arraycart = $container->cart_lazada;

        $name = addslashes(trim($this->params()->fromPost('name')));
        $mail = addslashes(trim($this->params()->fromPost('email')));
        $phone = addslashes(trim($this->params()->fromPost('phone')));
        $address = addslashes(trim($this->params()->fromPost('address')));
        $checkout = addslashes(trim($this->params()->fromPost('checkout')));
        $id_us = addslashes(trim($this->params()->fromPost('idus')));
        //$total_price = addslashes(trim($this->params()->fromPost('totalprice')));
        //$time = addslashes(trim($this->params()->fromPost('time')));

        $paypalmode = (PayPalMode == 'sandbox') ? '.sandbox' : '';
        $PayPalCurrencyCode = 'USD'; //Paypal Currency Code
        $PayPalReturnURL = WEBPATH . '/shoppingcart/lazada/checkoutpaypal'; //Point to process.php page
        $PayPalCancelURL = WEBPATH . '/shoppingcart/lazada/cancel'; //Cancel URL if user clicks cancel

        foreach ($arraycart as $key => $value) {
            $arrayproduct[] = $key;
        }
        $listproduct_cat = $this->getProductAdtTable()->product_viewcart($arrayproduct);
        foreach ($listproduct_cat as $key1 => $value1) {
            $qty = $arraycart[$value1['id']];
             if($value1['sale_products']==1){
                $price = $value1['price']-($value1['price']*$value1['promotions']/100);
            }else{
                $price = $value1['price'];
            }
            $total_price += $qty * $price;
        }

        $customer = array(
            'id_user' => $id_us,
            'customer' => $name,
            'email' => $mail,
            'address' => $address,
            'phone' => $phone,
            'time' => '',
            'totalprice' => $total_price,
            'type' => $checkout
        );




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
                  if($itmname['sale_products']==1){
                $price_s = $itmname['price']-($itmname['price']*$itmname['promotions']/100);
                }else{
                $price_s = $itmname['price'];
                }
                $paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $key . '=' . urlencode($itmname['name']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $key . '=' . urlencode($itmname['id']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $key . '=' . urlencode($price_s);
                $paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $key . '=' . urlencode($Qty);

                // item price X quantity
                $subtotal = ($Qty * $price_s);

                //total price
                $ItemTotalPrice = $ItemTotalPrice + $subtotal;

                //create items for session
                $paypal_product['items'][] = array(
                    'name' => $itmname['name'],
                    'Qty' => $Qty,
                    'price' => $price_s,
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
                 if($p_item['sale_products']==1){
                $price_s1 = $p_item['price']-($p_item['price']*$p_item['promotions']/100);
                }else{
                $price_s1 = $p_item['price'];
                }
                    $Qty = $arraycart[$p_item['id']];
                    $paypal_datan .= '&L_PAYMENTREQUEST_0_NAME' . $j . '=' . urlencode($p_item['name']);
                    $paypal_datan .= '&L_PAYMENTREQUEST_0_NUMBER' . $j . '=' . urlencode($p_item['id']);
                    $paypal_datan .= '&L_PAYMENTREQUEST_0_AMT' . $j . '=' . urlencode($price_s1);
                    $paypal_datan .= '&L_PAYMENTREQUEST_0_QTY' . $j . '=' . urlencode($Qty);



                    // item price X quantity
                    $subtotal2 = ($Qty * $price_s1);

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
                    //echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
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
                          if($value1['sale_products']==1){
                $price_product = $value1['price']-($value1['price']*$value1['promotions']/100);
                }else{
                $price_product = $value1['price'];
                }

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
                    $container = new Container('shopcart_lazada');
                    $arraycart = $container->cart_lazada;
                    unset($arraycart);
                    $container->cart_lazada = $arraycart;
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
        return array('listproduct' => $listproduct_cat);
        //}// End Post Data
    }

    public function myorderAction() {
        $this->layout('layout/lazadatheme');
        $listproduct = $this->viewcartAction();
        $this->layout()->setVariable('product_cat', $listproduct);
        $session_user = new Container('userlogin');
        $id_Us = $session_user->idus;
        $list_order_user = $this->getOrderAdtTable()->get_order_user($id_Us);
        foreach ($list_order_user as $key => $value) {
            $id_order = $value['id'];
            $list_oderdetail[$id_order] = $this->getOrderdetailAdtTable()->get_list_oderdetail($id_order);
        }
        //--------------
        $data_m = $this->getCatalogAdtTable()->listcatalog();
        $sub_menu = array();
        foreach ($data_m as $key => $value) {
            $parent_id = $value['id'];
            $sub_menu[$parent_id] = $this->getCatalogAdtTable()->submenu($parent_id);
        }
        //------------
        // print_r($list_order_user);
        return array(
            'list_order_user' => $list_order_user,
            'list_oderdetail' => $list_oderdetail,
            'data_m' => $data_m,
            'sub_menu' => $sub_menu
        );
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
        //$this->datalayout();
        $productId = $this->params()->fromPost('id_pro');
        $container = new Container('shopcart_lazada');
        $arraycart = $container->cart_lazada;
        unset($arraycart[$productId]);
        $container->cart_lazada = $arraycart;
        if ($arraycart != null) {
            foreach ($arraycart as $key => $value) {
                $arrayproduct[] = $key;
            }
            $listproduct = $this->getProductAdtTable()->product_viewcart($arrayproduct);
            foreach ($listproduct as $key => $value) {
                $qty = $arraycart[$value['id']];

                echo '<tr> 
                                    <td> <a href="/may-nh-kts-fujifilm-s9400w-16-2mp-va-zoom-quang-50x-en-941937.html?mp=1">
                                            <img src="' . WEBPATH_UPLOAD_PATH_IMG_THUNB_ . $value['img'] . '" width="117" height="117" alt="" onerror=this.src="' . ROHLIK_LAZADA . '/img/no-product.png" >
                                        </a>
                                    </td>
                                    <td >
                                        <div class="productdescription">' . $value['name'] . '</div>
                                        <!--<div class="productdetails">Fujifilm</div>-->
                                        <span class="stock instock">
                                            <i class="fa fa-check"></i> Còn hàng </span>

                                       <!-- <span class="productlink">
                                            <a href="#"  data-price="4399000" class="cart-product-actions-link sel-product-move-to-wishlist">
                                                Thêm vào danh sách yêu thích                                        </a>
                                        </span>-->
                                        <span class="productlink">
                                            <a  data-price="4399000" onclick="deletecart(' . $value['id'] . ')" href="javascript:void(0);" class="cart-product-actions-link cartItemRemove sel-cart-remove-item-FU404ELAU6SXVNAMZ-459211">
                                                Xóa   </a>
                                        </span>
                                    </td>
                                    <td class="price_center">';
                                       if ($value['sale_products'] == 1) {
                                                    $price = $value['price'] - ($value['price'] * $value['promotions'] / 100);
                                                    echo '<span>' . $price . ' Kč</span><br>
                                        <span class="mbs cart-product-oldprice-value">
                                            <del>' . $value['price'] . ' Kč</del>
                                        </span><br>
                                        <span class="txtGreen strong">
                                            Giảm giá ' . $value['promotions'] . '%
                                        </span>';
                                                } else {
                                                    echo '<span>' . $value['price'] . ' Kč</span>';
                                                    $price = $value['price'];
                                                } 
                                    echo '</td>
                                     <td class="width_10 price center">
                                        <input type="hidden" id="number-pro' . $value['id'] . '" value="' . $value['availability'] . '"/>
                                        <input style="width: 40px;" type="number"  value="' . $qty . '" id="qty' . $value['id'] . '"/>
                                        <input style="width: 40px;" type="hidden"  value="' . $qty . '" id="qty_old' . $value['id'] . '"/>
                                        <i onclick="updatecart(' . $value['id'] . ')" class="fa fa-refresh"></i>
                                    </td>
                                    <td class="width_20 right_align price lastcolumn">
                                        ' . $qty * $price . ' Kč
                                        <!--<div style="color:green">- 439.900 VND</div>-->

                                    </td>

                                </tr>
                                
                                ' . $total_money +=$qty * $price;
            } // end foreach
            echo '<input type="hidden" id="get-count-cart" value="' . count($arraycart) . '" />                                   <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"> Tổng cộng</td>
                                    <td>' . $total_money . ' Kč</td>

                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"> <strong>Thành Tiền</strong></td>
                                    <td> <strong>' . $total_money . ' Kč</strong></br>
                                        Đã bao gồm VAT
                                    </td>

                                </tr>';
        }
        die;
    }

    public function clearcartAction() {
        $container = new Container('shopcart');
        $arraycart = $container->cart;
        unset($arraycart);
        $container->cart = $arraycart;
        $this->redirect()->toUrl(WEB_PATH_LINK . 'shoppingcart/viewcart.html');
    }

}
