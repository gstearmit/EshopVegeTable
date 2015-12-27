<?php
namespace Main\Model;
//use Zend\Crypt\Password\Bcrypt;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
 use Zend\Paginator\Adapter\DbSelect;
 use Zend\Paginator\Paginator;
 use Zend\Db\Sql\Where;
//use Zend\Http\Cookies;
//use Zend\Http\Client;
use Zend\Session\Container;
 class MainTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
     public function gettest()
     {
         $resultSet = $this->tableGateway->select();
         $data=array('id'=>'','title'=>'');
         $data->id=$resultSet->id;
         $data->title=$resultSet->title;
         return $data;
     }
     
     public function getUpload($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             return false;
         }
         return $row;
     }
   
    public function saveVideo(Main $upload)
     {
        //date_default_timezone_set("UTC");
            $session_user = new Container('user');
            $user=$session_user->username;
            $data = array(
             'title'       =>$upload->title,
             'seriecode'   => $upload->seriecode,
             'catelog'     => $upload->catelog,
			 'tags'			=>$upload->tags,
             'description' =>$upload->description,
             'username'   =>$user,
             'datetime'    => date('Y-m-d H:i:s'),
             'views'       =>0,
			 'duration'		=>$upload->duration,
			// 'folder_key'	=>$upload->folder_key,
			// 'quick_key'	=>$upload->quick_key,
			 'local_link'	=>$upload->local_link,
			 'imgfolder'	=>$upload->imgfolder,
			 'localsv_id'	=>$upload->localsv_id,
			// 'externalsv_id'=>$upload->externalsv_id,
			// 'external_link'=>$upload->external_link,						

         );
        
         $id = (int) $upload->id;
            if ($id == 0) {
             $this->tableGateway->insert($data);
			 return 0;
         } else {
			return 1;
             }
         
     }
	 public function updatequickkey($quick_key,$id)
	 {
		 $data = array(
             'quick_key'       =>$quick_key,
			 );
			 $id= (int) $id;
			 $this->tableGateway->update($data,array('id'=>$id));
			 //return 0;
	 }
     public function updateads($id,$ads)
     {
        //var_dump($ads);
        $data=array(
                'ads_pre'=>$ads['pre'],
                'ads_mid'=>$ads['mid'],
                'ads_bot'=>$ads['bot'],
        		'banner'=>$ads['banner'],
        );
        if($id==0)
        {
            return  "error";
            
        }
        else
        {
           //$row=$this->getUpload($id);
              return  $this->tableGateway->update($data,array('id'=>$id));
        }
     }
     public function editvideo($id,$kk)
     {
        //var_dump($ads);
       // if(!$main->sticky)
       //$id=$main->id;
       if(isset($kk->sticky))
       {
            $data=array(
                'title'=>$kk->title,
                'catelog'=>$kk->catelog,
                'description'=>$kk->description,
                'sticky'=>$kk->sticky,
            );
        }
        else
        {
            $data=array(
                'title'=>$kk->title,
                'catelog'=>$kk->catelog,
                'description'=>$kk->description,
                
            );
            
        }
        if($id==0)
        {
            echo "error";            
            
        }
        else
        {
           //$row=$this->getUpload($id);
                $this->tableGateway->update($data,array('id'=>$id));
        }
     }
     public function addviews(main $main)
     {
        $view=(int)$main->views+1;
        $data=array('views'=>$view);
        if($main->id!=0)
        {
            $this->tableGateway->update($data,array('id'=>$main->id));
        }
     }
     public function getrowcontent($seriecode)
     {
        //$id  = (int) $id;
         $rowset = $this->tableGateway->select(array('seriecode' => $seriecode));
         $row = $rowset->current();
         if (!$row) {
            // throw new \Exception("Could not find row $seriecode");
            return false;
         }
         return $row;
     }
     public function fetchuser($user,$paginated=false)
     {
        if ($paginated) {
             // create a new Select object for the table album
             $select = new Select('video');
             $select->where(array('username'=>$user));
             $select->order('id ASC');
             // create a new result set based on the Album entity
             $resultSetPrototype = new ResultSet();
             $resultSetPrototype->setArrayObjectPrototype(new Main());
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
         }
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
     public function fetcatalogAll($id,$par,$paginated=false)
     {
        if ($paginated) {
             // create a new Select object for the table album
             $select = new Select('video');
             $select->where(array('catelog'=>$id));
             	    //->or(array('catelog'=>'29'));
             foreach($par as $pa){
              $select->where->OR->equalTo('catelog',$pa);
             }
			$select->order('sticky DESC');
			$select->order('views DESC');
             $select->order('id DESC');
             // create a new result set based on the Album entity
             $resultSetPrototype = new ResultSet();
             $resultSetPrototype->setArrayObjectPrototype(new Main());
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
         }
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
	      public function fetbyuser($user_name,$paginated=false,$sort='id',$orderby='DESC')
     {
        if ($paginated) {
             // create a new Select object for the table album
             $select = new Select('video');
             if($user_name)$select->where(array('username'=>$user_name));
             	    //->or(array('catelog'=>'29'));
             
            
             $select->order($sort.' '.$orderby);
			 $select->order('views DESC');
             // create a new result set based on the Album entity
             $resultSetPrototype = new ResultSet();
             $resultSetPrototype->setArrayObjectPrototype(new Main());
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
         }
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
     public function fetAll($paginated=false,$orderby="id",$order="ASC")
     {
        if ($paginated) {
             // create a new Select object for the table album
             $select = new Select('video');
             //$select->where(array('catelog'=>$id));
             $select->order($orderby.' '.$order);
			 $select->order('views DESC');
             // create a new result set based on the Album entity
             $resultSetPrototype = new ResultSet();
             $resultSetPrototype->setArrayObjectPrototype(new Main());
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
         }
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
     public function test($id)
     {
       $rowset= $this->tableGateway->select('ads_pre',array('id'=>$id));
        $row=$rowset->current();
        echo $row->id;
     }
     public function search($str)
     {
             $select = new Select('video');
             //echo $str;
            //function getwhere(Where $where,$str) {
                // $where->like('title', '%in%');
                   // }
                   // $spec=getwhere($str);
            $spec= new Where();
            $spec->like('title','%'.$str.'%');
           
                    
            // var_dump($spec);
            $select->where($spec);
                //$select->where(array('title'=>$str));
             //$select->where(array('catelog'=>$title,'description'=>$description));
             $select->order('id ASC');
             // create a new result set based on the Album entity
             $resultSetPrototype = new ResultSet();
             $resultSetPrototype->setArrayObjectPrototype(new Main());
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
     }
     public function remove_directory($dir)
	{
  	if($handle = opendir("$dir"))
  	{
     		while(false !== ($item = readdir($handle)))
     		{
       			if($item != "." && $item != "..")
       			{
         			 if(is_dir("$dir/$item"))
         			 {
             				remove_directory("$dir/$item");
          			 }else
          			 {
          				unlink("$dir/$item");
          				
         			 }
        		}
     		} 
     		//closedir($handle);
    		 rmdir($dir);
    		// echo"removing $dir<br>\n";
  	 }
  	 }
     public function deleteVideo($id)
     {
        
        $data=$this->getrowcontent($id);
		if($data){
        $date=(string) $data->datetime;
        $date=str_replace('-','',$date);
        $date=substr($date,2,6);
         //$md=Md5()
         //delete video
         if(file_exists('eclip.tv/data/uploads/clip/'.md5($date).'/'.$data->seriecode.'.mp4'))
         unlink('eclip.tv/data/uploads/clip/'.md5($date).'/'.$data->seriecode.'.mp4');
         //delete image 
         if(file_exists('eclip.tv/data/uploads/images/'.$data->seriecode.'/0.png'))
         unlink('eclip.tv/data/uploads/images/'.$data->seriecode.'/0.png');
         // $this->tableGateway->delete(array('seriecode' =>  $id));
          if(file_exists('eclip.tv/data/uploads/images/'.$data->seriecode.'/0.png'))
         unlink('eclip.tv/data/uploads/images/'.$data->seriecode.'/1.png');
          if(file_exists('eclip.tv/data/uploads/images/'.$data->seriecode.'/0.png'))
         unlink('eclip.tv/data/uploads/images/'.$data->seriecode.'/2.png');
         $this->remove_directory('eclip.tv/data/uploads/images/'.$data->seriecode);
         
        $this->tableGateway->delete(array('seriecode' =>  $id));
		return 1;
		}
		else return 0;
          
         
     }
         
     
    

 }
 ?>