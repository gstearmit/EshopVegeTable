<?php

namespace Payoutrates\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class OdersTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	public function UpdateNameCampaigns($creatnamecampaign,$oder_id)
	{
		$data = array (	
			'creatnamecampaign'=>$creatnamecampaign,
		);
		$id = ( int ) $oder_id;
		
		if ($id == 0) {
			return 0;
		} else {
				
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id
				) );
			} else {
				return 0;
				//throw new \Exception ( 'ID does not exist' );
			}
		}
	}
	
	public function Update_OderStatusBy_Id_oder($oder_id)
	{
		$data = array (
				'status_oder'=>1,
		);
		$id = ( int ) $oder_id;
		
		if ($id == 0) {
			return 0;
		} else {
		
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id
				) );
			} else {
				return 0;
				//throw new \Exception ( 'ID does not exist' );
			}
		}
	}
	
	public function save(Oders $news) {
		$data = array (
				'date_creat' => date ( 'Y-m-d H:i:s' ),
				'date_mod' => date ( 'Y-m-d H:i:s' ),
				'id_user' => $news->id_user,
				'type' => $news->type,
				'status' => $news->status ,
				'TotaVistor' => $news->TotaVistor,
				'DolarTotal' => $news->DolarTotal,
				'creatnamecampaign'=>$news->creatnamecampaign,
				'status_oder'=>$news->status_oder,
				'Cpmrate'=>$news->Cpmrate,
		);
		$id = ( int ) $news->id;
		
		if ($id == 0) {
			 $this->tableGateway->insert ( $data );
			return $this->tableGateway->lastInsertValue;
		} else {
			
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id 
				) );
			} else {
				return 0;
				//throw new \Exception ( 'ID does not exist' );
			}
		}
	}
	public function delete($id) {
		// $news = $this->getById($id);
		$result = $this->tableGateway->delete ( array (
				'id' => $id 
		) );
		return $result;
	}
	public function getById($id) {
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'id' => $id 
		) );
		$row = $rowset->current ();
		if (! $row) {
			throw new \Exception ( "Could not find row $id" );
		}
		return $row;
	}
	
	
	public function getAllOder($id_user)
	 {
	
		$select=new Select('oders');
	
		$select
		    ->columns(array(
				    'id'=>'id',	'creatnamecampaign'=>'creatnamecampaign',
				     'date_creat'=>'date_creat','date_mod'=>'date_mod',
				     'id_user'=>'id_user','status'=>'status',
				     'status_oder'=>'status_oder',
				     'type'=>'type','DolarTotal'=>'DolarTotal',
				     'TotaVistor'=>'TotaVistor',
		    		 'Cpmrate'=>'Cpmrate',
		     ))
		   ->join('odersdetails','odersdetails.oder_id = oders.id',
		   		              array(
		   		              		'id_detail'=>'id',	'description'=>'description',
		   		              		'status_details'=>'status','quantity'=>'quantity',
		   		              		'cpmRate'=>'cpmRate','amount'=>'amount',
		   		              		'type_details'=>'type',
		   		              		'AdobeFlashEnabled'=>'AdobeFlashEnabled','MaxDailyBudget'=>'MaxDailyBudget',
		   		              		'MobileTargeting'=>'MobileTargeting','trafficsources'=>'trafficsources',
		   		              		'PreviousWebsite'=>'PreviousWebsite','payment_select'=>'payment_select',
		                        ),'left')
		->join('ads','ads.oder_id = oders.id',array('id_code'=>'id','delay'=>'delay','time_display'=>'time_display','namecampaigns'=>'name','js_id'=>'js_id','status_code'=>'status'),'left')
		->join('process','process.oder_id = oders.id',array('date_reg'=>'date_reg','date_active'=>'date_active','checked'=>'checked','id_proc'=>'id','ads_id'=>'ads_id','advertiser_id'=>'advertiser_id','publisher_id'=>'publisher_id','type_id'=>'type_id','status_process'=>'status','website'=>'website'),'left')
		
		->where(array('oders.id_user'=>$id_user,new \Zend\Db\Sql\Predicate\IsNotNull("creatnamecampaign")));
	
		$rowset = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
	
		$results = $rowset->execute();
		$array = array();
		foreach ($results as $result)
		{
			$tmp = array();
			$tmp= $result;
			
			$array[str_replace(" ","",$result['creatnamecampaign'])]['creatnamecampaign']=$result['creatnamecampaign'];
			$array[str_replace(" ","",$result['creatnamecampaign'])]['DolarTotal']=$result['DolarTotal'];
			$array[str_replace(" ","",$result['creatnamecampaign'])]['TotaVistor']=$result['TotaVistor'];
			$array[str_replace(" ","",$result['creatnamecampaign'])]['status']=$result['status'];
			$array[str_replace(" ","",$result['creatnamecampaign'])]['status_oder']=$result['status_oder'];
			$array[str_replace(" ","",$result['creatnamecampaign'])]['status_code']=$result['status_code'];
			$array[str_replace(" ","",$result['creatnamecampaign'])]['status_details']=$result['status_details'];
			$array[str_replace(" ","",$result['creatnamecampaign'])]['Cpmrate']=$result['Cpmrate'];
			$array[str_replace(" ","",$result['creatnamecampaign'])]['id']=$result['id'];
			$array[str_replace(" ","",$result['creatnamecampaign'])]['id_code']=$result['id_code'];
			
			$array[str_replace(" ","",$result['creatnamecampaign'])]['data'][] = $tmp;
		}
		return $array;
	}
	
	
	public function fetchAll() {
		$resultSet = $this->tableGateway->select ();
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
	}
	public function countAll($id_user) {

		$select=new Select('oders');
		
		$select ->columns(array(
				'id'=>'id',	'creatnamecampaign'=>'creatnamecampaign',
				'date_creat'=>'date_creat','date_mod'=>'date_mod',
				'id_user'=>'id_user','status'=>'status',
				'status_oder'=>'status_oder',
				'type'=>'type','DolarTotal'=>'DolarTotal',
				'TotaVistor'=>'TotaVistor',
				'Cpmrate'=>'Cpmrate',
		))
// 		->join('odersdetails','odersdetails.oder_id = oders.id',
// 				array(
// 						'id_detail'=>'id',	'description'=>'description',
// 						'status_details'=>'status','quantity'=>'quantity',
// 						'cpmRate'=>'cpmRate','amount'=>'amount',
// 						'type_details'=>'type',
// 						'AdobeFlashEnabled'=>'AdobeFlashEnabled','MaxDailyBudget'=>'MaxDailyBudget',
// 						'MobileTargeting'=>'MobileTargeting','trafficsources'=>'trafficsources',
// 						'PreviousWebsite'=>'PreviousWebsite','payment_select'=>'payment_select',
// 				),'left')
				->join('ads','ads.oder_id = oders.id',array('id_code'=>'id','delay'=>'delay','time_display'=>'time_display','namecampaigns'=>'name','js_id'=>'js_id','status_code'=>'status'),'left')
				->join('process','process.oder_id = oders.id',array('date_reg'=>'date_reg','date_active'=>'date_active','checked'=>'checked','id_proc'=>'id','ads_id'=>'ads_id','advertiser_id'=>'advertiser_id','publisher_id'=>'publisher_id','type_id'=>'type_id','status_process'=>'status','website'=>'website'),'left')
		
				->where(array('oders.id_user'=>$id_user,new \Zend\Db\Sql\Predicate\IsNotNull("creatnamecampaign")));
		
		$rowset = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
		
		$results = $rowset->execute();
		return $results;
		
	}
	
	
	public function getList($id_user,$offset, $limit) {
// 		$resultSet = $this->tableGateway->select ( 
// 				function (Select $select) use($limit, $offset) 
// 				{
// 			         $select->order ( 'id DESC' )->limit ( $limit )->offset ( $offset );
// 		     } 
// 		);

		$select=new Select('oders');
		
		$select ->columns(array(
				'id'=>'id',	'creatnamecampaign'=>'creatnamecampaign',
				'date_creat'=>'date_creat','date_mod'=>'date_mod',
				'id_user'=>'id_user','status'=>'status',
				'status_oder'=>'status_oder',
				'type'=>'type','DolarTotal'=>'DolarTotal',
				'TotaVistor'=>'TotaVistor',
				'Cpmrate'=>'Cpmrate',
		))
		
						->join('ads','ads.oder_id = oders.id',array('id_code'=>'id','delay'=>'delay','time_display'=>'time_display','namecampaigns'=>'name','js_id'=>'js_id','status_code'=>'status'),'left')
						->join('process','process.oder_id = oders.id',array('date_reg'=>'date_reg','date_active'=>'date_active','checked'=>'checked','id_proc'=>'id','ads_id'=>'ads_id','advertiser_id'=>'advertiser_id','publisher_id'=>'publisher_id','type_id'=>'type_id','status_process'=>'status','website'=>'website'),'left')
		
						->where(array('oders.id_user'=>$id_user,new \Zend\Db\Sql\Predicate\IsNotNull("creatnamecampaign")))
		
		                ->order ( 'oders.id DESC' )
		                ->limit ( $limit )
		                ->offset ( $offset );
		$rowset = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
		
		$results = $rowset->execute();
		
		
		$array = array ();
		foreach ( $results as $key=> $value ) {
			array_push ( $array, $value );
			//$array[]  = $value;
		}
		return $array;
	}
	public function gettype() {
		$row = $this->tableGateway->select ();
		// $where = new \Zend\Db\Sql\Where();
		// $pred_url = new \Zend\Db\Sql\Predicate\Like('group','publisher');
		// $pred_notes = new \Zend\Db\Sql\Predicate\Like('group', 'supperadmin');
		
		// $where->orPredicate($pred_url)->orPredicate($pred_notes);
		
		// $row = $this->tableGateway->select($where);
		
		$res = array ();
		foreach ( $row as $val => $Vlaue ) {
			foreach ( $Vlaue as $key => $kvlue ) {
				// $res[0] = Null;
				$res [$Vlaue->id] = $Vlaue->nametype;
			}
		}
		return $res;
	}
	public function getlistnews($limit) {
		$select = new Select ( 'oders' );
		$select->order ( 'id DESC' );
		$select->limit ( $limit );
		
		$resultSet = $this->tableGateway->selectWith ( $select );
		
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
    }

}
