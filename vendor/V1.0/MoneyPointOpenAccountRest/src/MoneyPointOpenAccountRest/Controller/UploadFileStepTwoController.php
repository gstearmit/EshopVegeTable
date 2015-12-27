<?php

namespace MoneyPointOpenAccountRest\Controller;

//Zend
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\View\Renderer\PhpRenderer;
use \Zend\View\Resolver\TemplateMapResolver;
use Zend\Form\Annotation\Object;
use Zend\View\Model\JsonModel;

// Users


// MoneyPoloAccount
use MoneyPointUsers\Model\MoneyPoloAccounts;
use MoneyPointUsers\Model\MoneyPoloAccountsTable;

//SOAP + MoneyPointUsers
use MoneyPointUsers\Model\OpenAcount;

// Utinity
use MoneyPointCountry\Model\Utility;

 

class UploadFileStepTwoController extends AbstractRestfulController {
	protected $Upload;
	public function getList() 
	{
		$Status = 'Error';
		return new JsonModel ( array (
				'status' => $Status,
				'data' => $data = NULL . ' Not Support right now' 
		) );
	}
	public function get($id) { 
		 
		$User = 1;
		$Status = '';
		if ($User) {
			$Status = 'Success';
		} else {
			$Status = 'Error';
		}
		return new JsonModel ( array (
				'status' => $Status,
				'data' => $User 
		) );
		
	}
	public function create($data) { 
		  
		if(empty($data))
		{
			return new JsonModel ( array (
					'Error'=>'Data is null, please ,Fill the required field',
					'data' => NULL,
			) );
		}
		
		$status = ''; $ren_name_file = ''; $code = ''; $txt_view_img_path ='';
		$fileContent = ( string ) $data ['fileContent'];
		$Content_Type  = ''; 
		
		$idsave = '';
		if (!$fileContent) {
			// Update data
			return new JsonModel ( array (
					'data' => 'Null',
					'Error'=> 'Error fileContent base64_encode()' 
			) );
		} else {
			if($data ['fileType']){
			$_name_file = 'mpoint'.time ();
			$ren_name_file = $_name_file.'.'.$data ['fileType'];
				
			if($data ['fileType']=='jpeg' || $data ['fileType']=='jpg' || $data ['fileType']=='JPG'  || $data ['fileType']=='JPEG' )                             $Content_Type = 'image/jpg';
			if($data ['fileType']=='gif' || $data ['fileType']=='GIF' )        $Content_Type = 'image/gif';
			if($data ['fileType']=='png' || $data ['fileType']=='PNG')         $Content_Type = 'image/png';
			//if($data ['fileType']=='ico' || $data ['fileType']=='ICO' )     $Content_Type = 'image/x-icon';
				
			//Tao File Anh
			$base = $fileContent;
			$binary= @base64_decode($base);
			header('Content-Type: '.$Content_Type.'; charset=utf-8');
			
			//$file = @fopen(DIR_VIEW_UPLOAD_DOCUMENT . '/' .$filename, 'wb');
			$file = @fopen(DIR_VIEW_UPLOAD_DOCUMENT . '/' .$ren_name_file, 'wb');
			@fwrite($file, $binary);
			@fclose($file);
			//copy noi dung file Anh Ra thu muc view
			$options = array (
					'max_width' => 300,
					'max_height' => 300,
					'jpeg_quality' => 100,
					'png_quality' => 100,
					'bmp_quality' => 100
			);
			
			$filePathName = DIR_VIEW_UPLOAD_DOCUMENT . '/' . $ren_name_file;
			$destinationPath = UPLOAD_PATH_IMG_VERIFY;
			$Utility = new Utility();
			$Utility->createImageThumbnail ( $filePathName, $destinationPath, $options );
			
			// truyen ra view
			$ext = substr ( strrchr ( $ren_name_file, '.' ), 1 );
			if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'bmp') { 
				$txt_view_img = '<img src="' . WEBPATH . '/upload/verifile/' . $ren_name_file . '" alt="">';
				$txt_view_img_path = '/upload/verifile/' . $ren_name_file;
			} elseif ($ext == 'pdf') {
				$txt_view_img = '<iframe src="http://docs.google.com/gview?url=' . WEBPATH . '/upload/verifile/' . $ren_name_file . '&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>';
				$txt_view_img_path = $txt_view_img;
			}
			 
			$data_resphone ="Sucess, Upload File Document";
			$code = $txt_view_img;
			$status = 'Sucess!';
			
			}# FIle TYPE
			else {
				$status = 'Error , is Null fileType';
				$data_resphone = 'Null';
				$_name_file  = 'Null';
				$ren_name_file = 'Null';
				$txt_view_img_path = 'Null';
			}
		}
		
		return new JsonModel ( array (
				'Status'=>$status,
				'data' => $data_resphone, 
				'name_file'=>$_name_file,
				'file'=>$ren_name_file,
				'code' =>$txt_view_img_path,
		) );
	}
	public function update($id, $data) {
		// $response = $this->getResponseWithHeader()
		// ->setContent( __METHOD__.' UPDATE POST DATA');
		// return $response;
		
		return new JsonModel ( array (
				'data' => 'Update data Post- not support'
		) );
		
		$data ['id'] = $id; 
		$userTable = $this->getServiceLocator ()->get ( 'Users\Model\UsersTable' );
		$idsave = $userTable->saveUsers ( $data );
		// }
		
		if ($idsave === 1) {
			$status = 'Success!';
		} else {
			$status = 'Error!';
		}
		
		$data_resphone = array (
				'status' => $status,
				'satus_update' => $idsave,
				'id' => $id 
		);
		
		return new JsonModel ( array (
				'data' => $data_resphone 
		) );
	}
	public function delete($id) {
		$userTable = $this->getServiceLocator ()->get ( 'Users\Model\UsersTable' );
		$status_delete = $userTable->delete ( $id );
		return new JsonModel ( array (
				'data' => 'deleted',
				'Code_satus' => $status_delete 
		) );
	}
	protected $UsersTable;
	public function getUsersTable() {
		if (! $this->UsersTable) {
			$pst = $this->getServiceLocator ();
			$this->UsersTable = $pst->get ( 'Users\Model\UsersTable' );
		}
		return $this->UsersTable;
	}
}