<?php
 namespace Search\Controller;
 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Search\Model\Search;          // <-- Add this import
 use Search\Form\SearchForm;       // <-- Add this import
 use Zend\Session\Container; 
 use Zend\ServiceManager\ServiceLocatorAwareInterface;
 use Zend\Paginator\Paginator;

use Zend\Paginator\Adapter\Iterator as paginatorIterator; 
 class IndexController extends AbstractActionController
 {
    public function indexAction()
    {    
		$this->layout('layout/home');
        if(isset($_GET['keyword']))
		{
			$str=$_GET['keyword'];
			$str=trim($str);
			$list=explode(' ',$str);
			
			echo "list : ";var_dump($list);
			
			$lenght=sizeof($list);
			$res=array();
			for($i=0;$i<sizeof($list);$i++)
			{
				$res[$i]=$this->getSearchTable()->search($list[$i]);
				
	  
			} 

			//$resfg=$this->getSearchTable()->search($str);
// 			echo "res";
// 			echo "<pre>";
// 			print_r($res);
// 			echo "</pre>";
			
			
			
			$sort=array();
			$sort_num=array();
			$i=0;
			$j=0;
			foreach($res as $key=>$value):
				//echo $j."</br>";
				$j++;
				foreach ($value as $val): 			
					//$id=$val->id;
					$i++;
					$k=array_search($val,$sort);
					if($k)$sort_num[$k]=$sort_num[$k]+1;
					else 
					{
						$sort[$i]=$val;
						$sort_num[$i]=1;
					}
				endforeach;
			endforeach;
			
// 			echo "sort_num";
// 			echo "<pre>";
// 			print_r($sort_num);
// 			echo "</pre>";
			
			
			$ressort=array();
			foreach($sort_num as $key=>$val)
			{
				if($val==$lenght)
				{
					$l=0;
					$ressort[$key]=$sort[$key];
					$l++;
				}
			}
			
// 			echo "eclip";
// 			echo "<pre>";
// 			print_r($ressort);
// 			echo "</pre>";
			
			 $page= $this->params()->fromRoute('page',0)? (int) $this->params()->fromRoute('page',0) : 1;
			 $paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($ressort));
			//$paginator = new Paginator();
			$paginator->setCurrentPageNumber((int) $page);
			 // set the number of items per page to 10
			$paginator->setItemCountPerPage(30);
			$this->layout()->count=$paginator->getTotalItemCount();
			//var_dump($paginator);
			return new ViewModel(array('paginator'=>$paginator));
		}
    }
	public function addplaylistAction()
	{	
		$viewModel=new ViewModel();
		$viewModel->setTerminal(true);
		//var_dump($_POST);
		if(isset($_POST['searchplaylist'])){
			$str=$_POST['searchplaylist'];
			//$page=$_POST['page'];
			if(isset($_POST['page'])){$page=$_POST['page'];}
			else{$page=0;}
				//$str=$_GET['keyword'];
				$str=trim($str);
				$list=explode(' ',$str);
				$lenght=sizeof($list);
				$res=array();
				for($i=0;$i<sizeof($list);$i++)
				{
					$res[$i]=$this->getSearchTable()->search($list[$i]);
					
		  
				}   		
				$sort=array();
				$sort_num=array();
				$i=0;
				$j=0;
				foreach($res as $key=>$value):	
					$j++;
					foreach ($value as $val): 			
						//$id=$val->id;
						$i++;
						$k=array_search($val,$sort);
						if($k)$sort_num[$k]=$sort_num[$k]+1;
						else 
						{
							$sort[$i]=$val;
							$sort_num[$i]=1;
						}
					endforeach;
				endforeach;
				$ressort=array();
				foreach($sort_num as $key=>$val)
				{
					if($val==$lenght)
					{
						$l=0;
						$ressort[$key]=$sort[$key];
						$l++;
					}
				}
			// $page= $this->params()->fromRoute('page',0)? (int) $this->params()->fromRoute('page',0) : 1;
			 $paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($ressort));
			//$paginator = new Paginator();
			if(!$page)$page=1;
			$paginator->setCurrentPageNumber((int) $page);
			 // set the number of items per page to 10
			$paginator->setItemCountPerPage(5);
			//var_dump($paginator);
			$viewModel->paginator=$paginator;
		}
        return $viewModel;
	}
	public function getSearchTable()
     {
         if (!$this->SearchTable) {
             $sm = $this->getServiceLocator();
             $this->SearchTable = $sm->get('Search\Model\SearchTable');
         }
         return $this->SearchTable;
     }
	 protected $SearchTable;

 }
 ?>