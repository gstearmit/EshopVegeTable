<?php

namespace Payoutrates\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class OdersdetailsTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	
	public function Updatestatus(Odersdetails $news) 
	{
		$data = array (
				//'id' => $news->id,
				'status' => $news->status,
		);
		
		   $id = ( int ) $news->id;
		  if($id != 0)
		  {
			if ($this->getById ( $id )) {
				return $this->tableGateway->update ( $data, array (
						'id' => $id
				     ) );
			} else {
				return 0;
			}
		  }
	
	}
	
	public function saveinfo(Odersdetails $news) {
		$data = array (
				'quantity' => $news->oder_id,
				'cpmRate' => $news->description,
				'amount' => date ( 'Y-m-d H:i:s' ),
				'type' => date ( 'Y-m-d H:i:s' ),
				'id_user' => $news->id_user,
				
				
		);
		$id = ( int ) $news->id;
	
		if ($id == 0) {
			$this->tableGateway->insert ( $data );
		} else {
				
			if ($this->getById ( $id )) {
				$this->tableGateway->update ( $data, array (
						'id' => $id
				) );
			} else {
				throw new \Exception ( 'ID does not exist' );
			}
		}
	}
	
	public function save(Odersdetails $news) {
		$data = array (
				'oder_id' => $news->oder_id,
				'description' => $news->description,
				'date_creat' => date ( 'Y-m-d H:i:s' ),
				'date_mod' => date ( 'Y-m-d H:i:s' ),
				'id_user' => $news->id_user,
				'status' => $news->status,
				'quantity' => $news->quantity,
				'cpmRate' => $news->cpmRate,
				'amount' => $news->amount,
				'type'=>$news->type,
				
				'AdobeFlashEnabled' => $news->AdobeFlashEnabled,
				'MaxDailyBudget' => $news->MaxDailyBudget,
				'MobileTargeting' => $news->MobileTargeting,
				'PreviousWebsite' => $news->PreviousWebsite,
				'payment_select' => $news->payment_select,
				'trafficsources' => $news->trafficsources 
		);
		$id = ( int ) $news->id;
		
		if ($id == 0) {
			$this->tableGateway->insert ( $data );
		} else {
			
			if ($this->getById ( $id )) {
				$this->tableGateway->update ( $data, array (
						'id' => $id 
				) );
			} else {
				throw new \Exception ( 'ID does not exist' );
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
	public function delete_by_oder_id($oder_id) {
		
		$result = $this->tableGateway->delete ( array (
				'oder_id' => $oder_id
		) );
		return $result;
	}
	public function getbyidtwo($oder_id)
	{
	
		$select=new Select('odersdetails');
	
		$select->columns(array(
		   		              		'id_detail'=>'id',	'description'=>'description',
		   		              		'status_details'=>'status','quantity'=>'quantity',
		   		              		'cpmRate'=>'cpmRate','amount'=>'amount',
		   		              		'type_details'=>'type',
		   		              		'AdobeFlashEnabled'=>'AdobeFlashEnabled','MaxDailyBudget'=>'MaxDailyBudget',
		   		              		'MobileTargeting'=>'MobileTargeting','trafficsources'=>'trafficsources',
		   		              		'PreviousWebsite'=>'PreviousWebsite','payment_select'=>'payment_select',
		                        ))
		
		->where(array('odersdetails.oder_id'=>$oder_id));
	
		$rowset = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
	
		$results = $rowset->execute();
		$array = array();
		foreach ($results as $result)
		{
			$tmp = array();
			$tmp= $result;
			
			$array[]=$result['id_detail'];
			
			//$array[] = $tmp;
		}
		return $array;
	
	}
	
	public function getDetails_OderDetails($id_user,$id_oeder)
	{
		$select=new Select('odersdetails');
	
		$select ->columns(array(
				'id_detail'=>'id',	'description'=>'description',
				'status_details'=>'status','quantity'=>'quantity',
				'cpmRate'=>'cpmRate','amount'=>'amount',
				'type_details'=>'type',
				'AdobeFlashEnabled'=>'AdobeFlashEnabled','MaxDailyBudget'=>'MaxDailyBudget',
				'MobileTargeting'=>'MobileTargeting','trafficsources'=>'trafficsources',
				'PreviousWebsite'=>'PreviousWebsite','payment_select'=>'payment_select',
		))
		->join('oders','oders.id = odersdetails.oder_id',
				array(
						'id'=>'id',	'creatnamecampaign'=>'creatnamecampaign',
						'date_creat'=>'date_creat','date_mod'=>'date_mod',
						'id_user'=>'id_user','status'=>'status',
						'status_oder'=>'status_oder',
						'type'=>'type','DolarTotal'=>'DolarTotal',
						'TotaVistor'=>'TotaVistor',
						'Cpmrate'=>'Cpmrate',
				
				),'left')
				->join('ads','ads.oder_id = oders.id',array('id_code'=>'id','delay'=>'delay','time_display'=>'time_display','namecampaigns'=>'name','js_id'=>'js_id','status_code'=>'status'),'left')
				->join('process','process.oder_id = oders.id',array('date_reg'=>'date_reg','date_active'=>'date_active','checked'=>'checked','id_proc'=>'id','ads_id'=>'ads_id','advertiser_id'=>'advertiser_id','publisher_id'=>'publisher_id','type_id'=>'type_id','status_process'=>'status','website'=>'website'),'left')
	
				->where(array('odersdetails.oder_id'=>$id_oeder));
	
		//->order ( 'oders.id DESC' )->limit ( $limit )->offset ( $offset );
		$rowset = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
	
		$results = $rowset->execute();
	
		/*
		<div id="shoppingnew">
			<input type="hidden" class="form-control" id="spVietnamid" name="palpost[Vietnam][id]" value="218">
			<input type="hidden" class="form-control" id="spVietnamoder_id" name="palpost[Vietnam][oder]" value="105">
			<input type="hidden" class="form-control" id="spVietnamtype" name="palpost[Vietnam][type]" value="0">
			<input type="hidden" class="form-control" id="spVietnamnamepackge" name="palpost[Vietnam][namepackge]" value="Vietnam">
			<input type="hidden" class="form-control" id="spVietnamprice" name="palpost[Vietnam][price]" value="0.4">
			<input type="hidden" class="form-control" id="spVietnamvistor" name="palpost[Vietnam][vistor]" value="5">
			<input type="hidden" class="form-control" id="spVietnamamount" name="palpost[Vietnam][amount]" value="2">
		</div>
		*/
		
	    $i=0;
		$array = array ();
		foreach ( $results as $key=> $value ) {
	         $array[$i]['namepackge']  = $value['description'];
	         $array[$i]['id']  = $value['id_detail'];  // id details
	         $array[$i]['oder']  = $value['id'];      // oder id
	         $array[$i]['type']  = $value['type_details'];      
	         $array[$i]['price']  = $value['cpmRate'];
	         $array[$i]['vistor']  = $value['quantity'];
	         $array[$i]['amount']  = $value['cpmRate'] * $value['quantity'];
	         $i++;
		}
		return $array;
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
	public function fetchAll() {
		$resultSet = $this->tableGateway->select ();
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
		}
		return $array;
	}
	public function countAll() {
		$resultSet = $this->tableGateway->select ()->count ();
		return $resultSet;
	}
	public function getList($offset, $limit) {
		$resultSet = $this->tableGateway->select ( function (Select $select) use($limit, $offset) {
			$select->order ( 'id DESC' )->limit ( $limit )->offset ( $offset );
		} );
		$array = array ();
		foreach ( $resultSet as $value ) {
			array_push ( $array, $value );
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
