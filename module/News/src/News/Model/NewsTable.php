<?php

namespace News\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class NewsTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function saveNews(News $news) {
        $data = array(
            'news_thumbnail' => $news->news_thumbnail,
            'news_name' => $news->news_name,
            'news_content' => $news->news_content,
            'date_creat' => date ( 'Y-m-d H:i:s' ),
        	'date_mod' => date ( 'Y-m-d H:i:s' ),
        	'id_user' => $news->id_user,
        	'possition_view' => $news->possition_view,
        	'url_static'=>$news->url_static,
        	'status'=>1,
        	//'silder'=>'',	
        		
        );
        $id = (int) $news->news_id;

        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if (empty($data['news_thumbnail'])) {
                unset($data['news_thumbnail']);
            }
            if ($this->getNewsById($id)) {
                $this->tableGateway->update($data, array('news_id' => $id));
            } else {
                throw new \Exception('ID does not exist');
            }
        }
    }
    
    public function deleteNews($id) {
        $news = $this->getNewsById($id);
        $result = $this->tableGateway->delete(array('news_id' => $id));
        if($news->news_thumbnail != ''){
            unlink('public/uploads/'.$news->news_thumbnail);
        }
        return $result;
    }

    public function getNewsById($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('news_id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function getNewsByUrl($url_static) {
    	$url_static = (string) $url_static;
    	$rowset = $this->tableGateway->select(array('url_static' => $url_static));
    	$row = $rowset->current();
    	if (!$row) {
    		return false;
    	}
    	return $row;
    }

    public function fetchAll() {
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

    public function getList($offset, $limit) {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($limit, $offset) {
            $select->order('news_id DESC')->limit($limit)->offset($offset);
        });
        $array = array();
        foreach ($resultSet as $value) {
            array_push($array, $value);
        }
        return $array;
    }
    
    public function getnewslist($limit) {
    	
    	$select = new Select ( 'news' );
    	$select->order ( 'news_id DESC' );
    	$select->limit($limit);
    	
    	$resultSet = $this->tableGateway->selectWith ( $select );
    	
    	
    	$array = array();
         foreach ($resultSet as $value) {
            array_push($array, $value);
        }
    	return $array;
    }

}
