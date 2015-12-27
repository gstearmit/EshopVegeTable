<?php

namespace Main\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Main\Form\UploadForm;
use Main\Form\RemoteForm;
use News\Model\News;
use News\Model\NewsTable;
use Main\Model\Main;
use Main\Model\Channel;
use Main\Model\Admin;

use Main\Form\LoginForm;
use Main\Form\editForm;
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\View\Helper\ServerUrl;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;
use Zend\Session\Container; // <-- Add this import
use Zend\Session\SessionManager;
use Zend\Crypt\BlockCipher;
use Main\Model\Utility;

// XML
use XMLWriter;
use Contactp\Model\Contactp;
use Contactp\Model\ContactpTable;
use Zend\Http\PhpEnvironment\Request;
use Zend\Validator\File\Size;

// setting
use Settings\Model\Settings;
use Settings\Model\SettingsTable;

// invvoice
use Invoice\Model\Invoice;
use Invoice\Model\InvoiceTable;
use Visa\Model\Visa;
use Visa\Model\VisaTable;
use Persons\Model\Persons;
use Persons\Model\PersonsTable;
use Main\Model\Mypaypal;
// Buyer
use Main\Model\Buyer;
use Main\Model\BuyerTable;
use Zend\Crypt\PublicKey\Rsa\PublicKey;

//Product
use Product\Model\Product;
use Product\Model\ProductTable;

// Silder
use Slider\Model\Slider;
use Slider\Model\SliderTable;

class IndexController extends AbstractActionController {
	public function creattestimonialAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function testimonialAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function blogdetailAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function blogAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function outerwearAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function topsAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function shirtsAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	Public function accessoriesAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function saleproductAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function newproductAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function bestselleractionAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
	}
	public function contactusAction() {
		$this->layout ( 'layout/bags' );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
		$view = new ViewModel ();
		
		$request = $this->getRequest ();
		if ($request->isPost ()) {
			$data = array_merge_recursive ( $this->getRequest ()->getPost ()->toArray (), $this->getRequest ()->getFiles ()->toArray () );
			
			if (! empty ( $data )) {
				$contactn = new Contactp ();
				$contactn->exchangeArray ( $data );
				$checcontact = $this->getServiceLocator ()->get ( 'ContactpTable' )->save ( $contactn );
				if ($checcontact) {
					$check = $checcontact;
				} else {
					$check = 10;
				}
			}
		}
		$view->check = $check;
		
		// settings
		$setting = $this->getServiceLocator ()->get ( 'SettingsTable' )->fetchAll ();
		$view->setting = $setting;
		
		return $view;
	}
	public function cancelurlAction() {
	}
	public function paypalnotifyAction() {
		// $str = array(2) { ["ItemNumber"]=> string(9) "EVT.12019" ["ItemPrice"]=> string(5) "19.00" }
		$PayPalCurrencyCode = 'USD'; // Paypal Currency Code
		$PayPalReturnURL = WEBPATH . '/paypal-notify'; // Point to process.php page
		$PayPalCancelURL = WEBPATH . '/cancelurl'; // Cancel URL if user clicks cancel
		$postpaypal = $_POST;
		
		$paypalmode = (PayPalMode == 'sandbox') ? '.sandbox' : '';
		
		if (! empty ( $postpaypal )) {
			// Other important variables like tax, shipping cost
			$TotalTaxAmount = 2.58; // Sum of tax for all items in this order.
			$HandalingCost = 2.00; // Handling cost for this order.
			$InsuranceCost = 1.00; // shipping insurance cost for this order.
			$ShippinDiscount = - 3.00; // Shipping discount for this order. Specify this as negative number.
			$ShippinCost = 3.00; // Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
			
			$paypal_data = '';
			$ItemTotalPrice = 0;
			
			// $str = array(2) { ["ItemNumber"]=> string(9) "EVT.12019" ["ItemPrice"]=> string(5) "19.00" }
			
			$i = 0;
			// foreach($postpaypal as $key=>$itmname) {
			
			// $keyid = str_replace(" ","",$itmname['namepackge']);
			$postpaypal ['qty'] = 1;
			$paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $i . '=' . urlencode ( $postpaypal ['ItemNumber'] );
			$paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $i . '=' . urlencode ( $postpaypal ['ItemNumber'] );
			$paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $i . '=' . urlencode ( $postpaypal ['ItemPrice'] );
			$paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $i . '=' . urlencode ( $postpaypal ['qty'] );
			
			// item price X quantity
			$subtotal = ($postpaypal ['ItemPrice']);
			
			// total price
			$ItemTotalPrice = $ItemTotalPrice + $subtotal;
			
			// create items for session
			$paypal_product ['items'] = array (
					'ItemNumber' => $postpaypal ['ItemNumber'],
					'id' => $postpaypal ['ItemNumber'],
					'ItemPrice' => $postpaypal ['ItemPrice'],
					'qty' => $postpaypal ['qty'],
					'oder' => $postpaypal ['ItemNumber'],
					'amount' => $postpaypal ['amount'],
					'type' => $postpaypal ['type'] 
			)
			;
			
			$oder_id = $postpaypal ['ItemNumber'];
			// $i++;
			// }
			
			// Grand total including all tax, insurance, shipping cost and discount
			$GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);
			
			$paypal_product ['assets'] = array (
					'oder' => $oder_id,
					'tax_total' => $TotalTaxAmount,
					'handaling_cost' => $HandalingCost,
					'insurance_cost' => $InsuranceCost,
					'shippin_discount' => $ShippinDiscount,
					'shippin_cost' => $ShippinCost,
					'grand_total' => $GrandTotal 
			);
			
			// create session array for later use
			$session_paypal_products = new Container ( 'paypal_products' );
			$session_paypal_products->paypal_products = $paypal_product;
			
			// Parameters for SetExpressCheckout, which will be sent to PayPal
			$padata = '&METHOD=SetExpressCheckout' . '&RETURNURL=' . urlencode ( $PayPalReturnURL ) . '&CANCELURL=' . urlencode ( $PayPalCancelURL ) . '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode ( "SALE" ) . $paypal_data . '&NOSHIPPING=0' . 			// set 1 to hide buyer's shipping address, in-case products that does not require shipping
			'&PAYMENTREQUEST_0_ITEMAMT=' . urlencode ( $ItemTotalPrice ) . '&PAYMENTREQUEST_0_TAXAMT=' . urlencode ( $TotalTaxAmount ) . '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode ( $ShippinCost ) . '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode ( $HandalingCost ) . '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode ( $ShippinDiscount ) . '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode ( $InsuranceCost ) . '&PAYMENTREQUEST_0_AMT=' . urlencode ( $GrandTotal ) . '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode ( $PayPalCurrencyCode ) . '&LOCALECODE=GB' . 			// PayPal pages to match the language on your website.
			'&LOGOIMG=' . WEBPATHURL . '/html/index/img/logo-lg4.png' . 			// site logo
			'&CARTBORDERCOLOR=FFFFFF' . 			// border color of cart
			'&ALLOWNOTE=1';
			
			// We need to execute the "SetExpressCheckOut" method to obtain paypal token
			$paypal = new MyPayPal ();
			$httpParsedResponseAr = $paypal->PPHttpPost ( 'SetExpressCheckout', $padata, PayPalApiUsername, PayPalApiPassword, PayPalApiSignature, PayPalMode );
			
			// Respond according to message we receive from Paypal
			if ("SUCCESS" == strtoupper ( $httpParsedResponseAr ["ACK"] ) || "SUCCESSWITHWARNING" == strtoupper ( $httpParsedResponseAr ["ACK"] )) {
				// Redirect user to PayPal store with Token received.
				$paypalurl = 'https://www' . $paypalmode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr ["TOKEN"] . '';
				
				$this->redirect ()->toUrl ( $paypalurl );
			} else {
				echo 'There was an error occurred elephant campaign creation process, please try again with the link below';
				echo '<br/> <a href="' . WEBPATH . '">Try agian </a>';
				echo '<br/>Show error message SetExpressCheckout';
				/*
				 * echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>'; echo '<pre>'; print_r($httpParsedResponseAr); echo '</pre>';
				 */
			}
		} // end post $postpaypal
		  
		// -------------------------------------------------------------------------------------------------------------------
		
		$token = $this->params ()->fromQuery ( 'token' );
		$payer_id = $this->params ()->fromQuery ( 'PayerID' );
		// var_dump($token);die;
		
		// Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
		if (isset ( $token ) && isset ( $payer_id )) {
			
			$token = $token;
			$payer_id = $payer_id;
			
			// var_dump($token);die;
			
			// get session variables
			$session_paypal_products = new Container ( 'paypal_products' );
			$paypal_productrt = $session_paypal_products->paypal_products;
			
			// echo 'paypal_productrt<pre>';
			// print_r($paypal_productrt);
			// echo '</pre>';
			// die;
			
			$paypal_datan = '';
			$ItemTotalPrice2 = 0;
			
			if (! empty ( $paypal_productrt )) {
				$j = 0;
				foreach ( $paypal_productrt ['items'] as $key => $p_item ) {
					
					$paypal_datan .= '&L_PAYMENTREQUEST_0_NAME' . $j . '=' . urlencode ( $p_item ['ItemNumber'] );
					$paypal_datan .= '&L_PAYMENTREQUEST_0_NUMBER' . $j . '=' . urlencode ( $p_item ['id'] );
					$paypal_datan .= '&L_PAYMENTREQUEST_0_AMT' . $j . '=' . urlencode ( $p_item ['ItemPrice'] );
					$paypal_datan .= '&L_PAYMENTREQUEST_0_QTY' . $j . '=' . urlencode ( $p_item ['qty'] );
					$oder_id_n = $p_item ['oder'];
					
					// item price X quantity
					$subtotal2 = ($p_item ['ItemPrice']);
					
					// total price
					$ItemTotalPrice2 = ($ItemTotalPrice2 + $subtotal2);
					$j ++;
				}
			}
			
			$padatan = '&TOKEN=' . urlencode ( $token ) . '&PAYERID=' . urlencode ( $payer_id ) . '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode ( "SALE" ) . $paypal_datan . '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode ( $ItemTotalPrice2 ) . '&PAYMENTREQUEST_0_TAXAMT=' . urlencode ( $paypal_productrt ['assets'] ['tax_total'] ) . '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode ( $paypal_productrt ['assets'] ['shippin_cost'] ) . '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode ( $paypal_productrt ['assets'] ['handaling_cost'] ) . '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode ( $paypal_productrt ['assets'] ['shippin_discount'] ) . '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode ( $paypal_productrt ['assets'] ['insurance_cost'] ) . '&PAYMENTREQUEST_0_AMT=' . urlencode ( $paypal_productrt ['assets'] ['grand_total'] ) . '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode ( $PayPalCurrencyCode );
			
			// $oder_id_n = $paypal_productrt['oder'];
			
			// We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
			$paypal_do = new MyPayPal ();
			$httpParsedResponseAr = $paypal_do->PPHttpPost ( 'DoExpressCheckoutPayment', $padatan, PayPalApiUsername, PayPalApiPassword, PayPalApiSignature, PayPalMode );
			
			// Check if everything went ok..
			if ("SUCCESS" == strtoupper ( $httpParsedResponseAr ["ACK"] ) || "SUCCESSWITHWARNING" == strtoupper ( $httpParsedResponseAr ["ACK"] )) {
				
				if ('Completed' == $httpParsedResponseAr ["PAYMENTINFO_0_PAYMENTSTATUS"]) {
					// echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
				} elseif ('Pending' == $httpParsedResponseAr ["PAYMENTINFO_0_PAYMENTSTATUS"]) {
					echo '<div style="color:red">Transaction Complete, but payment is still pending! ' . 'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
				}
				
				// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
				// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
				$padata = '&TOKEN=' . urlencode ( $token );
				$paypal = new MyPayPal ();
				$httpParsedResponseAr = $paypal->PPHttpPost ( 'GetExpressCheckoutDetails', $padata, PayPalApiUsername, PayPalApiPassword, PayPalApiSignature, PayPalMode );
				
				if ("SUCCESS" == strtoupper ( $httpParsedResponseAr ["ACK"] ) || "SUCCESSWITHWARNING" == strtoupper ( $httpParsedResponseAr ["ACK"] )) {
					
					// SAVE BUYER INFORMATION IN DATABASE ###
					
					$buyerName = urldecode ( $httpParsedResponseAr ["FIRSTNAME"] ) . ' ' . urldecode ( $httpParsedResponseAr ["LASTNAME"] );
					$buyerEmail = urldecode ( $httpParsedResponseAr ["EMAIL"] );
					$transactionID = $httpParsedResponseAr ["PAYMENTINFO_0_TRANSACTIONID"];
					$Buyerdata = array (
							'BuyerName' => $buyerName,
							'BuyerEmail' => $buyerEmail,
							'TransactionID' => $transactionID,
							'ItemName' => $ItemName,
							'ItemNumber' => $ItemNumber,
							'ItemAmount' => $ItemTotalPrice,
							'ItemQTY' => $ItemQTY 
					)
					;
					
					// active process + ads + oder
					$str = str_replace ( 'EVT.', '', $oder_id_n );
					$int = ( int ) $str;
					$invoice_id = $int - 12015;
					
					$invoice_checkupdate = $this->getServiceLocator ()->get ( 'InvoiceTable' )->Update_status_pay ( $invoice_id );
					
					// save buyer
					$Buyer = new Buyer ();
					$Buyer->exchangeArray ( $Buyerdata );
					$insert_row = $this->getServiceLocator ()->get ( 'BuyerTable' )->save ( $Buyer );
					
					// chec
					
					// echo '</br>oder_id_n</br>'.$oder_id_n;
					// echo 'odercheckupdate :</br> '.$odercheckupdate ;
					// echo '</br>adscheckupdate :</br> '.$adscheckupdate ;
					
					// echo '</br>insert_row :</br> '.$insert_row ;
					// die;
					
					if ($insert_row != 0 and $invoice_checkupdate == 1) {
						// print 'Success! ID of last inserted record is : ' .$insert_row .'<br />';
						$paypalurlCSS = WEBPATH;
						// header('Location: '.$paypalurlCSS);
						$this->redirect ()->toUrl ( $paypalurlCSS );
					} else {
						die ( 'Error Not save buyer: ' );
					}
				} else {
					echo '<div style="color:red"><b>GetTransactionDetails failed:</b>' . urldecode ( $httpParsedResponseAr ["L_LONGMESSAGE0"] ) . '</div>';
					echo '<pre>';
					print_r ( $httpParsedResponseAr );
					echo '</pre>';
				}
			} else {
				echo 'DoExpressCheckoutPayment Error';
				echo '<div style="color:red"><b>Error : </b>' . urldecode ( $httpParsedResponseAr ["L_LONGMESSAGE0"] ) . '</div>';
				echo '<pre>';
				print_r ( $httpParsedResponseAr );
				echo '</pre>';
			}
		}
	}
	public function onepayAction() {
		// echo "onepay "." Action :".$action." Tracking_id :".$tracking_id." Total : ".$total; die;
		$data = $this->params ()->fromPost ( 'data' );
		if (isset ( $data )) {
			// echo $data;
			echo '<h4 style="color:red;float: left;">service onepay not supports  this time ! dịch vụ onepay chưa hỗ trở thời điểm này !</h4>';
			die ();
		}
	}
	public function ajaxAction() {
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$id_user = $getuser->id;
		
		$action = $this->params ()->fromQuery ( 'action' );
		$code = $this->params ()->fromQuery ( 'code' );
		
		date_default_timezone_set ( 'Asia/Ho_Chi_Minh' );
		$date = date ( 'Y/m/d h:i:s a', time () );
		
		// if(!isset($action) and !isset($code) )
		if (isset ( $action ) and $action == 'apply') {
			// save Oder + Ordetails + Custommer +
			// Return Oder_id ==>
			// Tracking_id = Oder_id + 2015 + 1000 +"EVT."
			
			$data = $this->params ()->fromPost ( 'data' );
			
			if (isset ( $data )) {
				
				$_data = @json_decode ( $data );
				
				// save Visa --> save Person -> Save Invoice -->return id_invoice
				$visa = new Visa ();
				$data_visa = array (
						'visa_type' => $_data->visa_type,
						'text_visatype' => $_data->text_visatype,
						'is_emb' => $_data->is_emb,
						'is_urgently' => $_data->is_urgently,
						'date_arrival' => $_data->date_arrival,
						'date_exit' => $_data->date_exit,
						'arrival_time' => $_data->arrival_time,
						'flight_number' => $_data->flight_number,
						'private_letter' => $_data->invoice->private_letter,
						'fasttrack' => $_data->invoice->fasttrack,
						'pickup' => $_data->invoice->pickup,
						'purpose' => $_data->purpose,
						'arrival_port' => $_data->arrival_port,
						'location' => $_data->location,
						'text_location' => $_data->text_location,
						'text_express' => $_data->text_express,
						'promotion_discount' => $_data->promotion_discount,
						'discount_value' => $_data->invoice->discount_value,
						'discount_amount' => $_data->invoice->discount_amount,
						'express' => $_data->invoice->express,
						'service' => $_data->invoice->service,
						'email_discount' => $_data->invoice->email_discount,
						'number_of' => $_data->invoice->number_of,
						'promotion_code' => $_data->promotion_code 
				);
				
				// var_dump($save_visa);
				
				// echo "</pre>";
				// print_r($data_visa);
				// echo "</pre>";
				// die;
				
				$visa->exchangeArray ( $data_visa );
				$save_visa = $this->getServiceLocator ()->get ( 'VisaTable' )->save ( $visa );
				
				if ($save_visa == 0) {
					echo "Not save visa! Error";
					die ();
				}
				
				$_id_visa = $save_visa;
				
				// save Invoice
				$invoice = new Invoice ();
				$data_Invoice = array (
						'tracking_id' => '',
						'total' => $_data->invoice->total,
						'visa_id' => $_id_visa,
						// 'date_creat' =>date ( 'Y-m-d H:i:s' ),
						'status_pay' => 0 
				);
				$invoice->exchangeArray ( $data_Invoice );
				$check_invoice_id = $this->getServiceLocator ()->get ( 'InvoiceTable' )->save ( $invoice );
				
				if ($check_invoice_id == 0) {
					echo "Not save Invoice! Error";
					die ();
				}
				
				// Save Person
				
				$person = new Persons ();
				$data_person = array (
						'name' => $_data->persons [0]->name,
						'gender' => $_data->persons [0]->gender,
						'birthday' => $_data->persons [0]->birthday,
						'national' => $_data->persons [0]->national,
						'passport' => $_data->persons [0]->passport,
						'passport_exp' => $_data->persons [0]->passport_exp,
						'user_id' => $id_user,
						'invoice_id' => $check_invoice_id,
						'primary_email' => $_data->primary_email,
						'secondary_email' => $_data->secondary_email,
						'primary_pass' => $_data->primary_pass,
						'visa_id' => $_id_visa 
				);
				$person->exchangeArray ( $data_person );
				$check_person = $this->getServiceLocator ()->get ( 'PersonsTable' )->save ( $person );
				
				if ($check_person == 0) {
					echo "Not save person! Error";
					die ();
				}
				
				// Tracking_id = Oder_id + 2015 + 1000 +"EVT." : EVT.12443436059898
				$_tracking_id = 12015 + $check_invoice_id;
				$tracking_id = "EVT." . $_tracking_id;
				
				// update tracking_id for invoice
				$check_updat_tracking = $this->getServiceLocator ()->get ( 'InvoiceTable' )->update_tracking_id ( $check_invoice_id, $tracking_id );
				
				echo $tracking_id;
				die ();
			} else {
				echo "Not exits data action apply";
				die ();
			}
		}
		
		if (isset ( $action )) {
			// getDiscountCode
			if ($action == 'getDiscountCode' and isset ( $code ) and $code != '') {
				echo '0';
				die (); // khuyen mai dat la 0%
			}
			// getServerTime
			if ($action == 'getServerTime') {
				echo $date;
				die ();
			}
			
			// getServiceFee
			if ($action == 'getServiceFee') {
				echo '[{"key":"fee_1ms","value":"19"},{"key":"fee_1mm","value":"25"},{"key":"fee_3ms","value":"30"},{"key":"fee_3mm","value":"138"},{"key":"fee_emb_1ms","value":"21"},{"key":"fee_emb_1mm","value":"27"},{"key":"fee_emb_3ms","value":"32"},{"key":"fee_emb_3mm","value":"138"},{"key":"fee_trv","value":"30"},{"key":"fee_st_1ms","value":"45"},{"key":"fee_st_1mm","value":"65"},{"key":"fee_st_3ms","value":"45"},{"key":"fee_st_3mm","value":"95"},{"key":"fee_st_emb_1ms","value":"N\/A"},{"key":"fee_st_emb_1mm","value":"N\/A"},{"key":"fee_st_emb_3ms","value":"N\/A"},{"key":"fee_st_emb_3mm","value":"N\/A"},{"key":"fee_st_trv","value":"5"},{"key":"fee_6mm","value":"210"},{"key":"fee_st_6mm","value":"135"},{"key":"fee_1mm_full","value":"25"},{"key":"fee_st_1mm_full","value":"95"}]';
				die ();
			}
			
			// getCountry
			if ($action == 'getCountry') {
				echo '[
			  {
			    "id": "1",
			    "name": "Afghanistan",
			    "is_normal": "0"
			  },
			  {
			    "id": "2",
			    "name": "Albania",
			    "is_normal": "1"
			  },
			  {
			    "id": "3",
			    "name": "Algeria",
			    "is_normal": "0"
			  },
			  {
			    "id": "4",
			    "name": "American",
			    "is_normal": "1"
			  },
			  {
			    "id": "5",
			    "name": "Andorra",
			    "is_normal": "1"
			  },
			  {
			    "id": "6",
			    "name": "Angola",
			    "is_normal": "0"
			  },
			  {
			    "id": "7",
			    "name": "Anguilla",
			    "is_normal": "0"
			  },
			  {
			    "id": "8",
			    "name": "Antarctica",
			    "is_normal": "0"
			  },
			  {
			    "id": "9",
			    "name": "Antigua & Barbuda",
			    "is_normal": "0"
			  },
			  {
			    "id": "10",
			    "name": "Argentina",
			    "is_normal": "1"
			  },
			  {
			    "id": "11",
			    "name": "Armenia",
			    "is_normal": "1"
			  },
			  {
			    "id": "12",
			    "name": "Aruba",
			    "is_normal": "0"
			  },
			  {
			    "id": "13",
			    "name": "Australia",
			    "is_normal": "1"
			  },
			  {
			    "id": "14",
			    "name": "Austria",
			    "is_normal": "1"
			  },
			  {
			    "id": "15",
			    "name": "Azerbaijan",
			    "is_normal": "1"
			  },
			  {
			    "id": "16",
			    "name": "Bahamas",
			    "is_normal": "0"
			  },
			  {
			    "id": "17",
			    "name": "Bahrain",
			    "is_normal": "0"
			  },
			  {
			    "id": "18",
			    "name": "Bangladesh",
			    "is_normal": "0"
			  },
			  {
			    "id": "19",
			    "name": "Barbados",
			    "is_normal": "0"
			  },
			  {
			    "id": "20",
			    "name": "Belarus",
			    "is_normal": "1"
			  },
			  {
			    "id": "21",
			    "name": "Belgium",
			    "is_normal": "1"
			  },
			  {
			    "id": "22",
			    "name": "Belize",
			    "is_normal": "1"
			  },
			  {
			    "id": "23",
			    "name": "Benin",
			    "is_normal": "0"
			  },
			  {
			    "id": "24",
			    "name": "Bermuda",
			    "is_normal": "0"
			  },
			  {
			    "id": "25",
			    "name": "Bhutan",
			    "is_normal": "1"
			  },
			  {
			    "id": "26",
			    "name": "Bolivia",
			    "is_normal": "1"
			  },
			  {
			    "id": "27",
			    "name": "Bosnia",
			    "is_normal": "1"
			  },
			  {
			    "id": "28",
			    "name": "Botswana",
			    "is_normal": "0"
			  },
			  {
			    "id": "29",
			    "name": "Bouvet",
			    "is_normal": "0"
			  },
			  {
			    "id": "30",
			    "name": "Brazil",
			    "is_normal": "1"
			  },
			  {
			    "id": "31",
			    "name": "British (UK)",
			    "is_normal": "1"
			  },
			  {
			    "id": "32",
			    "name": "Brunei Darussalam",
			    "is_normal": "1"
			  },
			  {
			    "id": "33",
			    "name": "Bulgaria",
			    "is_normal": "1"
			  },
			  {
			    "id": "34",
			    "name": "Burkina Faso",
			    "is_normal": "0"
			  },
			  {
			    "id": "35",
			    "name": "Burma",
			    "is_normal": "1"
			  },
			  {
			    "id": "36",
			    "name": "Burundi",
			    "is_normal": "0"
			  },
			  {
			    "id": "37",
			    "name": "Cambodia",
			    "is_normal": "1"
			  },
			  {
			    "id": "38",
			    "name": "Cameroon",
			    "is_normal": "0"
			  },
			  {
			    "id": "39",
			    "name": "Canada",
			    "is_normal": "1"
			  },
			  {
			    "id": "40",
			    "name": "Cape Verde",
			    "is_normal": "0"
			  },
			  {
			    "id": "41",
			    "name": "Cayman Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "42",
			    "name": "Central African Rep.",
			    "is_normal": "0"
			  },
			  {
			    "id": "43",
			    "name": "Chad",
			    "is_normal": "0"
			  },
			  {
			    "id": "44",
			    "name": "Chile",
			    "is_normal": "1"
			  },
			  {
			    "id": "45",
			    "name": "China",
			    "is_normal": "1"
			  },
			  {
			    "id": "46",
			    "name": "Christmas Island",
			    "is_normal": "0"
			  },
			  {
			    "id": "47",
			    "name": "Cocos Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "48",
			    "name": "Colombia",
			    "is_normal": "1"
			  },
			  {
			    "id": "49",
			    "name": "Comoros",
			    "is_normal": "0"
			  },
			  {
			    "id": "50",
			    "name": "Congo Democratic Rep.",
			    "is_normal": "0"
			  },
			  {
			    "id": "51",
			    "name": "Congo Republic",
			    "is_normal": "0"
			  },
			  {
			    "id": "52",
			    "name": "Cook Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "53",
			    "name": "Costa Rica",
			    "is_normal": "1"
			  },
			  {
			    "id": "54",
			    "name": "Cote D \'Ivoire",
			    "is_normal": "0"
			  },
			  {
			    "id": "55",
			    "name": "Croatia",
			    "is_normal": "1"
			  },
			  {
			    "id": "56",
			    "name": "Cuba",
			    "is_normal": "1"
			  },
			  {
			    "id": "57",
			    "name": "Cyprus",
			    "is_normal": "1"
			  },
			  {
			    "id": "58",
			    "name": "Czech Republic",
			    "is_normal": "1"
			  },
			  {
			    "id": "59",
			    "name": "Denmark",
			    "is_normal": "1"
			  },
			  {
			    "id": "60",
			    "name": "Djibouti",
			    "is_normal": "0"
			  },
			  {
			    "id": "61",
			    "name": "Dominica",
			    "is_normal": "1"
			  },
			  {
			    "id": "62",
			    "name": "Dominican Republic",
			    "is_normal": "1"
			  },
			  {
			    "id": "63",
			    "name": "Dutch",
			    "is_normal": "1"
			  },
			  {
			    "id": "64",
			    "name": "Ecuador",
			    "is_normal": "1"
			  },
			  {
			    "id": "65",
			    "name": "Egypt",
			    "is_normal": "0"
			  },
			  {
			    "id": "66",
			    "name": "El Salvador",
			    "is_normal": "1"
			  },
			  {
			    "id": "67",
			    "name": "Equatorial Guinea",
			    "is_normal": "0"
			  },
			  {
			    "id": "68",
			    "name": "Eritrea",
			    "is_normal": "0"
			  },
			  {
			    "id": "69",
			    "name": "Estonia",
			    "is_normal": "1"
			  },
			  {
			    "id": "70",
			    "name": "Ethiopia",
			    "is_normal": "0"
			  },
			  {
			    "id": "71",
			    "name": "Falkland Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "72",
			    "name": "Faroe Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "73",
			    "name": "Fiji",
			    "is_normal": "1"
			  },
			  {
			    "id": "74",
			    "name": "Finland",
			    "is_normal": "1"
			  },
			  {
			    "id": "75",
			    "name": "France",
			    "is_normal": "1"
			  },
			  {
			    "id": "76",
			    "name": "French Guiana",
			    "is_normal": "0"
			  },
			  {
			    "id": "77",
			    "name": "French Polynesia",
			    "is_normal": "0"
			  },
			  {
			    "id": "78",
			    "name": "Gabon",
			    "is_normal": "0"
			  },
			  {
			    "id": "79",
			    "name": "Gambia",
			    "is_normal": "0"
			  },
			  {
			    "id": "80",
			    "name": "Georgia",
			    "is_normal": "0"
			  },
			  {
			    "id": "81",
			    "name": "Germany",
			    "is_normal": "1"
			  },
			  {
			    "id": "82",
			    "name": "Ghana",
			    "is_normal": "0"
			  },
			  {
			    "id": "83",
			    "name": "Gibraltar",
			    "is_normal": "0"
			  },
			  {
			    "id": "84",
			    "name": "Greece",
			    "is_normal": "1"
			  },
			  {
			    "id": "85",
			    "name": "Greenland",
			    "is_normal": "1"
			  },
			  {
			    "id": "86",
			    "name": "Grenada",
			    "is_normal": "0"
			  },
			  {
			    "id": "87",
			    "name": "Guadeloupe",
			    "is_normal": "0"
			  },
			  {
			    "id": "88",
			    "name": "Guam",
			    "is_normal": "1"
			  },
			  {
			    "id": "89",
			    "name": "Guatemala",
			    "is_normal": "1"
			  },
			  {
			    "id": "90",
			    "name": "Guinea",
			    "is_normal": "0"
			  },
			  {
			    "id": "91",
			    "name": "Guinea-Bissau",
			    "is_normal": "0"
			  },
			  {
			    "id": "92",
			    "name": "Guyana",
			    "is_normal": "0"
			  },
			  {
			    "id": "93",
			    "name": "Haiti",
			    "is_normal": "0"
			  },
			  {
			    "id": "94",
			    "name": "Heard & Mcdonald Is.",
			    "is_normal": "0"
			  },
			  {
			    "id": "95",
			    "name": "Holland",
			    "is_normal": "1"
			  },
			  {
			    "id": "96",
			    "name": "Honduras",
			    "is_normal": "1"
			  },
			  {
			    "id": "97",
			    "name": "Hong Kong",
			    "is_normal": "1"
			  },
			  {
			    "id": "98",
			    "name": "Hungary",
			    "is_normal": "1"
			  },
			  {
			    "id": "99",
			    "name": "Iceland",
			    "is_normal": "1"
			  },
			  {
			    "id": "100",
			    "name": "India",
			    "is_normal": "1"
			  },
			  {
			    "id": "101",
			    "name": "Indonesia",
			    "is_normal": "1"
			  },
			  {
			    "id": "102",
			    "name": "Iran",
			    "is_normal": "0"
			  },
			  {
			    "id": "103",
			    "name": "Iraq",
			    "is_normal": "0"
			  },
			  {
			    "id": "104",
			    "name": "Ireland",
			    "is_normal": "1"
			  },
			  {
			    "id": "105",
			    "name": "Israel",
			    "is_normal": "1"
			  },
			  {
			    "id": "106",
			    "name": "Italy",
			    "is_normal": "1"
			  },
			  {
			    "id": "107",
			    "name": "Jamaica",
			    "is_normal": "0"
			  },
			  {
			    "id": "108",
			    "name": "Japan",
			    "is_normal": "1"
			  },
			  {
			    "id": "109",
			    "name": "Jordan",
			    "is_normal": "0"
			  },
			  {
			    "id": "110",
			    "name": "Kazakhstan",
			    "is_normal": "1"
			  },
			  {
			    "id": "111",
			    "name": "Kenya",
			    "is_normal": "0"
			  },
			  {
			    "id": "112",
			    "name": "Keeling Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "113",
			    "name": "Kiribati",
			    "is_normal": "0"
			  },
			  {
			    "id": "114",
			    "name": "Kosovo",
			    "is_normal": "0"
			  },
			  {
			    "id": "115",
			    "name": "Kuwait",
			    "is_normal": "0"
			  },
			  {
			    "id": "116",
			    "name": "Kyrgyzstan",
			    "is_normal": "1"
			  },
			  {
			    "id": "117",
			    "name": "Laos",
			    "is_normal": "1"
			  },
			  {
			    "id": "118",
			    "name": "Latvia",
			    "is_normal": "1"
			  },
			  {
			    "id": "119",
			    "name": "Lebanon",
			    "is_normal": "0"
			  },
			  {
			    "id": "120",
			    "name": "Lesotho",
			    "is_normal": "0"
			  },
			  {
			    "id": "121",
			    "name": "Liberia",
			    "is_normal": "0"
			  },
			  {
			    "id": "122",
			    "name": "Libya",
			    "is_normal": "0"
			  },
			  {
			    "id": "123",
			    "name": "Liechtenstein",
			    "is_normal": "1"
			  },
			  {
			    "id": "124",
			    "name": "Lithuania",
			    "is_normal": "1"
			  },
			  {
			    "id": "125",
			    "name": "Luxembourg",
			    "is_normal": "1"
			  },
			  {
			    "id": "126",
			    "name": "Macau",
			    "is_normal": "1"
			  },
			  {
			    "id": "127",
			    "name": "Macedonia",
			    "is_normal": "1"
			  },
			  {
			    "id": "128",
			    "name": "Madagascar",
			    "is_normal": "0"
			  },
			  {
			    "id": "129",
			    "name": "Malawi",
			    "is_normal": "0"
			  },
			  {
			    "id": "130",
			    "name": "Malaysia",
			    "is_normal": "1"
			  },
			  {
			    "id": "131",
			    "name": "Maldives",
			    "is_normal": "1"
			  },
			  {
			    "id": "132",
			    "name": "Mali",
			    "is_normal": "0"
			  },
			  {
			    "id": "133",
			    "name": "Malta",
			    "is_normal": "1"
			  },
			  {
			    "id": "134",
			    "name": "Malvinas",
			    "is_normal": "1"
			  },
			  {
			    "id": "135",
			    "name": "Marshall Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "136",
			    "name": "Martinique",
			    "is_normal": "0"
			  },
			  {
			    "id": "137",
			    "name": "Mauritania",
			    "is_normal": "0"
			  },
			  {
			    "id": "138",
			    "name": "Mauritius",
			    "is_normal": "0"
			  },
			  {
			    "id": "139",
			    "name": "Mayotte",
			    "is_normal": "0"
			  },
			  {
			    "id": "140",
			    "name": "Mexico",
			    "is_normal": "1"
			  },
			  {
			    "id": "141",
			    "name": "Micronesia",
			    "is_normal": "0"
			  },
			  {
			    "id": "142",
			    "name": "Moldova",
			    "is_normal": "1"
			  },
			  {
			    "id": "143",
			    "name": "Monaco",
			    "is_normal": "0"
			  },
			  {
			    "id": "144",
			    "name": "Mongolia",
			    "is_normal": "1"
			  },
			  {
			    "id": "145",
			    "name": "Montserrat",
			    "is_normal": "0"
			  },
			  {
			    "id": "146",
			    "name": "Morocco",
			    "is_normal": "0"
			  },
			  {
			    "id": "147",
			    "name": "Mozambique",
			    "is_normal": "0"
			  },
			  {
			    "id": "148",
			    "name": "Myanmar",
			    "is_normal": "1"
			  },
			  {
			    "id": "149",
			    "name": "Namibia",
			    "is_normal": "0"
			  },
			  {
			    "id": "150",
			    "name": "Nauru",
			    "is_normal": "0"
			  },
			  {
			    "id": "151",
			    "name": "Nepal",
			    "is_normal": "0"
			  },
			  {
			    "id": "152",
			    "name": "Netherlands",
			    "is_normal": "1"
			  },
			  {
			    "id": "153",
			    "name": "Netherlands Antilles",
			    "is_normal": "1"
			  },
			  {
			    "id": "154",
			    "name": "New Caledonia",
			    "is_normal": "0"
			  },
			  {
			    "id": "155",
			    "name": "New Zealand",
			    "is_normal": "1"
			  },
			  {
			    "id": "156",
			    "name": "Nicaragua",
			    "is_normal": "1"
			  },
			  {
			    "id": "157",
			    "name": "Niger",
			    "is_normal": "0"
			  },
			  {
			    "id": "158",
			    "name": "Nigeria",
			    "is_normal": "0"
			  },
			  {
			    "id": "159",
			    "name": "Niue",
			    "is_normal": "0"
			  },
			  {
			    "id": "160",
			    "name": "Norfolk Island",
			    "is_normal": "0"
			  },
			  {
			    "id": "161",
			    "name": "North Korea",
			    "is_normal": "0"
			  },
			  {
			    "id": "162",
			    "name": "Northern Mariana Is.",
			    "is_normal": "0"
			  },
			  {
			    "id": "163",
			    "name": "Norway",
			    "is_normal": "1"
			  },
			  {
			    "id": "164",
			    "name": "Oman",
			    "is_normal": "0"
			  },
			  {
			    "id": "165",
			    "name": "Pakistan",
			    "is_normal": "0"
			  },
			  {
			    "id": "166",
			    "name": "Palau",
			    "is_normal": "0"
			  },
			  {
			    "id": "167",
			    "name": "Palestine",
			    "is_normal": "0"
			  },
			  {
			    "id": "168",
			    "name": "Panama",
			    "is_normal": "1"
			  },
			  {
			    "id": "169",
			    "name": "Papua New Guinea",
			    "is_normal": "1"
			  },
			  {
			    "id": "170",
			    "name": "Paraguay",
			    "is_normal": "1"
			  },
			  {
			    "id": "171",
			    "name": "Peru",
			    "is_normal": "1"
			  },
			  {
			    "id": "172",
			    "name": "Philippines",
			    "is_normal": "1"
			  },
			  {
			    "id": "173",
			    "name": "Pitcairn Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "174",
			    "name": "Poland",
			    "is_normal": "1"
			  },
			  {
			    "id": "175",
			    "name": "Portugal",
			    "is_normal": "1"
			  },
			  {
			    "id": "176",
			    "name": "Puerto Rico",
			    "is_normal": "1"
			  },
			  {
			    "id": "177",
			    "name": "Qatar",
			    "is_normal": "0"
			  },
			  {
			    "id": "178",
			    "name": "Reunion Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "179",
			    "name": "Romania",
			    "is_normal": "1"
			  },
			  {
			    "id": "180",
			    "name": "Russian Federation",
			    "is_normal": "1"
			  },
			  {
			    "id": "181",
			    "name": "Rwanda",
			    "is_normal": "0"
			  },
			  {
			    "id": "182",
			    "name": "Saint Barthelemy",
			    "is_normal": "0"
			  },
			  {
			    "id": "183",
			    "name": "Saint Helena",
			    "is_normal": "0"
			  },
			  {
			    "id": "184",
			    "name": "Saint Kitts and Nevis",
			    "is_normal": "0"
			  },
			  {
			    "id": "185",
			    "name": "Saint Lucia",
			    "is_normal": "0"
			  },
			  {
			    "id": "186",
			    "name": "Saint Martin",
			    "is_normal": "0"
			  },
			  {
			    "id": "187",
			    "name": "Saint Pierre & Miquelon",
			    "is_normal": "0"
			  },
			  {
			    "id": "188",
			    "name": "Saint Vincent & Grenadines",
			    "is_normal": "0"
			  },
			  {
			    "id": "189",
			    "name": "Samoa",
			    "is_normal": "0"
			  },
			  {
			    "id": "190",
			    "name": "San Marino",
			    "is_normal": "0"
			  },
			  {
			    "id": "191",
			    "name": "Sao Tome & Principe",
			    "is_normal": "0"
			  },
			  {
			    "id": "192",
			    "name": "Saudi Arabia",
			    "is_normal": "0"
			  },
			  {
			    "id": "193",
			    "name": "Senegal",
			    "is_normal": "0"
			  },
			  {
			    "id": "194",
			    "name": "Serbia",
			    "is_normal": "1"
			  },
			  {
			    "id": "195",
			    "name": "Seychelles",
			    "is_normal": "0"
			  },
			  {
			    "id": "196",
			    "name": "Sierra Leone",
			    "is_normal": "0"
			  },
			  {
			    "id": "197",
			    "name": "Singapore",
			    "is_normal": "1"
			  },
			  {
			    "id": "198",
			    "name": "Slovakia",
			    "is_normal": "1"
			  },
			  {
			    "id": "199",
			    "name": "Slovenia",
			    "is_normal": "1"
			  },
			  {
			    "id": "200",
			    "name": "Solomon Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "201",
			    "name": "Somalia",
			    "is_normal": "0"
			  },
			  {
			    "id": "202",
			    "name": "South Africa",
			    "is_normal": "1"
			  },
			  {
			    "id": "203",
			    "name": "South Korea",
			    "is_normal": "0"
			  },
			  {
			    "id": "204",
			    "name": "South Georgia Is.",
			    "is_normal": "0"
			  },
			  {
			    "id": "205",
			    "name": "South Sandwich Is.",
			    "is_normal": "0"
			  },
			  {
			    "id": "206",
			    "name": "Spain",
			    "is_normal": "1"
			  },
			  {
			    "id": "207",
			    "name": "Sri Lanka",
			    "is_normal": "0"
			  },
			  {
			    "id": "208",
			    "name": "Sudan",
			    "is_normal": "0"
			  },
			  {
			    "id": "209",
			    "name": "Suriname",
			    "is_normal": "0"
			  },
			  {
			    "id": "210",
			    "name": "Swaziland",
			    "is_normal": "0"
			  },
			  {
			    "id": "211",
			    "name": "Sweden",
			    "is_normal": "1"
			  },
			  {
			    "id": "212",
			    "name": "Switzerland",
			    "is_normal": "1"
			  },
			  {
			    "id": "213",
			    "name": "Syria",
			    "is_normal": "0"
			  },
			  {
			    "id": "214",
			    "name": "Taiwan",
			    "is_normal": "1"
			  },
			  {
			    "id": "215",
			    "name": "Tajikistan",
			    "is_normal": "1"
			  },
			  {
			    "id": "216",
			    "name": "Tanzania",
			    "is_normal": "0"
			  },
			  {
			    "id": "217",
			    "name": "Thailand",
			    "is_normal": "1"
			  },
			  {
			    "id": "218",
			    "name": "Timor-Leste",
			    "is_normal": "0"
			  },
			  {
			    "id": "219",
			    "name": "Togo",
			    "is_normal": "0"
			  },
			  {
			    "id": "220",
			    "name": "Tokelau",
			    "is_normal": "0"
			  },
			  {
			    "id": "221",
			    "name": "Tonga",
			    "is_normal": "0"
			  },
			  {
			    "id": "222",
			    "name": "Trinidad & Tobago",
			    "is_normal": "1"
			  },
			  {
			    "id": "223",
			    "name": "Tunisia",
			    "is_normal": "0"
			  },
			  {
			    "id": "224",
			    "name": "Turkey",
			    "is_normal": "0"
			  },
			  {
			    "id": "225",
			    "name": "Turkmenistan",
			    "is_normal": "1"
			  },
			  {
			    "id": "226",
			    "name": "Turks & Caicos Islands",
			    "is_normal": "0"
			  },
			  {
			    "id": "227",
			    "name": "Tuvalu",
			    "is_normal": "0"
			  },
			  {
			    "id": "228",
			    "name": "Uganda",
			    "is_normal": "0"
			  },
			  {
			    "id": "229",
			    "name": "Ukraine",
			    "is_normal": "1"
			  },
			  {
			    "id": "230",
			    "name": "United Arab Emirates",
			    "is_normal": "0"
			  },
			  {
			    "id": "231",
			    "name": "United Kingdom",
			    "is_normal": "1"
			  },
			  {
			    "id": "232",
			    "name": "United States",
			    "is_normal": "1"
			  },
			  {
			    "id": "233",
			    "name": "Uruguay",
			    "is_normal": "1"
			  },
			  {
			    "id": "234",
			    "name": "Uzbekistan",
			    "is_normal": "1"
			  },
			  {
			    "id": "235",
			    "name": "Vanuatu",
			    "is_normal": "0"
			  },
			  {
			    "id": "236",
			    "name": "Venezuela",
			    "is_normal": "1"
			  },
			  {
			    "id": "237",
			    "name": "Vietnam",
			    "is_normal": "0"
			  },
			  {
			    "id": "238",
			    "name": "Virgin Islands, UK",
			    "is_normal": "0"
			  },
			  {
			    "id": "239",
			    "name": "Virgin Islands, U.S",
			    "is_normal": "0"
			  },
			  {
			    "id": "240",
			    "name": "Wallis & Futuna",
			    "is_normal": "0"
			  },
			  {
			    "id": "241",
			    "name": "Western Sahara",
			    "is_normal": "0"
			  },
			  {
			    "id": "242",
			    "name": "Yemen",
			    "is_normal": "0"
			  },
			  {
			    "id": "243",
			    "name": "Zambia",
			    "is_normal": "0"
			  },
			  {
			    "id": "244",
			    "name": "Zimbabwe",
			    "is_normal": "0"
			  }
			]';
				die ();
			}
		}
	}
	public function clickviewAction() {
		$this->layout ( 'layout/bags' );
	}
	
	public function indextestAction()
	{
		$this->layout ( 'layout/bags' );
		ob_start ( 'ob_gzhandler' );
		//Product
		$limit_new = null;
		$Product_WEEKLY_FEATURED = $this->getServiceLocator()->get('ProductTable')->get_WEEKLY_FEATURED($limit_new);
		//echo "Product_WEEKLY_FEATURED";var_dump($Product_WEEKLY_FEATURED);
		$this->layout ()->Product_WEEKLY_FEATURED = $Product_WEEKLY_FEATURED;
	}
	

	
	public function indexAction() {
		
		$manager = new SessionManager();
		Container::setDefaultManager($manager);
		
		$this->layout ( 'layout/bags' );
		ob_start ( 'ob_gzhandler' );
                
		$catalog = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getdata' 
		) );
           
		$this->layout ()->catalog = $catalog;
               
		$allcat = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getall' 
		) );
               
		$this->layout ()->allcat = $allcat;                 
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$this->layout ()->getuser = $getuser;
		$id_user = $getuser->id; 
		
		
		//get Infor Setting 
		$setting = $this->getServiceLocator ()->get ( 'SettingsTable' )->fetchAll ();
		$this->layout ()->setting = $setting;
		
		foreach ($setting as $key=>$set)
		{
			$name = $set->name;
			$logo1 = $set->logo1;
			$ico = $set->ico;
			$seo_description  =  $set->seo_description;
			$seo_keywords=$set->seo_keywords;
			$phone = $set->phone;
			$email = $set->email;
			$facebook = $set->facebook;
			$tweets = $set->tweets;
			$printerest = $set->printerest;
			$youtube_acount = $set->youtube_acount;
			$google = $set->google;
			$address = $set->address;
		}
		
		$setting_session = new Container('setting');
		if($setting_session->setting == false)
		{
			$setting_session->setting = true;
			$setting_session->name =  $name;
			$setting_session->logo1 =  $logo1;
			$setting_session->ico  = $ico ;
			$setting_session->seo_description   =  $seo_description;
			$setting_session->seo_keywords = $seo_keywords;
			$setting_session->phone  = $phone;
			$setting_session->email  = $email ;
			$setting_session->facebook  =  $facebook;
			$setting_session->tweets  =  $tweets;
			$setting_session->printerest  = $printerest ;
			$setting_session->youtube_acount  =  $youtube_acount;
			$setting_session->google  = $google;
			$setting_session->address  = $address;
		}
		
	
		
		$result = array ();
		$i = 0;
		// var_dump($allcat);
		foreach ( $catalog as $key => $value ) :			
			$k = substr_count ( $value, ' -' );
			if ($k == 2) {
				$i ++;
				$item = 5;
				if ($i % 2 == 0)
					$item = 8;
				$id = $key;
				$par = explode ( ',', $allcat [$id]->child );
				$paginator = $this->getMainTable ()->fetcatalogAll ( $id, $par, true );
				// set the current page to what has been passed in query string, or to 1 if none set
				$paginator->setCurrentPageNumber ( 1 );
				// set the number of items per page to 10
				$paginator->setItemCountPerPage ( $item );
				// $k='cata'.$id;
				$result [$id] = $paginator;
			}
		endforeach
		;
		
		$this->layout ()->result = $result;
		
		//Product
		$limitFEATURED_PRODUCTS = null;
		$Product_FEATURED_PRODUCTS = $this->getServiceLocator()->get('ProductTable')->get_FEATURED_PRODUCTS($limitFEATURED_PRODUCTS);
		$this->layout ()->Product_FEATURED_PRODUCTS = $Product_FEATURED_PRODUCTS;
		
		// Slider Show
		//$data_slide = $this->getSlideShowTable()->fetch_slideshow();
		$silder_new =  $this->getSliderTable()->fetchAll();
		$this->layout ()->data_slide = $silder_new; 
		
		//Product
		$limit_new = null;
		$Product_WEEKLY_FEATURED = $this->getServiceLocator()->get('ProductTable')->get_WEEKLY_FEATURED($limit_new);
		//echo "Product_WEEKLY_FEATURED";var_dump($Product_WEEKLY_FEATURED);
		$this->layout ()->Product_WEEKLY_FEATURED = $Product_WEEKLY_FEATURED;
		
		
		
		// slider + travel
		$newsTable = $this->getServiceLocator ()->get ( 'NewsTable' );
		$all_new = $newsTable->fetchAll ();
		$this->layout ()->Silde = $all_new;
	}
	public function settingsAction() {
		// setting web
		$setting = $this->getServiceLocator ()->get ( 'SettingsTable' )->fetchAll ();
		$setting_text = '';
		foreach ( $setting as $value ) {
			$phone = $value->phone;
			$Email = $value->email;
			$web = $value->linkweb;
			$yahoo = $value->yahoo;
			$skype = $value->skype;
			$fax = $value->fax;
			$name = $value->name;
			$address = $value->address;
			$logo_footer =$value->logo_footer;
			$sologen = $value->sologen;
			$github = $value->github;
			$google = $value->google;
			$feed   = $value->feed;
			$facebook_text = $value->facebook_text;
			$tweets_text = $value->tweets_text;
			$facebook = $value->facebook;
			$tweets = $value->tweets;
			$printerest = $value->printerest;
			$youtube_acount = $value->youtube_acount;
			
		}
		
		$setting_text = '<div class="footer">
									<div class="container">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<div class="block-static2 static-alo">
													<div class="logo-footer">
														<img class="icon-about"
															src="'.WEBPATH_UPLOAD_PATH_IMG.'/'.$logo_footer.'"
															alt="'.$name.'" />
														<p>'.$sologen.'</p>
													</div>
													<div class="social-links icon-wrapper">
														<a class="icon-twitter" href="https://www.twitter.com/'.$tweets.'"><em class="fa fa-twitter">&nbsp;</em></a>
														<a class="icon-github" href="github.com/'.$github.'"><em class="fa fa-github">&nbsp;</em></a>
														<a class="icon-rss" href="'.WEBPATH.'/'.$feed.'"><em class="fa fa-rss">&nbsp;</em></a>
														<a class="icon-google-plus" href="https://www.plus.google.com/'.$google.'"><em
															class="fa fa-google-plus">&nbsp;</em></a> <a
															class="icon-facebook" href="https://www.facebook.com/'.$facebook.'"><em class="fa fa-facebook">&nbsp;</em></a>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<div class="block-static1 static-alo">
													<div class="block-title-tabs">
														<h3 class="block-title heading">
															<span>Contact Us</span>
														</h3>
													</div>
													<div class="block1 block-content-statick">
														<ul>
															<li class="map"><span class="fa fa-map-marker">&nbsp;</span>
																<address>
																	<span>Address:</span>
																</address>
																<p>'.$address.'</p></li>
															<li class="phone"><span class="fa fa-phone">&nbsp;</span>
																<span>Phone:</span>
																<p>'.$phone.'</p></li>
															<li class="email"><span class="fa  fa-envelope">&nbsp;</span><span>Email:</span>
																<p>
																	<a href="mailto:'.$Email.'">'.$Email.'</a>
																</p></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="customer col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<div class="block-static3 static-alo">
													<div class="block block-creare-twitter">
														<div class="block-title">
															<strong><span>Our Latest Tweets</span></strong>
														</div>
														<div class="block-content">
															<ul>
																<li class="clearfix">
																	<div class="alo-twitter">
																		<div class="twitter-pic pull-left">
																			<a href="https://www.facebook.com/'.$facebook.'">
																					<span class="social-icon" style="width: 81%;height: 29px;border-radius: 4px;"></span>
																			</a>
																		</div>
																		<div class="twitter-links pull-left">
																			'.$facebook_text.'
																		</div>
																	</div>
																</li>
																<li class="clearfix">
																	<div class="alo-twitter">
																		<div class="twitter-pic pull-left">
																			<a href="https://twitter.com/'.$tweets.'"><img
																				class="img-responsive"
																				src="http://pbs.twimg.com/profile_images/536002680057913345/j7c9SpAr_normal.png"
																				alt="twitter icon" /></a>
																		</div>
																		<div class="twitter-links pull-left">
																			'.$tweets_text.'
																		</div>
																	</div>
																</li>
															</ul>
														</div>
													</div>



												</div>
											</div>
											<div class="customer col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<div class="block-static4 static-alo">
													<div class="block block-subscribe">
														<div class="block-title">
															<strong><span>Newsletter</span></strong>
														</div>
														<form
															action="'.WEBPATH.'/newsletter/subscribernew"
															method="post" id="newsletter-validate-detail">
															<div class="block-content">
																<div class="form-subscribe-header">
																	<label for="newsletter">Sign Up for Our Newsletter:</label>
																</div>
																<div class="input-box">
																	<input type="text" name="email" id="newsletter"
																		title="Sign up for our newsletter"
																		class="input-text required-entry validate-email" />
																</div>
																<div class="actions">
																	<button type="submit" title="Subscribe" class="button">
																		<span><span>Subscribe</span></span>
																	</button>
																</div>
															</div>
														</form>
														<script type="text/javascript">
															//<![CDATA[
															var newsletterSubscriberFormDetail = new VarienForm(
																	\'newsletter-validate-detail\');
															//]]>
														</script>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>';
		echo $setting_text;
		die ();
	}
	public function travelcornerAction() {
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
		$unity = new Utility ();
		$domain = WEBPATH;
		$newsTable = $this->getServiceLocator ()->get ( 'NewsTable' );
		$all_new = $newsTable->fetchAll ();
		
		$ajax = "<script type=\"text/javascript\">
    			window.travel_news = new Array();";
		
		foreach ( $all_new as $key => $value ) {
			$dateview = $value->date_creat;
			$_title = $unity->_substr_co_nghia ( $value->news_name, 30 );
			$array_time = explode ( '-', $dateview );
			if (! empty ( $array_time )) {
				$number_moth = ( int ) $array_time [1];
				$_month = $unity->_name_moth ( $array_time [1] );
				$_today = $array_time [2];
				$_year = $array_time [0];
				$_string = $_month . ' ' . $_today . ' ' . $_year;
			} else {
				$number_moth = '';
				$_month = '';
				$_today = '';
				$_year = '';
				$_string = '';
			}
			
			if ($value->travel_corner == 1 and $value->status == 1) {
				
				$ajax .= "travel_news.push({
						thumbnail: '" . $domain . "/uploads/" . $value->news_thumbnail . "',
						title: '" . $_title . "',
						time: '" . $_string . "',
						link: '" . $domain . "/newsview/" . $value->url_static . "'
					});";
			}
		} // end for
		
		$ajax .= "</script>";
		
		echo $ajax;
		die ();
	}
	public function mainslideAction() {
		// $this->layout('layout/none');
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// echo $request->isPost();
		// var_dump($request);
		if ($request->isPost ()) {
			// $k['idcode']='';
			$k = $request->getPost ();
			// var_dump($k);
			$i = strrpos ( $k->idcode, '/' );
			$seriecode = substr ( $k->idcode, $i + 1 );
			$data = $this->getMainTable ()->getrowcontent ( $seriecode );
			$page = $k->page;
			// echo $seriecode;
			$paginator = $this->getMainTable ()->fetcatalogAll ( $data->catelog, true );
			// set the current page to what has been passed in query string, or to 1 if none set
			$paginator->setCurrentPageNumber ( ( int ) $page );
			// set the number of items per page to 10
			$paginator->setItemCountPerPage ( 10 );
			$viewModel->paginator = $paginator;
			return $viewModel;
		}
		return $viewModel;
	}
	// admin manage
	public function adminmanageAction() {
		$catalog = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getdata' 
		) );
		$this->layout ()->catalog = $catalog;
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$this->layout ()->getuser = $getuser;
		$check = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'session' 
		) );
		$viewModel = new ViewModel ();
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$group = $getuser->group;
		if ($group == "admin" || $group == "supperadmin") {
			$this->layout ( 'layout/layoutadmin' );
			$select = new Select ();
			$id = $this->params ()->fromRoute ( 'id', 0 );
			$this->layout ()->id = $id;
			
			$page = $this->params ()->fromRoute ( 'page', 0 ) ? ( int ) $this->params ()->fromRoute ( 'page', 0 ) : 1;
			$order_by = $this->params ()->fromRoute ( 'order_by', 0 ) ? $this->params ()->fromRoute ( 'order_by', 0 ) : 'id';
			$order = $this->params ()->fromRoute ( 'order', 0 ) ? $this->params ()->fromRoute ( 'order', 0 ) : 'ASC';
			$paginator = $this->getMainTable ()->fetAll ( true, $order_by, $order );
			// set the current page to what has been passed in query string, or to 1 if none set
			$paginator->setCurrentPageNumber ( ( int ) $page );
			// set the number of items per page to 10
			$paginator->setItemCountPerPage ( 30 );
			$viewModel->user = $getuser;
			$viewModel->err = true;
			// $viewModel->video=$video;
			$viewModel->paginator = $paginator;
			return $viewModel;
		} else {
			$this->layout ( 'error/admin' );
		}
	}
	public function mostviewAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		if ($request->isPost ()) {
			$k = $request->getPost ();
			$page = $k->page;
			if (! $page)
				$page = 1;
			$paginator = $this->getMainTable ()->fetbyuser ( '', true, 'sticky', 'DESC' );
			// set the current page to what has been passed in query string, or to 1 if none set
			$paginator->setCurrentPageNumber ( ( int ) $page );
			// set the number of items per page to 10
			$paginator->setItemCountPerPage ( 8 );
			
			// $viewModel->user=$getuser;
			// $viewModel->err=true;
			// $viewModel->video=$video;
			$viewModel->paginator = $paginator;
			return $viewModel;
			// echo "ko du cqyen";
		}
	}
	public function runplayAction() {
		
		// header------------------------------------------------
		ob_start ( 'ob_gzhandler' );
		$this->layout ( 'layout/bags' );
		$catalog = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getdata' 
		) );
		$this->layout ()->catalog = $catalog;
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$allcat = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getall' 
		) );
		$this->layout ()->getuser = $getuser;
		
		$seriecode = $this->params ()->fromRoute ( 'id', 0 );
		$data = $this->getMainTable ()->getrowcontent ( $seriecode );
		
		$this->layout ()->data = $data;
		// var_dump($allcat);
		$par = explode ( ',', $allcat [$data->catelog]->child );
		if (isset ( $_GET ['playlist'] ))
			$playlist = $_GET ['playlist'];
		if (isset ( $playlist )) {
			$row = $this->getPlaylistTable ()->getrowbycode ( $playlist );
			if ($row) {
				$tmp = array ();
				$list = explode ( ',', $row->video_id );
				for($i = 0; $i < sizeof ( $list ) - 1; $i ++) {
					$tmp [$i] = $this->getMainTable ()->getUpload ( $list [$i] );
				}
			}
			// var_dump($tmp);
		}
		$paginator = $this->getMainTable ()->fetcatalogAll ( $data->catelog, $par, true );
		// set the current page to what has been passed in query string, or to 1 if none set
		$paginator->setCurrentPageNumber ( 1 );
		// set the number of items per page to 10
		$paginator->setItemCountPerPage ( 10 );
		
		return new ViewModel ( array (
				'paginator' => $paginator 
		) );
	}
	public function embedadsAction() {
		$this->layout ( 'layout/embed' );
		$seriecode = $this->params ()->fromRoute ( 'id', 0 );
		$data = $this->getMainTable ()->getrowcontent ( $seriecode );
		if ($data == false)
			return $this->layout ()->data = $data;
			// $ex=$this->getExTable()->getserver($data->externalsv_id);
			// $mediafire=new ConnectMS($ex);
			// if($data->quick_key)$data->external_link=$mediafire->get_link($data->quick_key);
			// else{
			// $obj=$mediafire->search($data->seriecode,$data->folder_key);
			// if($obj){
			// if($obj->response->results_count)
			// {
			// $data->quick_key=$obj->response->results[0]->quickkey;
			// $data->external_link=$mediafire->get_link($data->quick_key);
			// $this->getMainTable()->updatequickkey($data->quick_key,$data->id);
			// }
			// }
			// }
		if (isset ( $_GET ['playlist'] ))
			$playlist = $_GET ['playlist'];
		if (isset ( $playlist )) {
			$row = $this->getPlaylistTable ()->getrowbycode ( $playlist );
			if ($row) {
				$tmp = array ();
				$list = explode ( ',', $row->video_id );
				for($i = 0; $i < sizeof ( $list ) - 1; $i ++) {
					$tmp [$i] = $this->getMainTable ()->getUpload ( $list [$i] );
				}
				$this->layout ()->tmp = $tmp;
			}
		}
		$this->getMainTable ()->addviews ( $data );
		
		// Creat xml respose
		// print($this->responsexml());
		
		$this->layout ()->data = $data;
		// pre
		$pre = $data->ads_pre;
		if ($pre) {
			$row = $this->checkads ( $pre, 'pre' );
			$this->layout ()->pre = $row;
		}
		
		// mid ads send to view
		$mid = $data->ads_mid;
		if ($mid) {
			$row = $this->checkads ( $mid, 'mid' );
			$this->layout ()->mid = $row;
		}
		
		// bottom ads send to view
		$bot = $data->ads_bot;
		if ($bot) {
			$row = $this->checkads ( $bot, 'bot' );
			$this->layout ()->bot = $row;
		}
		
		// Get Banner ads
		$banner = $data->banner;
		if ($banner) {
			
			$row = $this->getbannerTable ()->getadsbanner ( $banner );
			// echo "if new : ";var_dump($row);
			$this->layout ()->_banner_data = $banner;
			$this->layout ()->banner = $row;
		}
		
		// var_dump($row);
		
		// video streamming
		// $_test_video = "http://127.0.0.1:1801/data/upload/videos/c5e824284c3366203a1b2984148e8375/6bf995133b51fdec573bac9d36fdd302/6cb092103e3f20bad508103d89f9fd57";
		// $_test_video_foler = "http://127.0.0.1:1801/data/upload/videos/c5e824284c3366203a1b2984148e8375/6bf995133b51fdec573bac9d36fdd302/6cb092103e3f20bad508103d89f9fd57.mp4";
		// $this->layout()->_test_video=$_test_video;
		// $stream = new VideoStream($_test_video_foler);
		// $stream->start();
		// exit;
	}
	public function responsexmlAction($_pre = null, $_mid = null, $_post = null) {
		$this->layout ( "layout/none" );
		// Send the headers
		header ( 'Content-type: text/xml' );
		// header('Pragma: public');
		// header('Cache-control: private');
		// header('Expires: -1');
		
		$pre = ( int ) $this->params ()->fromRoute ( 'pre', 0 );
		
		if ($pre) {
			$row = $this->checkads ( $pre, 'pre' );
			$link_pre = $row->adscode;
			// var_dump($row); var_dump($link_pre);die("honag phuc");
		}
		
		// mid ads send to view
		$mid = ( int ) $this->params ()->fromRoute ( 'mid', 0 );
		if ($mid) {
			$row = $this->checkads ( $mid, 'mid' );
			$link_mid = $row->adscode;
		}
		
		// bottom ads send to view
		$bot = ( int ) $this->params ()->fromRoute ( 'post', 0 );
		if ($bot) {
			$row = $this->checkads ( $bot, 'bot' );
			$link_bot = $row->adscode;
		}
		
		$xmlstr = '<VideoAdServingTemplate xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
					xsi:noNamespaceSchemaLocation="vast.xsd">';
		
		if ($pre and $link_pre != '') {
			$xmlstr .= '<Ad id="pre-roll-0">
						<InLine>
							<AdSystem>2.0</AdSystem>
							<AdTitle>Sample</AdTitle>
							<Impression></Impression>
							<Creatives>
								<Creative sequence="1" id="2">
									<Linear>
										<Duration>00:02:00</Duration>
										<AdParameters>
										</AdParameters>
										<MediaFiles>
											<MediaFile delivery="progressive" bitrate="400" type="video/mp4">
												<URL>' . $link_pre . '
												</URL>
											</MediaFile>
										</MediaFiles>
										<VideoClicks>
											<ClickThrough>
							         <![CDATA[http://clipmediagroup.eu/]]>
											</ClickThrough>
											<ClickTracking>
								<![CDATA[http://clipmediagroup.eu]]>
											</ClickTracking>
										</VideoClicks>
									</Linear>
								</Creative>
							</Creatives>
						</InLine>
					</Ad>';
		} // end pre
		
		if ($mid and $link_mid != '') {
			$xmlstr .= '<Ad id="mid-roll-0">
						<InLine>
							<AdSystem>OpenX</AdSystem>
							<AdTitle>
				<![CDATA[ Lipton ]]>
							</AdTitle>
							<Description>
				<![CDATA[ Inline Video Ad ]]>
							</Description>
							<Impression>
								<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/
				]]>
								</URL>
							</Impression>
							<Video>
								<Duration>00:00:05</Duration>
								<AdID>
				<![CDATA[ 3 ]]>
								</AdID>
								<VideoClicks>
									<ClickThrough>
										<URL id="destination">
				<![CDATA[
				http://clipmediagroup.eu/
				]]>
										</URL>
									</ClickThrough>
								</VideoClicks>
								<MediaFiles>
									<MediaFile delivery="progressive" bitrate="400" width="640"
										height="480" type="video/mp4">
										<URL><![CDATA[ ' . $link_mid . ' ]]>
										</URL>
									</MediaFile>
								</MediaFiles>
							</Video>
							<TrackingEvents>
								<Tracking event="start">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/
				]]>
									</URL>
								</Tracking>
								<Tracking event="midpoint">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/midpoint
				]]>
									</URL>
								</Tracking>
								<Tracking event="firstQuartile">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/firstquartile
				]]>
									</URL>
								</Tracking>
								<Tracking event="thirdQuartile">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/thirdquartile
				]]>
									</URL>
								</Tracking>
								<Tracking event="complete">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/complete
				]]>
									</URL>
								</Tracking>
								<Tracking event="mute">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/mute
				]]>
									</URL>
								</Tracking>
								<Tracking event="pause">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/pause
				]]>
									</URL>
								</Tracking>
								<Tracking event="replay">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/replay
				]]>
									</URL>
								</Tracking>
								<Tracking event="fullscreen">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/fullscreen
				]]>
									</URL>
								</Tracking>
								<Tracking event="stop">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/stop
				]]>
									</URL>
								</Tracking>
								<Tracking event="unmute">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/unmute
				]]>
									</URL>
								</Tracking>
								<Tracking event="resume">
									<URL id="primaryAdServer">
				<![CDATA[
				http://clipmediagroup.eu/resume
				]]>
									</URL>
								</Tracking>
							</TrackingEvents>
						</InLine>
					</Ad>';
			
			$xmlstr .= '<Ad id="mid-roll-1">
						<InLine>
							<AdSystem>2.0</AdSystem>
							<AdTitle>Sample</AdTitle>
							<Impression></Impression>
							<Creatives>
								<Creative sequence="1" id="2">
									<Linear>
										<Duration>00:14:00</Duration>
										<AdParameters>
										</AdParameters>
										<MediaFiles>
											<MediaFile delivery="progressive" bitrate="400" type="video/mp4">
												<URL>' . $link_mid . '
												</URL>
											</MediaFile>
										</MediaFiles>
									</Linear>
								</Creative>
							</Creatives>
						</InLine>
					</Ad>';
		} // end mid
		
		if ($bot and $link_bot != '') {
			$xmlstr .= '<Ad id="post-roll-0">
						<InLine>
							<AdSystem>2.0</AdSystem>
							<AdTitle>Sample</AdTitle>
							<Impression></Impression>
							<Creatives>
								<Creative sequence="1" id="2">
									<Linear>
										<Duration>00:14:00</Duration>
										<AdParameters>
										</AdParameters>
										<MediaFiles>
											<MediaFile delivery="progressive" bitrate="400" type="video/mp4">
												<URL>http://videostreaming-ipcamera.tk/ADS-VIDEO-SKIP/HTML5-vast-pre-roll-video-ads-with-skip/vod/lipton_5sec.mp4
												</URL>
											</MediaFile>
										</MediaFiles>
									</Linear>
								</Creative>
							</Creatives>
						</InLine>
					</Ad>';
		} // end bot
		
		$xmlstr .= '</VideoAdServingTemplate>';
		
		$_resphone = new \SimpleXMLElement ( $xmlstr );
		
		// $_resphone->movie[0]->characters->character[0]->name = 'Miss Coder';
		
		print ($_resphone->asXML ()) ;
	}
	public function playAction() {
		
		// header------------------------------------------------
		ob_start ( 'ob_gzhandler' );
		$this->layout ( 'layout/bags' );
		$catalog = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getdata' 
		) );
		$this->layout ()->catalog = $catalog;
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$allcat = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getall' 
		) );
		$this->layout ()->getuser = $getuser;
		
		$seriecode = $this->params ()->fromRoute ( 'id', 0 );
		$data = $this->getMainTable ()->getrowcontent ( $seriecode );
		
		$this->layout ()->data = $data;
		// var_dump($allcat);
		$par = explode ( ',', $allcat [$data->catelog]->child );
		if (isset ( $_GET ['playlist'] ))
			$playlist = $_GET ['playlist'];
		if (isset ( $playlist )) {
			$row = $this->getPlaylistTable ()->getrowbycode ( $playlist );
			if ($row) {
				$tmp = array ();
				$list = explode ( ',', $row->video_id );
				for($i = 0; $i < sizeof ( $list ) - 1; $i ++) {
					$tmp [$i] = $this->getMainTable ()->getUpload ( $list [$i] );
				}
			}
			// var_dump($tmp);
		}
		$paginator = $this->getMainTable ()->fetcatalogAll ( $data->catelog, $par, true );
		// set the current page to what has been passed in query string, or to 1 if none set
		$paginator->setCurrentPageNumber ( 1 );
		// set the number of items per page to 10
		$paginator->setItemCountPerPage ( 10 );
		
		return new ViewModel ( array (
				'paginator' => $paginator 
		) );
	}
	public function embedAction() {
		$this->layout ( 'layout/embed' );
		$seriecode = $this->params ()->fromRoute ( 'id', 0 );
		$data = $this->getMainTable ()->getrowcontent ( $seriecode );
		if ($data == false)
			return $this->layout ()->data = $data;
			// $ex=$this->getExTable()->getserver($data->externalsv_id);
			// $mediafire=new ConnectMS($ex);
			// if($data->quick_key)$data->external_link=$mediafire->get_link($data->quick_key);
			// else{
			// $obj=$mediafire->search($data->seriecode,$data->folder_key);
			// if($obj){
			// if($obj->response->results_count)
			// {
			// $data->quick_key=$obj->response->results[0]->quickkey;
			// $data->external_link=$mediafire->get_link($data->quick_key);
			// $this->getMainTable()->updatequickkey($data->quick_key,$data->id);
			// }
			// }
			// }
		if (isset ( $_GET ['playlist'] ))
			$playlist = $_GET ['playlist'];
		if (isset ( $playlist )) {
			$row = $this->getPlaylistTable ()->getrowbycode ( $playlist );
			if ($row) {
				$tmp = array ();
				$list = explode ( ',', $row->video_id );
				for($i = 0; $i < sizeof ( $list ) - 1; $i ++) {
					$tmp [$i] = $this->getMainTable ()->getUpload ( $list [$i] );
				}
				$this->layout ()->tmp = $tmp;
			}
		}
		$this->getMainTable ()->addviews ( $data );
		
		$this->layout ()->data = $data;
		$pre = $data->ads_pre;
		if ($pre) {
			$row = $this->checkads ( $pre, 'pre' );
			$this->layout ()->pre = $row;
		}
		// mid ads send to view
		$mid = $data->ads_mid;
		if ($mid) {
			$row = $this->checkads ( $mid, 'mid' );
			$this->layout ()->mid = $row;
		}
		// bottom ads send to view
		$bot = $data->ads_bot;
		if ($bot) {
			$row = $this->checkads ( $bot, 'bot' );
			$this->layout ()->bot = $row;
		}
		// var_dump($row);
	}
	public function ftp_mksubdirs($ftpcon, $ftpbasedir, $ftpath) {
		@ftp_chdir ( $ftpcon, $ftpbasedir );
		$parts = explode ( '/', $ftpath );
		// echo $ftpbasedir;
		// var_dump($parts);
		foreach ( $parts as $part ) {
			if (! @ftp_chdir ( $ftpcon, $part )) {
				ftp_mkdir ( $ftpcon, $part );
				ftp_chdir ( $ftpcon, $part );
				// echo $part."</br>";
			}
		}
		// ftp_close($ftpcon);
	}
	public function searchkeyAction() {
		// $getuser=$this->forward()->dispatch('Admin\Controller\Index',array('action'=>'getuser'));
		// var_dump($getuser);
		$this->layout ( 'layout/embed' );
		$seriecode = $this->params ()->fromRoute ( 'id', 0 );
		$data = $this->getMainTable ()->getrowcontent ( $seriecode );
		
		$ex = $this->getExTable ()->getserver ( $data->externalsv_id );
		$mediafire = new ConnectMS ( $ex );
		
		if (! $data->quick_key) {
			$obj = $mediafire->search ( $data->seriecode, $data->folder_key );
			var_dump ( $obj );
			var_dump ( $obj->response->results [0]->quickkey );
			die ( "sss" );
		}
		$data->external_link = $mediafire->get_link ( $data->quick_key );
		$this->getMainTable ()->addviews ( $data );
		if ($data == false)
			$this->redirect ()->toRoute ( 'main', array (
					'action' => 'index' 
			) );
	}
	public function checkuserfolder($getuser) {
		$check_exsv = $this->getExTable ()->getserver ( $getuser->externalsv_id );
		$tmp = true;
		if (! $check_exsv) {
			$tmp = false;
		} elseif (! $check_exsv->status) {
			$tmp = false;
		}
		if ($tmp) {
			return $getuser;
		} else {
			// creat new folder
			$activesv = $this->getExTable ()->getactivesv ();
			$arr = array ();
			$i = 0;
			foreach ( $activesv as $val ) {
				$arr [$i] = $val;
				$i ++;
			}
			if ($i == 0) {
				die ( 'none server found' );
			}
			$ex = $arr [rand ( 0, $i - 1 )];
			$blockCipher = BlockCipher::factory ( 'mcrypt', array (
					'algo' => 'aes' 
			) );
			$blockCipher->setKey ( 'foxvsky' );
			$ex->passwd = $blockCipher->decrypt ( $ex->passwd );
			$mediafire = new ConnectMS ( $ex );
			$tmp = $mediafire->creat_folder ( $getuser->username . $ex->id, $ex->root_folder_key );
			$exsv = array ();
			$exsv ['id'] = $getuser->id;
			$exsv ['externalsv_id'] = $ex->id;
			$exsv ['folder_key'] = $tmp->folderkey;
			$exsv ['folder_name'] = $getuser->username . $ex->id;
			$this->getAdminTable ()->update_exsv ( $exsv );
			$this->getFolderTable ()->saveuserfolder ( $exsv );
			return $getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
					'action' => 'getuser' 
			) );
		}
	}
	public function uploadAction() {
		// header------------------------------------------------
		$this->layout ( 'layout/bags' );
		$catalog = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getdata' 
		) );
		$this->layout ()->catalog = $catalog;
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
		// var_dump($getuser);
		$checklogin = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'session' 
		) );
		if ($checklogin) {
			$arr = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
					'action' => 'getdata' 
			) );
			// var_dump($arr);
			$form = new UploadForm ();
			$form->addElements ( $arr );
			$tempFile = null;
			
			// -------------------------------upload mediafire server
			$getuser = $this->checkuserfolder ( $getuser );
			// -----------------------end mediafire upload-------------------
			
			$prg = $this->fileprg ( $form );
			
			if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
				return $prg; // Return PRG redirect response
			} elseif (is_array ( $prg )) {
				
				echo "$prg - new : ";
				echo "<pre>";
				print_r ( $prg );
				echo "</pre>";
				
				if ($form->isValid ()) {
					
					$data = $form->getData ();
					
					echo "form upload : - ";
					var_dump ( $data );
					die ();
					
					$temp = explode ( ".", $data ['seriecode'] ['0'] ['name'] );
					$extension = end ( $temp );
					$path = substr ( $data ["seriecode"] ['0'] ["tmp_name"], 1 );
					$ri = strrpos ( $path, '/' );
					$path2 = substr ( $path, 0, $ri );
					$title = sprintf ( "%.0f ", microtime ( true ) * 20000 );
					$title = str_replace ( ' ', '', $title );
					
					rename ( ROOT_PATH . $path, ROOT_PATH . $path2 . '/' . $title . '.' . $extension );
					$convert_link = ROOT_PATH . $path2 . '/' . $title . '.' . $extension;
					// --------------------------- UPLOAD TO FTP SERVER-------------------------------------------------------------------------------------------------------------
					$convert_img = ROOT_PATH . $path2 . '/' . $title . '.jpg';
					$convert_img_thumbnail = ROOT_PATH . $path2 . '/' . $title . '_thumbnail.jpg';
					$convert_img_medium = ROOT_PATH . $path2 . '/' . $title . '_medium.jpg';
					$medium = '500x280';
					$thumbnail = '250x140';
					
					ob_start ();
					passthru ( "ffmpeg -i $convert_link 2>&1" );
					
					$duration = ob_get_contents ();
					ob_end_clean ();
					$search = '/Duration: (.*?),/';
					$duration = preg_match ( $search, $duration, $matches, PREG_OFFSET_CAPTURE, 3 );
					$list_time = explode ( ':', $matches [1] [0] );
					// var_dump($list_time);
					$video_time = 0;
					$sizearr = sizeof ( $list_time );
					for($i = 0; $i < $sizearr; $i ++) {
						// echo (int)$list_time[$i];
						// echo "</br>";
						// echo pow(60,$sizearr-$i-1);
						// echo "</br>";
						$video_time += (( int ) $list_time [$i]) * pow ( 60, $sizearr - $i - 1 );
					}
					// echo $video_time;
					$rand_time = rand ( 0, $video_time );
					// echo $rand_time;
					exec ( "ffmpeg -i $convert_link -deinterlace -an -ss $rand_time -f mjpeg -t 1 -r 1 -y  $convert_img 2>&1 " );
					exec ( "ffmpeg -i $convert_link -deinterlace -an -ss $rand_time -f mjpeg -t 1 -r 1 -y -s $thumbnail $convert_img_thumbnail 2>&1 " );
					exec ( "ffmpeg -i $convert_link -deinterlace -an -ss $rand_time -f mjpeg -t 1 -r 1 -y -s $medium $convert_img_medium 2>&1 " );
					
					$path3 = substr ( $path2, 29 );
					$local = $this->getLocalTable ()->getserver ( 2 );
					$blockCipher = BlockCipher::factory ( 'mcrypt', array (
							'algo' => 'aes' 
					) );
					$blockCipher->setKey ( 'foxvsky' );
					$local->ftppass = $blockCipher->decrypt ( $local->ftppass );
					// echo $path3;
					$dir = $local->path . '/data/upload/videos/' . $path3 . '/' . md5 ( $title . 'foxvsky' );
					// echo $dir;
					$file = ROOT_PATH . $path2 . '/' . $title . '.' . $extension;
					$remote_file = $dir . '/' . md5 ( $title . 'aihoa' ) . '.mp4';
					$remote_img = $local->path . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) . '/large.jpg';
					$remote_thumbnail = $local->path . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) . '/thumbnail.jpg';
					$remote_medium = $local->path . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) . '/medium.jpg';
					$conn_id = ftp_connect ( $local->ip );
					$login_result = ftp_login ( $conn_id, $local->ftpusername, $local->ftppass );
					$this->ftp_mksubdirs ( $conn_id, $local->path, 'data/upload/videos/' . $path3 . '/' . md5 ( $title . 'foxvsky' ) );
					$this->ftp_mksubdirs ( $conn_id, $local->path, 'data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) );
					$upload_vid = ftp_put ( $conn_id, $remote_file, $file, FTP_BINARY );
					$upload_img = ftp_put ( $conn_id, $remote_img, $convert_img, FTP_BINARY );
					$upload_img_thumbnail = ftp_put ( $conn_id, $remote_thumbnail, $convert_img_thumbnail, FTP_BINARY );
					$upload_img_medium = ftp_put ( $conn_id, $remote_medium, $convert_img_medium, FTP_BINARY );
					
					$video_link = $local->link . '/data/upload/videos/' . $path3 . '/' . md5 ( $title . 'foxvsky' ) . '/' . md5 ( $title . 'aihoa' ) . '.mp4';
					$img_link = $local->link . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) . '/large.jpg';
					// echo "<img src='http://".$img_link."'/></br>";
					// echo "<video src='http://".$video_link."'/></video></br>";
					ftp_close ( $conn_id );
					
					$video = new Main ();
					$video->exchangeArray ( $form->getData () );
					$video->seriecode = $title;
					$video->duration = substr ( $matches [1] [0], 0, 8 );
					$video->local_link = 'http://' . $video_link;
					$video->imgfolder = 'http://' . $local->link . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' );
					$video->localsv_id = $local->id;
					$check = $this->getMainTable ()->saveVideo ( $video );
					if (! $check) {
						return $this->redirect ()->toUrl ( 'http://clipmediagroup.eu/main/edit/' . $title );
					}
					// else
				} else {
					$fileErrors = $form->get ( 'seriecode' )->getMessages ();
					if (empty ( $fileErrors )) {
						$tempFile = $form->get ( 'seriecode' )->getValue ();
					}
				}
			}
			
			return array (
					'form' => $form,
					'tempFile' => $tempFile 
			);
			$this->layout ()->check = $check;
		} else {
			$this->layout ( 'error/admin' );
		}
	}
	public function remoteuploadAction() {
		
		// header------------------------------------------------
		$this->layout ( 'layout/bags' );
		$catalog = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getdata' 
		) );
		$this->layout ()->catalog = $catalog;
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		$this->layout ()->getuser = $getuser;
		// var_dump($getuser);
		$checklogin = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'session' 
		) );
		if ($checklogin) {
			if ($getuser->group == 'admin' || $getuser->group == 'supperadmin') {
				$arr = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
						'action' => 'getdata' 
				) );
				// var_dump($arr);
				$form = new RemoteForm ( 'remoteform' );
				$form->addElements ( $arr );
				$tempFile = null;
				
				// -------------------------------upload mediafire server
				$getuser = $this->checkuserfolder ( $getuser );
				// -----------------------end mediafire upload-------------------
				
				$prg = $this->fileprg ( $form );
				if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
					return $prg; // Return PRG redirect response
				} elseif (is_array ( $prg )) {
					
					if ($form->isValid ()) {
						$data = $form->getData ();
						$file_remote = $data ['urlremote'];
						$file_headers = @get_headers ( $file_remote );
						if ($file_headers [0] == 'HTTP/1.1 404 Not Found') {
							$view = new ViewModel ();
							$exists = false;
							$view->exists = $exists;
							$view->setVariable ( 'remoteform', $form );
							return $view;
						} else {
							$exists = true;
							$title = sprintf ( "%.0f ", microtime ( true ) * 20000 );
							$title = str_replace ( ' ', '', $title );
							$name = md5 ( date ( 'ymd' ) );
							if (! file_exists ( 'temp/data/tmpuploads/videos/' . $name )) {
								mkdir ( 'temp/data/tmpuploads/videos/' . $name, 0777, true );
							}
							$path2 = '/temp/data/tmpuploads/videos/' . $name;
							$path = ROOT_PATH . $path2;
							/*
							 * $handle=file_get_contents($file); $fp = fopen($path.'/'.$title.'.mp4', "w"); fclose($fp); file_put_contents($path.'/'.$title.'.mp4', $handle);
							 */
							$fp = fopen ( $path . '/' . $title . '.mp4', "w" );
							$ch = curl_init ();
							$agent = $_SERVER ['HTTP_USER_AGENT'];
							// echo $agent;
							curl_setopt ( $ch, CURLOPT_AUTOREFERER, TRUE );
							curl_setopt ( $ch, CURLOPT_USERAGENT, $agent );
							curl_setopt ( $ch, CURLOPT_HTTPGET, TRUE );
							curl_setopt ( $ch, CURLOPT_HEADER, 0 );
							curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
							curl_setopt ( $ch, CURLOPT_URL, $file_remote );
							curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, TRUE );
							
							curl_setopt ( $ch, CURLOPT_FILE, $fp );
							// curl_setopt($ch, CURLOPT_HEADER, 0);
							
							$k = curl_exec ( $ch );
							curl_close ( $ch );
							fclose ( $fp );
							var_dump ( $k );
							// die('stop');
							
							// rename(ROOT_PATH.$path,ROOT_PATH.$path2.'/'.$title.'.'.$extension);
							$convert_link = ROOT_PATH . $path2 . '/' . $title . '.mp4';
							// --------------------------- UPLOAD TO FTP SERVER-------------------------------------------------------------------------------------------------------------
							$convert_img = ROOT_PATH . $path2 . '/' . $title . '.jpg';
							$convert_img_thumbnail = ROOT_PATH . $path2 . '/' . $title . '_thumbnail.jpg';
							$convert_img_medium = ROOT_PATH . $path2 . '/' . $title . '_medium.jpg';
							$medium = '500x280';
							$thumbnail = '250x140';
							ob_start ();
							passthru ( "ffmpeg -i $convert_link 2>&1" );
							
							$duration = ob_get_contents ();
							ob_end_clean ();
							$search = '/Duration: (.*?),/';
							$duration = preg_match ( $search, $duration, $matches, PREG_OFFSET_CAPTURE, 3 );
							$list_time = explode ( ':', $matches [1] [0] );
							// var_dump($list_time);
							$video_time = 0;
							$sizearr = sizeof ( $list_time );
							for($i = 0; $i < $sizearr; $i ++) {
								echo ( int ) $list_time [$i];
								echo "</br>";
								echo pow ( 60, $sizearr - $i - 1 );
								echo "</br>";
								$video_time += (( int ) $list_time [$i]) * pow ( 60, $sizearr - $i - 1 );
							}
							// echo $video_time;
							$rand_time = rand ( 0, $video_time );
							// echo $rand_time;
							exec ( "ffmpeg -i $convert_link -deinterlace -an -ss $rand_time -f mjpeg -t 0.01 -r 1 -y  $convert_img 2>&1 " );
							exec ( "ffmpeg -i $convert_link -deinterlace -an -ss $rand_time -f mjpeg -t 0.01 -r 1 -y -s $thumbnail $convert_img_thumbnail 2>&1 " );
							exec ( "ffmpeg -i $convert_link -deinterlace -an -ss $rand_time -f mjpeg -t 0.01 -r 1 -y -s $medium $convert_img_medium 2>&1 " );
							
							$path3 = substr ( $path2, 29 );
							$local = $this->getLocalTable ()->getserver ( 1 );
							$blockCipher = BlockCipher::factory ( 'mcrypt', array (
									'algo' => 'aes' 
							) );
							$blockCipher->setKey ( 'foxvsky' );
							$local->ftppass = $blockCipher->decrypt ( $local->ftppass );
							
							$dir = $local->path . '/data/upload/videos/' . $path3 . '/' . md5 ( $title . 'foxvsky' );
							$file = ROOT_PATH . $path2 . '/' . $title . '.mp4';
							$remote_file = $dir . '/' . md5 ( $title . 'aihoa' ) . '.mp4';
							$remote_img = $local->path . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) . '/large.jpg';
							$remote_thumbnail = $local->path . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) . '/thumbnail.jpg';
							$remote_medium = $local->path . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) . '/medium.jpg';
							$conn_id = ftp_connect ( $local->ip );
							$login_result = ftp_login ( $conn_id, $local->ftpusername, $local->ftppass );
							$this->ftp_mksubdirs ( $conn_id, $local->path, 'data/upload/videos/' . $path3 . '/' . md5 ( $title . 'foxvsky' ) );
							$this->ftp_mksubdirs ( $conn_id, $local->path, 'data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) );
							$upload_vid = ftp_put ( $conn_id, $remote_file, $file, FTP_BINARY );
							$upload_img = ftp_put ( $conn_id, $remote_img, $convert_img, FTP_BINARY );
							$upload_img_thumbnail = ftp_put ( $conn_id, $remote_thumbnail, $convert_img_thumbnail, FTP_BINARY );
							$upload_img_medium = ftp_put ( $conn_id, $remote_medium, $convert_img_medium, FTP_BINARY );
							
							$video_link = $local->link . '/data/upload/videos/' . $path3 . '/' . md5 ( $title . 'foxvsky' ) . '/' . md5 ( $title . 'aihoa' ) . '.mp4';
							$img_link = $local->link . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' ) . '/large.jpg';
							echo "<img src='http://" . $img_link . "'/></br>";
							echo "<video src='http://" . $video_link . "'/></video></br>";
							
							ftp_close ( $conn_id );
							// ------------------------------------------------END FTP UPLOAD--------------------------------------------------------------------------------------------------------------------
							// ------------------------------------------------UPLOAD MEDIAFIRE SERVER-------------------------------------------------------------------------------------------------------------
							$getuser = $this->checkuserfolder ( $getuser );
							$hash = hash_file ( 'sha256', $convert_link );
							$size = filesize ( $convert_link );
							$files = array ();
							$files ['filename'] = $title . '.mp4';
							$files ['hash'] = $hash;
							$files ['size'] = $size;
							$files ['url'] = 'http://' . $video_link;
							$files ['folder_key'] = $getuser->folder_key;
							// var_dump($file);
							// echo "</br>";
							$ex = $this->getExTable ()->getserver ( $getuser->externalsv_id );
							$mediafire = new ConnectMS ( $ex );
							$add = $mediafire->add_web_upload ( $files );
							$quickkey = $mediafire->instant ( $files );
							if (! isset ( $quickkey ) && ! $quickey) {
								$quickkey = '';
								$direct_link = '';
							} else {
								$direct_link = $mediafire->get_link ( $quickkey );
							}
							$video = new Main ();
							$video->exchangeArray ( $form->getData () );
							
							$video->seriecode = $title;
							$video->duration = substr ( $matches [1] [0], 0, 8 );
							$video->folder_key = $getuser->folder_key;
							$video->quick_key = $quickkey;
							$video->local_link = 'http://' . $video_link;
							$video->imgfolder = 'http://' . $local->link . '/data/upload/images/' . $path3 . '/' . md5 ( $title . 'mylove' );
							$video->localsv_id = $local->id;
							$video->externalsv_id = $getuser->externalsv_id;
							$video->external_link = $direct_link;
							// var_dump($video);die('123');
							
							// ------------------------------------------------END MEDIAFIRE UPLOAD------------------------------------------------------------------------------------
							$check = $this->getMainTable ()->saveVideo ( $video );
							if (! $check)
								return $this->redirect ()->toUrl ( WEBPATH . '/main/edit/' . $title, true );
							else
								$this->layout ()->check = $check;
						}
					} else {
						$fileErrors = $form->get ( 'seriecode' )->getMessages ();
						if (empty ( $fileErrors )) {
							$tempFile = $form->get ( 'seriecode' )->getValue ();
						}
					}
				}
				
				return array (
						'remoteform' => $form,
						'tempFile' => $tempFile 
				);
			} else {
				return $this->layout ( 'error/admin' );
			}
		} else {
			return $this->layout ( 'error/admin' );
		}
	}
	public function mycartAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// echo $request->isPost();
		// var_dump($request);
		if ($request->isPost ()) {
			$saleproduct = '';
			$viewModel->calaogue = $saleproduct;
		}
		return $viewModel;
	}
	public function compareproductAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// echo $request->isPost();
		// var_dump($request);
		if ($request->isPost ()) {
			$saleproduct = '';
			$viewModel->calaogue = $saleproduct;
		}
		return $viewModel;
	}
	public function myacountAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// echo $request->isPost();
		// var_dump($request);
		if ($request->isPost ()) {
			$saleproduct = '';
			$viewModel->calaogue = $saleproduct;
		}
		return $viewModel;
	}
	public function myproductAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// echo $request->isPost();
		// var_dump($request);
		if ($request->isPost ()) {
			$saleproduct = '';
			$viewModel->calaogue = $saleproduct;
		}
		return $viewModel;
	}
	public function containernoneAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// echo $request->isPost();
		// var_dump($request);
		if ($request->isPost ()) {
			$saleproduct = '';
			$viewModel->calaogue = $saleproduct;
		}
		return $viewModel;
	}
	public function populartagsAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// echo $request->isPost();
		// var_dump($request);
		if ($request->isPost ()) {
			$saleproduct = '';
			$viewModel->calaogue = $saleproduct;
		}
		return $viewModel;
	}
	public function compareblockAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// echo $request->isPost();
		// var_dump($request);
		if ($request->isPost ()) {
			$saleproduct = '';
			$viewModel->calaogue = $saleproduct;
		}
		return $viewModel;
	}
	public function loadsaleproductAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
// 		$request = $this->getRequest ();
// 		// echo $request->isPost();
// 		// var_dump($request);
// 		if ($request->isPost ()) {
// 			$saleproduct = '';
// 			$viewModel->calaogue = $saleproduct;
// 		}
		$limit_sale_products = null;
		$Product_sale_products = $this->getServiceLocator()->get('ProductTable')->get_sale_products($limit_NEW_PRODUCTS);
		 
		$viewModel->Product_sale_products = $Product_sale_products;
		return $viewModel;
	}
	public function bestsellerAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
// 		$request = $this->getRequest ();
// 		// echo $request->isPost();
// 		// var_dump($request);
// 		if ($request->isPost ()) {
// 			$bestseller = '';
// 			$viewModel->calaogue = $bestseller;
// 		}
		$limit_bestseller = 4;
		$Product_bestseller = $this->getServiceLocator()->get('ProductTable')->get_bestseller($limit_bestseller);
		$viewModel->Product_bestseller = $Product_bestseller;
		
		return $viewModel;
	}
	public function loadleftcataogueAction() {
		
		// $this->layout('layout/none');
        $allcat = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getall' 
		   ) ); 
        foreach ($allcat as $key=>$value){
            $parent=$value->id;           
            $data_parent[$parent]=  $this->getCatalogTable()->get_parent($parent);            
        }
		$this->layout ()->allcat = $allcat; 
                $this->layout ()->data_parent = $data_parent; 
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// echo $request->isPost();
		// var_dump($request);
		if ($request->isPost ()) {
			$cataogue = '';
			$viewModel->calaogue = $cataogue;
			return $viewModel;
		}
		return $viewModel;
	}
	public function uservideoAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		if ($request->isPost ()) {
			$k = $request->getPost ();
			// echo $k->idcode;
			$str = substr ( $k->idcode, 10 );
			$i = strrpos ( $str, '/' );
			if ($i) {
				$channel_code = substr ( $str, 0, $i );
			} else
				$channel_code = $str;
			
			$data = $this->getChannelTable ()->getrow ( $channel_code );
			$page = $k->page;
			$sort = $k->sort;
			$sortby = $k->sortby;
			
			if (isset ( $k->item )) {
				$item = 4;
			} else
				$item = 12;
			if (! $sort)
				$sort = 'id';
			if (! $sortby)
				$sortby = 'DESC';
				// echo $sort.$sortby;
			$paginator = $this->getMainTable ()->fetbyuser ( $data->user_name, true, $sort, $sortby );
			
			$paginator->setCurrentPageNumber ( ( int ) $page );
			// set the number of items per page to 10
			$paginator->setItemCountPerPage ( $item );
			if ($page > $paginator->count ())
				return $viewModel;
			$viewModel->paginator = $paginator;
			// echo $paginator->count();
			// $vieModel->url=$k->icode;
			return $viewModel;
		}
		return $viewModel;
	}
	public function plAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$session_user = new Container ( 'user' );
		$user = $session_user->username;
		if (isset ( $user )) {
			$paginator = $this->getPlaylistTable ()->fetbyuser ( $user, true );
			
			// set the current page to what has been passed in query string, or to 1 if none set
			$paginator->setCurrentPageNumber ( 1 );
			// set the number of items per page to 10
			$paginator->setItemCountPerPage ( 30 );
			// $viewModel->paginator=$paginator;
			// $k=$paginator;
			// var_dump($k);
			$tmp = array ();
			$j = 0;
			foreach ( $paginator as $value ) {
				
				$tmp [$j] ['pl'] = $value;
				$tmp [$j] ['video'] = array ();
				if ($value->video_id) {
					$list = explode ( ',', $value->video_id );
					for($i = 0; $i < sizeof ( $list ) - 1; $i ++) {
						$tmp [$j] ['video'] [$i] = $this->getMainTable ()->getUpload ( $list [$i] );
					}
					// var_dump($tmp);
				}
				$j ++;
				
				// var_dump($value);
			}
			// var_dump($tmp);
			$viewModel->paginator = $tmp;
			
			return $viewModel;
		}
		return $viewModel;
	}
	public function plvideoAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		if ($request->isPost ()) {
			$k = $request->getPost ();
			$page = $k->page;
			// var_dump($k);
			$str = substr ( $k->idcode, 10 );
			$i = strrpos ( $str, '/' );
			if ($i) {
				$channel_code = substr ( $str, 0, $i );
			} else
				$channel_code = $str;
			
			$data = $this->getChannelTable ()->getrow ( $channel_code );
			// echo $channel_code;
			// var_dump($data);
			// $page=$k->page;
			$list = explode ( ',', $data->playlist );
			// var_dump($list);
			$paginator = $this->getPlaylistTable ()->fetbyid ( $list, true );
			$paginator->setCurrentPageNumber ( ( int ) $page );
			// set the number of items per page to 10
			$paginator->setItemCountPerPage ( 10 );
			$tmp = array ();
			$j = 0;
			foreach ( $paginator as $value ) {
				
				$tmp [$j] ['pl'] = $value;
				$tmp [$j] ['video'] = array ();
				if ($value->video_id) {
					$list = explode ( ',', $value->video_id );
					for($i = 0; $i < sizeof ( $list ) - 1; $i ++) {
						$tmp [$j] ['video'] [$i] = $this->getMainTable ()->getUpload ( $list [$i] );
					}
					// var_dump($tmp);
				}
				$j ++;
				
				// var_dump($value);
			}
			// var_dump($tmp);
			$viewModel->paginator = $tmp;
			return $viewModel;
		}
		return $viewModel;
	}
	public function uploadimgAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		return $viewModel;
	}
	public function uploadProgressAction() {
		$id = $this->params ()->fromQuery ( 'id', null );
		$progress = new \Zend\ProgressBar\Upload\SessionProgress ();
		return new \Zend\View\Model\JsonModel ( $progress->getProgress ( $id ) );
	}
	public function catalogAction() {
		$this->layout ( 'layout/bags' );
		$catalog = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getdata' 
		) );
		$this->layout ()->catalog = $catalog;
		$allcat = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getall' 
		) );
		$this->layout ()->allcat = $allcat;
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		// var_dump($getuser);
		// echo $ca
		$this->layout ()->getuser = $getuser;
		// search form
		$form = new searchForm ();
		$request = $this->getRequest ();
		// var_dump($request);
		if ($request->isPost ()) {
			$form->setData ( $request->getPost () );
			if ($form->isValid ()) {
				$data = $form->getData ();
				// var_dump($data);
				$this->redirect ()->toUrl ( WEBPATH . '/search?keyword=' . $data ['search'], true );
			} else {
			}
		}
		
		$select = new Select ();
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$this->layout ()->id = $id;
		$this->layout ()->title = str_replace ( '-', '', $catalog [$id] );
		$par = explode ( ',', $allcat [$id]->child );
		
		$page = $this->params ()->fromRoute ( 'page', 0 ) ? ( int ) $this->params ()->fromRoute ( 'page', 0 ) : 1;
		
		$order_by = $this->params ()->fromRoute ( 'order_by', 0 ) ? $this->params ()->fromRoute ( 'order_by', 0 ) : 'id';
		$order = $this->params ()->fromRoute ( 'order', 0 ) ? $this->params ()->fromRoute ( 'order', 0 ) : 'ASC';
		// echo $page.'-'.$order_by.' '.$order;
		// grab the paginator from the AlbumTable
		$paginator = $this->getMainTable ()->fetcatalogAll ( $id, $par, true );
		// set the current page to what has been passed in query string, or to 1 if none set
		$paginator->setCurrentPageNumber ( ( int ) $page );
		// set the number of items per page to 10
		$paginator->setItemCountPerPage ( 29 );
		$this->layout ()->pagess = $page;
		
		return new ViewModel ( array (
				'paginator' => $paginator 
		) );
	}
	public function profileAction() {
		$catalog = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getdata' 
		) );
		$this->layout ()->catalog = $catalog;
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		if ($getuser) {
			$this->layout ( 'layout/bags' );
			$allcat = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
					'action' => 'getall' 
			) );
			$this->layout ()->allcat = $allcat;
			$this->layout ()->getuser = $getuser;
			$channel = $this->getChannelTable ()->getname ( $getuser->channel_code );
			$this->layout ()->channel = $channel;
			$form = new searchForm ();
			$request = $this->getRequest ();
			if ($request->isPost ()) {
				$form->setData ( $request->getPost () );
				if ($form->isValid ()) {
					$data = $form->getData ();
					// var_dump($data);
					$this->redirect ()->toUrl ( WEBPATH . '/search?keyword=' . $data ['search'], true );
				} else {
				}
			}
			$select = new Select ();
			$page = $this->params ()->fromRoute ( 'page', 0 ) ? ( int ) $this->params ()->fromRoute ( 'page', 0 ) : 1;
			$session_user = new Container ( 'user' );
			$user = $session_user->username;
			$paginator = $this->getMainTable ()->fetchuser ( $user, true );
			// set the current page to what has been passed in query string, or to 1 if none set
			$paginator->setCurrentPageNumber ( ( int ) $page );
			// set the number of items per page to 10
			$paginator->setItemCountPerPage ( 10 );
			
			return new ViewModel ( array (
					'paginator' => $paginator 
			)
			 );
		} else
			$this->layout ( 'error/admin' );
	}
	
	// edit video
	public function editadAction() {
		$seriecode = $this->params ()->fromRoute ( 'id', 0 );
		$data = $this->getMainTable ()->getrowcontent ( $seriecode );
		
		if ($data == false)
			$this->redirect ()->toRoute ( 'main', array (
					'action' => 'index' 
			) );
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$this->layout ()->getuser = $getuser;
		if ($getuser && ($getuser->group == 'adsmanager' || $getuser->group == 'supperadmin')) {
			
			$this->layout ( 'layout/bags' );
			
			$this->layout ()->data = $data;
			$pre = $this->getAdsTable ()->fetchAll ();
			$arrpre = $this->getads ( $pre );
			$mid = $this->getmidTable ()->fetchAll ();
			$arrmid = $this->getads ( $mid );
			
			$bot = $this->getbotTable ()->fetchAll ();
			$arrbot = $this->getads ( $bot );
			
			$banner = $this->getbannerTable ()->fetchAll ();
			$arrbanner = $this->getads ( $banner );
			
			$form = new adsForm ();
			$form->setId ( $arrpre, $arrmid, $arrbot, $arrbanner );
			
			if ($data->ads_pre) {
				$rowpre = $this->getAdsTable ()->getads ( $data->ads_pre );
				$this->layout ()->rowpre = $rowpre;
			}
			if ($data->ads_mid) {
				$rowmid = $this->getmidTable ()->getads ( $data->ads_mid );
				$this->layout ()->rowmid = $rowmid;
			}
			if ($data->ads_bot) {
				$rowbot = $this->getbotTable ()->getads ( $data->ads_bot );
				$this->layout ()->rowbot = $rowbot;
			}
			
			if ($data->banner) {
				$rowbanner = $this->getbannerTable ()->getads ( $data->banner );
				$this->layout ()->rowbanner = $rowbanner;
			}
			
			$prg = $this->fileprg ( $form );
			if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
				return $prg; // Return PRG redirect response
			} elseif (is_array ( $prg )) {
				if ($form->isValid ()) {
					$dataform = $form->getData ();
					
					// echo "<pre>";
					// print_r($dataform);
					// echo "</pre>";
					// die;
					
					$update = $this->getMainTable ()->updateads ( $data->id, $dataform );
				} else {
					// Form not valid, but file uploads might be valid...
					// Get the temporary file information to show the user in the view
					$fileErrors = $form->get ( 'seriecode' )->getMessages ();
					if (empty ( $fileErrors )) {
						$tempFile = $form->get ( 'seriecode' )->getValue ();
					}
				}
			}
			
			return array (
					'form' => $form 
			)
			;
		} else {
			$this->layout ( 'error/admin' );
		}
	}
	public function addurlAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		
		if ($request->isPost ()) {
			
			$data = $request->getPost ();
			$str = $data->urlplaylist;
			// var_dump($data);
			$i = strpos ( $str, WEBPATH . '/main/play/' );
			if ($i === false) {
				$viewModel->check = 1;
				return $viewModel;
			}
			// $i=strrpos($str,'/');
			// echo $i;
			$str = substr ( $str, 26 );
			// echo $str;
			$vid = $this->getMainTable ()->getrowcontent ( $str );
			$viewModel->upload = $vid;
			return $viewModel;
		}
	}
	public function editAction() {
		$this->layout ( 'layout/bags' );
		$catalog = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
				'action' => 'getdata' 
		) );
		$this->layout ()->catalog = $catalog;
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		$this->layout ()->getuser = $getuser;
		$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
				'action' => 'getuser' 
		) );
		if ($getuser) {
			$this->layout ()->usergroup = $getuser->group;
			$seriecode = $this->params ()->fromRoute ( 'id', 0 );
			$data = $this->getMainTable ()->getrowcontent ( $seriecode );
			
			if ($data == false)
				$this->redirect ()->toRoute ( 'main', array (
						'action' => 'index' 
				) );
			$this->layout ()->data = $data;
			$id = $data->id;
			if ($getuser->username == $data->user_name || $getuser->group == 'supperadmin' || $getuser->group == 'admin') {
				$arr = $this->forward ()->dispatch ( 'Catalog\Controller\Index', array (
						'action' => 'getdata' 
				) );
				$form = new editForm ();
				$form->addElements ( $arr );
				$form->bind ( $data );
				$request = $this->getRequest ();
				// /var_dump($request);
				if ($request->isPost ()) {
					$kk = $request->getPost ();
					$this->getMainTable ()->editvideo ( $id, $kk );
					
					if ($form->isValid ()) {
					}
				}
				
				return array (
						
						'form' => $form 
				);
			} else
				$this->layout ( 'error/admin' );
		} else
			$this->layout ( 'error/admin' );
	}
	public function deleteAction() {
		$viewModel = new ViewModel ();
		$viewModel->setTerminal ( true );
		$request = $this->getRequest ();
		// $session_user = new Container('user');
		// $user=$session_user->username;
		if ($request->isPost ()) {
			$k = $request->getPost ();
			if ($k->video) {
				$id = $k->video;
				$checklogin = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
						'action' => 'session' 
				) );
				$getuser = $this->forward ()->dispatch ( 'Admin\Controller\Index', array (
						'action' => 'getuser' 
				) );
				$this->layout ()->getuser = $getuser;
				
				$data = $this->getMainTable ()->getrowcontent ( $id );
				// var_dump($data);
				// echo $data->username;
				
				if ($checklogin) {
					if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin' || ($getuser->username == $data->user_name))) {
						if (! $id)
							return $this->redirect ()->toUrl ( 'aaa' );
						$l = $this->getMainTable ()->deleteVideo ( $id );
						$viewModel->check = $l;
						return $viewModel;
					} else {
						$viewModel->check = 2;
						return $viewModel;
					}
				}
			}
		}
	}
	public function success($seriecode) {
	}
	public function errorAction() {
		die ( "hoang ophuc" );
		$this->layout ( 'layout/bags' );
	}
	public function successAction() {
		$this->layout ( 'layout/bags' );
	}
	public function slideAction() {
		$vid = $this->params ()->fromRoute ( 'id', 0 );
		$k = $this->getslideTable ()->saveVideo ( $vid );
		if ($k) {
			$this->redirect ()->toRoute ( 'main' );
		}
	}
	
	// area Ads
	public function getads($arr) {
		$data = array ();
		$k = 0;
		$v = 'None';
		$data [$k] = $v;
		foreach ( $arr as $ads ) :
			$k = $ads->id;
			$v = $ads->title;
			$data [$k] = $v;
		endforeach
		;
		return $data;
	}
	public function checkads($id, $ads) {
		// $id=2;
		if ($ads == 'pre') {
			$row = $this->getAdsTable ()->getads ( $id );
		}
		if ($ads == "mid") {
			$row = $this->getmidTable ()->getads ( $id );
		}
		if ($ads == "bot") {
			$row = $this->getbotTable ()->getads ( $id );
		}
		if ($ads == "banner") {
			
			$row = $this->getBannerTable ()->getads ( $id );
		}
		return $row;
	}
	public function getMainTable() {
		if (! $this->MainTable) {
			$sm = $this->getServiceLocator ();
			$this->MainTable = $sm->get ( 'Main\Model\MainTable' );
		}
		return $this->MainTable;
	}
	public function getslideTable() {
		if (! $this->slideTable) {
			$sm = $this->getServiceLocator ();
			$this->slideTable = $sm->get ( 'Main\Model\slideTable' );
		}
		return $this->slideTable;
	}
	// pre ads database
	public function getAdsTable() {
		if (! $this->AdsTable) {
			$sm = $this->getServiceLocator ();
			$this->AdsTable = $sm->get ( 'Main\Model\AdsTable' );
		}
		return $this->AdsTable;
	}
	// mid ads database
	public function getmidTable() {
		if (! $this->midTable) {
			$sm = $this->getServiceLocator ();
			$this->midTable = $sm->get ( 'Main\Model\midTable' );
		}
		return $this->midTable;
	}
	// bot ads database
	public function getbotTable() {
		if (! $this->botTable) {
			$sm = $this->getServiceLocator ();
			$this->botTable = $sm->get ( 'Main\Model\botTable' );
		}
		return $this->botTable;
	}
	public function getAdminTable() {
		if (! $this->AdminTable) {
			$sm = $this->getServiceLocator ();
			$this->AdminTable = $sm->get ( 'Main\Model\AdminTable' );
		}
		return $this->AdminTable;
	}
	public function getChannelTable() {
		if (! $this->ChannelTable) {
			$sm = $this->getServiceLocator ();
			$this->ChannelTable = $sm->get ( 'Main\Model\ChannelTable' );
		}
		return $this->ChannelTable;
	}
	public function getPlaylistTable() {
		if (! $this->PlaylistTable) {
			$sm = $this->getServiceLocator ();
			$this->PlaylistTable = $sm->get ( 'Main\Model\PlaylistTable' );
		}
		return $this->PlaylistTable;
	}
	public function getLocalTable() {
		if (! $this->LocalTable) {
			$sm = $this->getServiceLocator ();
			$this->LocalTable = $sm->get ( 'Main\Model\LocalTable' );
		}
		return $this->LocalTable;
	}
	public function getExTable()
     {
         if (!$this->ExTable) {
             $sm = $this->getServiceLocator();
             $this->ExTable = $sm->get('Main\Model\ExTable');
         }
         return $this->ExTable;
     }
	 
	public function getFolderTable()
     {
         if (!$this->FolderTable) {
             $sm = $this->getServiceLocator();
             $this->FolderTable = $sm->get('Main\Model\FolderTable');
         }
         return $this->FolderTable;
     }
     
     public function getbannerTable()
     {
     	if (!$this->BannerTable) {
     		$sm = $this->getServiceLocator();
     		$this->BannerTable = $sm->get('Main\Model\BannerTable');
     	}
     	return $this->BannerTable;
     }
     public function getCatalogTable() {
        if (!$this->CatalogTable) {
            $sm = $this->getServiceLocator();
            $this->CatalogTable = $sm->get('Catalog\Model\CatalogTable');
        }
        return $this->CatalogTable;
    }
    
    
    public function getSlideShowTable() {
    	if (!$this->slideshowTable) {
    		$sm = $this->getServiceLocator();
    		$this->slideshowTable = $sm->get('Slideshow\Model\SlideTable');
    	}
    	return $this->slideshowTable;
    }
    protected $slideshowTable;
    
    public function getSliderTable() {
    	if (!$this->SliderTable) {
    		$sm = $this->getServiceLocator();
    		$this->SliderTable = $sm->get('Slider\Model\SliderTable');
    	}
    	return $this->SliderTable;
    }
    
    protected $SliderTable;
    
    
    protected $CatalogTable;
    
    
     protected $BannerTable;
     
	protected $FolderTable;
	protected $ExTable;
	protected $LocalTable;

	protected $PlaylistTable;

	 protected $MainTable;
     protected $seriecode;
     protected $AdsTable;
     protected $midTable;
     protected $botTable;
     protected $AdminTable;
     protected $slideTable;
	 protected $ChannelTable;
}


?>