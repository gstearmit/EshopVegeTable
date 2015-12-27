<?php

namespace Settings\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Settings\Model\Settings;
class SettingsTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	
	public function save(Settings $setting) 
	{		
		
		
		$data = array (
				'name' => $setting->name,
				'title' => $setting->title,
				'address' => $setting->address,
			    'phone'=>$setting->phone,
				'mobile' =>$setting->mobile,
				
				'fax' => $setting->fax,
				'email' => $setting->email,
				'linkweb' => $setting->linkweb,
				'keyword'=>$setting->keyword,
				'description' =>$setting->description,
				
				'created'=>date ( 'Y-m-d H:i:s' ),
				'modified'=>date ( 'Y-m-d H:i:s' ),
				'about' => $setting->about,
				'introduction'=>$setting->introduction,
				'yahoo'=>$setting->yahoo,
				'skype'=>$setting->skype,
				
				
				'logo1' => $setting->logo1,
				'logo_footer'=>$setting->logo_footer,
				'ico' =>$setting->ico,
				
				'sologen'=>$setting->sologen,
				'facebook'=>$setting->facebook,
				'facebook_text' => $setting->facebook_text,
				'tweets'=>$setting->tweets,
				'tweets_text'=>$setting->tweets_text,
				'github'=>$setting->github,
				
				'google' => $setting->google,
				'feed'=>$setting->feed,
				'seo_description' => $setting->seo_description,
				'seo_keywords'=>$setting->seo_keywords,
//				
				'printerest' => $setting->printerest,
				'youtube_acount'=>$setting->youtube_acount,
		);
		$id = ( int ) $setting->id;
		
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
			}
		}
	}
	public function delete($id) {
		// $setting = $this->getById($id);
		$result = $this->tableGateway->delete ( array (
				'id' => $id 
		) );
		return $result;
	}
	
	public function savestatus(Settings $payoutrates) {
		$data = array (
				'status' => $payoutrates->status,
		);
		$id = ( int ) $payoutrates->id;
	
		if ($this->getById ( $id )) {
			return $this->tableGateway->update ( $data, array (
					'id' => $id
			) );
		} else {
			return 0;
			//throw new \Exception ( 'ID does not exist' );
		}
	
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
		$select = new Select ( 'buyer' );
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
