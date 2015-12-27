<?php
namespace Search\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
 use Zend\Paginator\Adapter\DbSelect;
 use Zend\Paginator\Paginator;
 use Zend\Db\Sql\Where;

 class SearchTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
      public function search($str)
     {
             $select = new Select('video');
            $spec= new Where();
            $spec->like('title','% '.$str.' %');
				

            $select->where($spec);
			$select->where->OR->like('title',$str.' %' );
			$select->where->OR->like('title','% '.$str );
                //$select->where(array('title'=>$str));
             //$select->where(array('catelog'=>$title,'description'=>$description));
             $select->order('id ASC');
			 /*
             // create a new result set based on the Album entity
             $resultSetPrototype = new ResultSet();
             $resultSetPrototype->setArrayObjectPrototype(new Search());
             // create a new pagination adapter object
             $paginatorAdapter = new DbSelect(
                 // our configured select object
                 $select,
                 // the adapter to run it against
                 $this->tableGateway->getAdapter(),
                 // the result set to hydrate
                 $resultSetPrototype
             );
             $paginator = new Paginator($paginatorAdapter);
            
             return $paginator;
			 */
			 return $this->tableGateway->selectWith($select);
     }
     public function getrowbyid($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

 }
 ?>