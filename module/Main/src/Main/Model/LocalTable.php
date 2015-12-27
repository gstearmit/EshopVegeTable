<?php
namespace Main\Model;
use Zend\Crypt\BlockCipher;
use Zend\Db\TableGateway\TableGateway;
use Zend\Session\Container;
 class LocalTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
	 public function saveserver(Local $local)
	{	

			$blockCipher = BlockCipher::factory('mcrypt', array('algo' => 'aes'));
			$blockCipher->setKey('foxvsky');
			$result = $blockCipher->encrypt($local->ftppass);
			//echo "Encrypted text: $result \n";
			//echo $blockCipher->decrypt($result);
			
            $data = array(
			 'svname'			=> $local->svname,
             'ip'       		=>$local->ip,
             'ftpusername'      => $local->ftpusername,
			 'ftppass'      	=>$result,
             'path'   			=>$local->path,
			 'link'				=>$local->link,
             'datecreat'    => date('Y-m-d H:i:s'),
 
         );
        
        $id = (int) $local->id;
        if ($id == 0){
            $this->tableGateway->insert($data);
			return 0;
         }else{
            return 1;
        }
	}
	public function getserver($id)
	{
		$rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             return false;
         }
         return $row;
	 
	}




 }
 ?>