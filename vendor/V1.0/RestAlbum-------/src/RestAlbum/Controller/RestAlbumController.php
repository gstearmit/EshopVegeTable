<?php
namespace RestAlbum\Controller;
use Zend\Mvc\Controller\AbstractRestfulController;
use Album\Model\Album;          // <-- Add this import
use Album\Form\AlbumForm;       // <-- Add this import
use Album\Model\AlbumTable;     // <-- Add this import
use Zend\View\Model\JsonModel;
class RestAlbumController extends AbstractRestfulController
{
    protected $albumTable;
    public function getList()
    { 
//     	$response = $this->getResponseWithHeader()
//     	->setContent( __METHOD__.' get the list of data');
//     	return $response;
    	  
        $results = $this->getAlbumTable()->fetchAll();
        $data = array();
        foreach($results as $result) {
            $data[] = $result;
        }
        $Status ='';
        if(!empty($data)) {
        	$Status = 'Success';
        }else { 
        	$Status = 'Error';
        }
        return new JsonModel(array(
        	'status'=>$Status,
            'data' => $data, 
        ));
    }
    public function get($id)
    {
        $album = $this->getAlbumTable()->getAlbum($id);
        $Status ='';
        if($album) {
        	$Status = 'Success';
        }else {
        	$Status = 'Error';
        }
        return new JsonModel(array(
        	'status'=>$Status,
            'data' => $album,
        ));
    }
    public function create($data)
    {
//     	 $response = $this->getResponseWithHeader()
//     	    	           ->setContent( __METHOD__.'  POST DATA');
//     	 return $response;
    	
    	
//         $form = new AlbumForm();
//         $album = new Album();
//         $form->setInputFilter($album->getInputFilter());
//         $form->setData($data);
//         if ($form->isValid()) {
//             $album->exchangeArray($form->getData());
//             $id = $this->getAlbumTable()->saveAlbum($album);
//         }

 
    	$idsave = '';
    	if(!$data['id'])
    	{
//     		return new JsonModel(array(
//     		    	'data' => 'Update data',
//     		   ));
    		// Update data
    		$album = new Album();
    		$album->exchangeArray($data); 
    		$idsave = $this->getAlbumTable()->saveAlbum($album);
    	}else { 
    		// Insert data
	    	$album = new Album();
	    	$album->exchangeArray($data);
	        $idsave = $this->getAlbumTable()->saveAlbum($album);
    	} 
        
    	if($idsave != 0){ 
    		$status ='Success!';
    	}
    	else { $status ='Error!'; }
    	 
    	$data_resphone = array(
    			'id'=>$idsave,
    			'status'=>$status
    	);
    	 
    	return new JsonModel(array(
    			'data' => $data_resphone, //$this->get($idsave),
    	));
    }
    public function update($id, $data)
    {
//     	$response = $this->getResponseWithHeader()
//     	->setContent( __METHOD__.'  UPDATE POST DATA');
//     	return $response;
    	
          $data['id'] = $id;
//         $album = $this->getAlbumTable()->getAlbum($id);
//         $form  = new AlbumForm();
//         $form->bind($album);
//         $form->setInputFilter($album->getInputFilter());
//         $form->setData($data);
//         if ($form->isValid()) {
            //$id = $this->getAlbumTable()->saveAlbum($form->getData());
           $idsave = $this->getAlbumTable()->saveAlbum($data);
       // }
       
           if($idsave === 1){ $status ='Success!';}
           else { $status ='Error!'; }
           
           $data_resphone = array(
           		'status'=>$status,
           		'satus_update'=>$idsave,
           	    'id'=>$id,
           		
           );
           
        return new JsonModel(array(
            'data' => $data_resphone, //$this->get($idsave),
        ));
    }
    public function delete($id)
    {
    	 
        $this->getAlbumTable()->deleteAlbum($id);
        return new JsonModel(array(
            'data' => 'deleted',
        ));
    }
    public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }
    
    // configure response
    public function getResponseWithHeader()
    {
    	$response = $this->getResponse();
    	$response->getHeaders()
    	//make can accessed by *
    	->addHeaderLine('Access-Control-Allow-Origin','*')
    	//set allow methods
    	->addHeaderLine('Access-Control-Allow-Methods','POST PUT DELETE GET');
    
    	return $response;
    }
}