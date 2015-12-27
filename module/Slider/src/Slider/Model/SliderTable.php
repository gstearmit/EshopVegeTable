<?php

namespace Slider\Model;

use Zend\Db\TableGateway\TableGateway;
//use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;

class SliderTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select(array('status'=>1));
        return $resultSet;
    }

    public function fetchAll_SELECT(Select $select = null) {
        if (null === $select)
        // $select = new Select('catelog');
        // $select->order('id ASC');
            $resultSet = $this->tableGateway->select();
        $array = array();
        foreach ($resultSet as $value) {
            array_push($array, $value);
        }
        return $array;
    }

    public function countAll() {
        $resultSet = $this->tableGateway->select()->count();
        return $resultSet;
    }
    
    public function parent_find($parent) {
    	$parent = ( int ) $parent;
    	//return $parent;
    	$rowset = $this->tableGateway->select ( array (
    			'id' => $parent
    	) );
    	$row = $rowset->current ();
    	if (! $row) {
    		return 0;
    	}
    	return $row->name;
    }

    public function getList($offset, $limit) {
        $resultSet = $this->tableGateway->select(function (Select $select) use($limit, $offset) {
            $select->order('id DESC')->limit($limit)->offset($offset);
        });
        $array = array();
        foreach ($resultSet as $value) {
            array_push($array, $value);
        }
        return $array;
    }

  
    public function getlistnews($limit) {
        $select = new Select('catelog');
        $select->order('id DESC');
        $select->limit($limit);

        $resultSet = $this->tableGateway->selectWith($select);

        $array = array();
        foreach ($resultSet as $value) {
            array_push($array, $value);
        }
        return $array;
    }

    public function getarrayspiecal() {
        $resultSet = $this->tableGateway->select();
        $data = array();
        $data->id = $resultSet->id;
        $data->link = $resultSet->link;
        return $data;
    }

    public function getSlider($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array(
            'id' => $id,
        	'status'=>1,	
        ));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        return $row;
    }

    public function getbyname($title) {
        $rowset = $this->tableGateway->select(array(
            'catalog' => $title
        ));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row->id;
    }

    public function saveSlider(Slider $Slider) {
        $data = array( 
            'status' => $Slider->status,
            'link' => $Slider->link,
            'img' => $Slider->img,
            'text' => $Slider->text
        );

        $id = (int) $Slider->id;
        if ($id == 0) {
            //return $data;
            $this->tableGateway->insert($data);
            return $this->tableGateway->lastInsertValue;
        } else {
            if ($this->getSlider($id)) {
                return $this->tableGateway->update($data, array(
                            'id' => $id
                ));
            } else {
                return 0;
            }
        }
    }

    public function delete($id) {
        if ($this->getSlider($id)) {
            $this->tableGateway->delete(array(
                'id' => (int) $id
            ));
            return 1;
        } else
            return 0;
    }
    

    public function changeStatus(Slider $Slider) {
       // echo '0000000';die;
        $data = array(
            'status' => $Slider->status,
        );
        $id = (int) $Slider->id;        
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getSlider($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Silder id does not exist');
             }
         }
    }

}

?>