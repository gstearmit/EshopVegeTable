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
 
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;

// Form
use MoneyPointSettings\Form\UploadDocumentsBusinessesForm;
use MoneyPointSettings\Model\LoginMessages;
use MoneyPointSettings\Model\LoginValidation;
use Zend\Validator\File\Size;
use Zend\Validator\File\Extension;
use MoneyPointCountry\Model\CashMoneyTransferCountry;
use MoneyPointCountry\Model\CashMoneyTransferCountryTable;
use MoneyPointCountry\Model\CodeCountry;
use MoneyPointCountry\Model\CodeCountryTable;
use MoneyPointCountry\Model\DocumentId;
use MoneyPointCountry\Model\DocumentIdTable;
use MoneyPointSettings\Model\TblDocs;
use MoneyPointSettings\Model\TblDocsTable;
use MoneyPointCountry\Model\DocumentTmp;
use MoneyPointCountry\Model\DocumentTmpTable;

// Open Account
use MoneyPointUsers\Model\OpenAcount;
use Zend\Crypt\PublicKey\Rsa\PublicKey;

// Utinity
use MoneyPointCountry\Model\Utility;

// ADDRESS
use MoneyPointSettings\Model\LoginValidationAddress;
use MoneyPointSettings\Form\UploadDocumentsTypeAddressForm;

//$data_DocumentAddressTmp
use MoneyPointCountry\Model\DocumentAddressTmp;
use MoneyPointCountry\Model\DocumentAddressTmpTable;

//REST UPLOAD FORM
use MoneyPointSettings\Form\UploadIDRestForm;
use MoneyPointSettings\Model\LoginValidationIDRest;

class UploadFileStepOneController extends AbstractRestfulController {
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
		$data_resphone = NULL;
		
		if(empty($data))
		{
			return new JsonModel ( array (
					'Error'=>'Data is null, please ,Fill the required field',
					'data' => NULL,
			) );
		}
		
	
		$status = ''; $ren_name_file = ''; $code = ''; $txt_view_img_path ='';$_name_file='';
		$fileContent = ( string ) $data ['fileContent'];
		$Content_Type  = ''; 
		
		/*
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
		*/
		
		
		
		$UploadForm_status = '';
		$Error_Upload_form = '';
		$Success_Upload_form = '';
		$config = $this->getServiceLocator ()->get ( 'Config' );
// 		$session = new Container ( 'User' );
// 		// checklogin
// 		if (! $session->offsetExists ( 'userId' )) {
// 			return $this->redirect ()->toRoute ( 'user-money-point-sign-in' );
// 		}
		
//		$user_id = $session->offsetGet ( 'userId' );
		 
		// Set PersonAccount
		$session_PersonAccount = new Container ( 'PersonAccount' );
		$PersonAccountID = $session_PersonAccount->offsetGet ( 'PersonAccountID' );
		$PersonRUID = $session_PersonAccount->offsetGet ( 'PersonRUID' );
		$PersonAccount_ARRAY = $session_PersonAccount->offsetGet ( 'PersonAccount_ARRAY' );
		 
		
		// ervicer
		$TblDocsTable = $this->getServiceLocator ()->get ( 'TblDocsTable' );
		$DocumentIdTable = $this->getServiceLocator ()->get ( 'DocumentIdTable' );
		$DocumentTmpTable = $this->getServiceLocator ()->get ( 'DocumentTmpTable' );
		$DocumentTypeAddressTable = $this->getServiceLocator ()->get ( 'DocumentTypeAddressTable' );
		$CodeCountryTable = $this->getServiceLocator ()->get ( 'CodeCountryTable' );
		
		// Get Option
		$data_Country_Name = $CodeCountryTable->getSetOption ();
		 
		// Start Form DocumentType PASSPORT
		$UploadDocumentsForm = new UploadIDRestForm( 'UploadDocumentsBusinesses', $data_Country_Name );
		
		$request = $this->getRequest ();
		$message = array ();
		
		$_status = false;
		$ErrorCode = '';
		$ErrorMessage = '';
		
		try {
		
			if ($request->isPost ()) {
		
				$clientInfo = "";
				$loginValidation = new LoginValidationIDRest( 'LoginValidationUploadDocumentsBusinesses' );
				$UploadDocumentsForm->setInputFilter ( $loginValidation->getInputFilter () );
		
				// Make certain to merge the files info!
				$post = array_merge_recursive ( $request->getPost ()->toArray (), $request->getFiles ()->toArray () );
		
				// $UploadDocumentsForm->setData($request->getPost());
				$UploadDocumentsForm->setData ( $post );
		
				if ($UploadDocumentsForm->isValid ()) {
						
					$data = $UploadDocumentsForm->getData ();
						
					// Get file uploads
					#Start Process File
					 
					#End Process File
						
					if (! empty ( $data ['submit'] ) and $data ['submit'] == 'Upload ID 1') {
						// echo "</br> view Upload ID 1 </br>";
						if ($data ['checkbox_languages'] [0] == 0 || $data ['checkbox_languages'] [0] == 2) {
							// VIETNAM or Other languages
							// save lai System MoneyPoint
							// not Send MoneyPolo Verify doc
							// chuyen qua bo phan dich
							$Success_Upload_form .= "</br>VIETNAM or Other languages </br>";
							// English
							// save lai System MoneyPoint
							$data_tblDocs = array (
									'from_ip' => $_SERVER ['REMOTE_ADDR'], // this->get_client_ip(),
									'StepOne_or_StepTwo'=>1 ,            // PASSPORT
									'Document_type' => $data ['Document_type'],
									'name_file' => $ren_name_file,
									'id_customer' => $user_id,
									'status_translate' => 0,
									'id_suport' => 0,
									// 'id_doc_tran' => ,
									'date_creat' => date ( 'Y-m-d H:i:s' )
							);
							$tbl_docs = new TblDocs ();
							$tbl_docs->exchangeArray ( $data_tblDocs );
							$status_tbldocs = $TblDocsTable->save ( $tbl_docs );
								
							if ($status_tbldocs != 0) {
								$Success_Upload_form .= "</br> Success  tblDocs </br>";
								// Send MoneyPolo Verify doc
								// Save DocumentTmp
								$data_DocumentTmp = array (
										'Number' => $data ['Number'],
										'Issue_date' => $data ['Issue_date'],
										'Expiry_date' => $data ['Expiry_date'],
										'Issued_by' => $data ['Issued_by'],
										'Country_of_Issue' => $data ['Country_of_Issue'],
										'Number_In_Orig_Lang' => $data ['Number_In_Orig_Lang'],
										'Date_Of_Birth' => $data ['Date_Of_Birth'],
										'id_customer' => $user_id,
										'date_creat' => date ( 'Y-m-d H:i:s' ),
										'Form_ip' => $_SERVER ['REMOTE_ADDR']
								);
								$_DocumentTmp = new DocumentTmp ();
								$_DocumentTmp->exchangeArray ( $data_DocumentTmp );
								$Status_DocumentTmp_id = $DocumentTmpTable->save ( $_DocumentTmp );
								if ($Status_DocumentTmp_id != 0) {
									$Success_Upload_form .= "</br> Success  Document Tmp </br>";
								} else {
									$Error_Upload_form .= "</br> .Not save Document Tmp.</br>";
								}
		
								// save Table Upload
								$document_id = new DocumentId ();
								$id_tbl_docs = $status_tbldocs;
								$data_DocumentId = array (
										'id_customer' => $user_id,
										'id_tbl_docs' => $id_tbl_docs,
										'DOCUMENTID' => '',
										'date_upload' => date ( 'Y-m-d H:i:s' )
								);
								$document_id->exchangeArray ( $data_DocumentId );
								$status_document_id = $DocumentIdTable->save ( $document_id );
		
								if ($status_document_id != 0) {
									$Success_Upload_form .= "</br> Success  documentid </br>";
									$UploadForm_status = 1;
								} else {
									$UploadForm_status = 10;
									$Error_Upload_form .= "</br> .Not save status_document_id.</br>";
								}
							} else {
								$UploadForm_status = 10;
								$Error_Upload_form .= "</br> Not save infor upload Users. </br>";
							}
						} 						// end if($data['checkbox_languages'][0] == 0 || $data['checkbox_languages'][0] == 2 )
		
						// Start English Languages
						else if ($data ['checkbox_languages'] [0] == 1) {
							$Success_Upload_form .= "</br> English Languages  </br>";
							// English
							// save lai System MoneyPoint
							$data_tblDocs = array (
									'from_ip' => $_SERVER ['REMOTE_ADDR'], // this->get_client_ip(),
									'Document_type' => $data ['Document_type'],
									'name_file' => $ren_name_file,
									'id_customer' => $user_id,
									'status_translate' => 1,
									'id_suport' => 0,
									// 'id_doc_tran' => ,
									'date_creat' => date ( 'Y-m-d H:i:s' )
							);
							$tbl_docs = new TblDocs ();
							$tbl_docs->exchangeArray ( $data_tblDocs );
							$status_tbldocs = $TblDocsTable->save ( $tbl_docs );
								
							if ($status_tbldocs != 0) {
								$Success_Upload_form .= "</br> Success  tblDocs </br>";
		
								// Send MoneyPolo Verify doc
								$timezone = 'Asia/Ho_Chi_Minh';
								date_default_timezone_set($timezone);
		
								$wsRequest = new OpenAcount ();
								// filePath = $filePath;
								$fileContent = base64_encode ( fread ( fopen ( $filePath, "rb" ), filesize ( $filePath ) ) );
								$fileType = substr ( $filePath, strrpos ( $filePath, '.' ) + 1 );
		
								// Set File Document
								if ($data ['Document_type'] == 1)
									$Document_type = 'NATIONALID';
								if ($data ['Document_type'] == 2)
									$Document_type = 'PASSPORT';
								if ($data ['Document_type'] == 3)
									$Document_type = 'DRIVINGLICENCE';
								if ($data ['Document_type'] == 4)
									$Document_type = 'SOCIAL'; // 'Social Security Number';
								if ($data ['Document_type'] == 5)
									$Document_type = 'ALIEN'; // 'Alien registration number';
								if ($data ['Document_type'] == 6)
									$Document_type = 'OTHER'; // 'Personal Photo with ID';
								if ($data ['Document_type'] == 7)
									$Document_type = 'OTHER'; // 'Certified translation';
		
								$fieldValues = 'Number=' . $data ['Number'] . ';IssueDate=' . $data ['Issue_date'] . ';ExpiryDate=' . $data ['Expiry_date'] . ';IssuedBy=' . $data ['Issued_by'] . ';CountryOfIssue=' . $data ['Country_of_Issue'] . ';NumberInOriginalLanguage=' . $data ['Number_In_Orig_Lang'] . ';DateOfBirth=' . $data ['Date_Of_Birth'] . ';';
		
								$request_data = array ();
								$request_data ['AccountPersonData'] ['PersonAccountID'] = $PersonAccountID;
								$request_data ['AccountPersonData'] ['PersonRUID'] = $PersonRUID;
								$request_data ['FileContent'] = $fileContent;
								$request_data ['FileType'] = $fileType;
								$request_data ['DocumentType'] = $Document_type;
								$request_data ['FieldValues'] = $fieldValues;
		
								if ($wsRequest->Prepare_Data ( $request_data )) {
									$result = $wsRequest->Send ( 'SaveClientDocument' );
										
									$SaveClientDocumentResult = $result->SaveClientDocumentResult;
									if ($result->SaveClientDocumentResult->Response->ErrorCode != 0) {
										die ( 'Error get Send Document verify' );
									}
										
									$DocumentID = $SaveClientDocumentResult->DocumentID;
									$FileSize = $SaveClientDocumentResult->FileSize;
										
									// save Table Upload
									$document_id = new DocumentId ();
									$id_tbl_docs = $status_tbldocs;
									$data_DocumentId = array (
											'id_customer' => $user_id,
											'id_tbl_docs' => $id_tbl_docs,
											'DOCUMENTID' => $DocumentID,
											'date_upload' => date ( 'Y-m-d H:i:s' )
									);
									$document_id->exchangeArray ( $data_DocumentId );
									$status_document_id = $DocumentIdTable->save ( $document_id );
										
									if ($status_document_id != 0) {
										$Success_Upload_form .= "</br> Success  documentid </br>";
										$UploadForm_status = 1;
		
										// Update ShowClientVerificationInfo
										$this->UpdateShowClientVerificationInfo ();
									} else {
										$UploadForm_status = 10;
										$Error_Upload_form .= "</br> .Not save status_document_id.</br>";
									}
								} // if($wsRequest->Prepare_Data($request_data))
							} else {
								$UploadForm_status = 10;
								$Error_Upload_form .= "</br> Not save infor upload Users. </br>";
							}
						} 						// if($data['checkbox_languages'][0] == 1 )
						else {
							$UploadForm_status = 10;
							$Error_Upload_form = '</br> internal error! </br>';
						}
					} // end 'Upload ID 1'
				} else {
					$errorList = $UploadDocumentsForm->getMessages ();
					$message ['error'] = '';
					if (isset ( $errorList ['loginCsrf'] ['notSame'] )) {
						$message ['error'] = LoginMessages::CSRF_ERROR;
					}
					 
					if (empty ( $message ['error'] )) {
						$message ['error'] = "Please, fill out the field.";
					}
					
					$data_resphone = array(
							'status'=>'Error List',
							'ErrorMessage'=>$errorList,
					);
						 
					 
				}
			}
		} catch ( \Exception $excp ) {
			print "<pre>";
			print_r ( $excp->getMessage () );
			die ();
			$excp->getMessage ();
		}
		
		// End Form PASSPORT
		
		return new JsonModel ( array (
				'Status'=>$status,
				'data_error'=>$data_resphone, 
				'data_form'=>array(
						// ID DOCUMENT
						'UploadDocumentsForm' => $UploadDocumentsForm,
						'UploadForm_status_Upload_ID' => $UploadForm_status,
						'Error_Upload_form' => $Error_Upload_form,
						'Success_Upload_form' => $Success_Upload_form,
		        ),
				'data_file'=>array( 
					'name_file'=>$_name_file,
					'file'=>$ren_name_file,
					'code' =>$txt_view_img_path, 
			   )			
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