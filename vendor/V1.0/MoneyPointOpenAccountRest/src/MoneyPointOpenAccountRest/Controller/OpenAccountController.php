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
 

class OpenAccountController extends AbstractRestfulController {
	protected $users;
	public function getList() {
		$Status = 'Error';
		return new JsonModel ( array (
				'status' => $Status,
				'data' => $data = NULL . ' Not Supprot' 
		) );
	}
	public function get($id) { 
		$id = (int)$id;
		$Status = '';
		if ($id) {
			$Status = 'Success';
		} else {
			$Status = 'Error';
		}
		return new JsonModel ( array (
				'status' => $Status,
				'data' => $id 
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
		
		
		$id = ( int ) $data ['id'];
		
		$idsave = '';
		if ($id != 0) {
			// Update data
			return new JsonModel ( array (
					'data' => 'Update data Post- not support' 
			) );
		} else if ($id == 0) {
			$data_resphone =" data not";
		}
		
		return new JsonModel ( array (
				'data' => $data_resphone 
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