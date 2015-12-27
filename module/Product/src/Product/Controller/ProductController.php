<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Form\ProductFilter;
use Product\Form\ProductForm;
use Product\Model\Product;
use Product\Model\ProductTable;
use Product\Model\Payoutype;
use Product\Model\PayoutypeTable;
use Zend\Paginator\Paginator, Zend\Paginator\Adapter\Null as PageNull;
use Zend\Session\Container;

// //--Slideshow
// use Slideshow\Model\Slide;
// use Slideshow\Model\SlideTable;

class ProductController extends AbstractActionController {
	public $_fileName;
	protected $UserTable;
	public function getUserTable() {
		if (! $this->UserTable) {
			$sm = $this->getServiceLocator ();
			$this->UserTable = $sm->get ( 'Users\Model\UserTable' );
		}
		return $this->UserTable;
	}
	
	public function indexAction() {
		$this->layout ( 'layout/bags' );
		
		return new ViewModel ( array (
				
		) );
	}
	
	public function addAction() {
		
		$this->layout ( 'layout/bags' );
		$form = new ProductForm ();
		// $form->setInputFilter(new ProductFilter());
		$data = $this->getServiceLocator ()->get ( 'PayoutypeTable' )->gettype();
		
		
		
		if(is_array($data) and !empty($data)){ $datatypetmp = $data ;} else { $datatypetmp = Null;}
		$form->settype($datatypetmp);
		
		if ($this->getRequest ()->isPost ()) {
			
			$data = array_merge_recursive ( $this->getRequest ()->getPost ()->toArray (), $this->getRequest ()->getFiles ()->toArray () );
			$form->setData ( $data );
			if (! $form->isValid ()) {
				return new ViewModel ( array (
						'error' => true,
						'form' => $form 
				) );
			} else {
				
				$exchange_data = array (
						'namepackge' => $data ['namepackge'],
						'price' => $data ['price'],
						'id_user' =>$id_user ,
						'type' => $data ['type'],
						
						'DKCpmUni' => $data ['DKCpmUni'],
						'DKCpmRaw' => $data ['DKCpmRaw'],
						
						'MBCpmUni' => $data ['MBCpmUni'],
						'MBCpmRaw' => $data ['MBCpmRaw'],
						'code' => $data['code'],
						'hotstring' => $data['hotstring'],
				);
				
				$Product = new Product ();
				$Product->exchangeArray ( $exchange_data );
				$this->getServiceLocator ()->get ( 'ProductTable' )->save ( $Product );
				return $this->redirect ()->toRoute ( 'Product', array (
						'controller' => 'product',
						'action' => 'list' 
				) );
			}
		}
		
		return new ViewModel ( array (
				'form' => $form 
		) );
	}
	public function listAction() {
		
		$this->layout ( 'layout/bags' );
		
		$ProductTable = $this->getServiceLocator ()->get ( 'ProductTable' );
		$allRecord = $ProductTable->countAll ();
		$pageNull = new PageNull ( $allRecord );
		$itemsPerPage = 20;
		$pageRange = 5;
		$page = $this->params ()->fromRoute ( 'page', 1 );
		$offset = ($page - 1) * $itemsPerPage;
		$paginator = new Paginator ( $pageNull );
		$paginator->setCurrentPageNumber ( $page );
		$paginator->setItemCountPerPage ( $itemsPerPage );
		$paginator->setPageRange ( $pageRange );
		
		$listpr = $ProductTable->getList ( $offset, $itemsPerPage );
		
		//die("anh co the che vi em em biet ko ");
		
		return new ViewModel ( array (
				'listNews' => $listpr,
				'paginator' => $paginator,
				'allRecord' => $allRecord,
				'offset' => $offset,
				'itemsPerPage' => $itemsPerPage 
		) );
	}
	public function editAction() {
		$this->layout ( 'layout/bags' );
		
		$id = $this->params ()->fromRoute ( 'id', 0 );
		
		$ProductTable = $this->getServiceLocator ()->get ( 'ProductTable' );
		$form = new ProductForm ();
		$form->setInputFilter ( new ProductFilter () );
		// $form->get('news_thumbnail')->removeAttributes(array('required'));
		$filter = $form->getInputFilter ();
		// $filter->get('news_thumbnail')->setRequired(false);
			
		$data = $this->getServiceLocator ()->get ( 'PayoutypeTable' )->gettype();
		//$form->get('type')->removeAttributes(array('required'));
		if(is_array($data) and !empty($data)){ $datatypetmp = $data ;} else { $datatypetmp = Null;}
		$form->settype($datatypetmp);
			
			
		$newsDetail = $ProductTable->getById ( $id );
		// $this->_fileName = $newsDetail->news_thumbnail;
		
		
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Product', array (
					'controller' => 'product',
					'action' => 'list-news' 
			) );
		} else {
			
			$form->bind ( $newsDetail );
			if ($this->getRequest ()->isPost ()) {
				$data = array_merge_recursive ( $this->getRequest ()->getPost ()->toArray (), $this->getRequest ()->getFiles ()->toArray () );
				$form->setData ( $data );
				if (! $form->isValid ()) {
					return new ViewModel ( array (
							'error' => true,
							'form' => $form,
							// 'image' => $this->_fileName,
							'id' => $id 
					) );
				} else {
					       $exchange_data = array ();
					
					        $exchange_data['id'] = $id;
							$exchange_data['namepackge'] = $data ['namepackge'];
							$exchange_data['price'] = $data ['price'];
							$exchange_data['id_user'] = $id_user;
							
							$exchange_data['type'] = $data['type'] ;
							
							$exchange_data['DKCpmUni'] = $data ['DKCpmUni'];
							$exchange_data['DKCpmRaw'] = $data ['DKCpmRaw'];
							
							$exchange_data['MBCpmUni'] =$data ['MBCpmUni'];
							$exchange_data['MBCpmRaw'] = $data ['MBCpmRaw'];
							$exchange_data['code'] = $data['code'];
							$exchange_data['hotstring'] = $data['hotstring'];
					
						
					
					$Product = new Product ();
					$Product->exchangeArray ( $exchange_data );
					
					$ProductTable->save ( $Product );
					return $this->redirect ()->toRoute ( 'Product', array (
							'controller' => 'product',
							'action' => 'list-news' 
					) );
				}
			}
			return new ViewModel ( array (
					'form' => $form,
					// 'image' => $this->_fileName,
					'id' => $id 
			) );
		}
	}
	
	public function statusAction() {
		
		$view= new ViewModel();
		$this->layout ( 'layout/bags' );
	
		$id = $this->params ()->fromRoute ( 'id', 0 );
		$status = $this->params ()->fromRoute ( 'status', 0 );
	
		$ProductTable = $this->getServiceLocator ()->get ( 'ProductTable' );
		
	
		if ($id == 0) {
			return $this->redirect ()->toRoute ( 'Product', array (
					'controller' => 'product',
					'action' => 'list-news'
			) );
		} else {
			
					$exchange_data = array ();
						
					$exchange_data['id'] = $id;
					$exchange_data['status'] = $status;
					
						
					$Product = new Product ();
					$Product->exchangeArray ( $exchange_data );
						
					$checkupdate = $ProductTable->savestatus ( $Product );
		
			
			$view->id = $id;
			$view->check=$checkupdate;
			return $view;
		}
	}
	
	public function estimatedprocessAction()
	{
		$this->layout ( 'layout/bags' );
		$request=$this->getRequest();
		if($request->isPost())
		{
		
			//$data=$request->getPost();
			//
			$data = array_merge_recursive ( $this->getRequest ()->getPost ()->toArray (), $this->getRequest ()->getFiles ()->toArray () );

			$text ='';
			$href = WEBPATH.'/sign.ads';
			//8
			if($data['usa'] != NULL and $data['eu'] != NULL and $data['international'] != NULL)
			{
			        $setdefault = $data['usa']; //usa 100%
			        $Impression_for_mat = number_format($data['dailyadimpression'],2,",",".");
			        $arr = explode('.',$Impression_for_mat);
			        if($data['dailyadimpression'] > 1000 )
			        {
			        	$Impression = $arr[0] ; 
			        }else  if($data['dailyadimpression'] < 1000 )
			        {
			        	$Impression = 0;
			        }
			        if($data['dailyadimpression'] == 1000)
			        {
			        	$Impression = 1 ;
			        }
			        
			        $website = $data['website'];
			        $ECPMMIN = 0.5;
			        $ECPMMAX = 3;
			        $Estimated_Daily_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Daily_Revenue_Max = $ECPMMAX * $Impression;
			        
			        $Estimated_Monthly_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Monthly_Revenue_Max = $ECPMMAX * $Impression*30;
			        
			        
			        
			        
					$text ='<div id="price" class="cochu" style="display: block;">
					<p><span>impressions </span>:<span class="colorprice" id="dailyadimpressionresilt"><b> '.$Impression_for_mat.'</b></span>  </p>
										<p><span>Your ECPM Min:</span><span class="colorprice"><b>$'.$ECPMMIN.'</b></span></p>
										<p><span>Your ECPM Max:</span><span class="colorprice"><b>$'.$ECPMMAX.'</b></span></p>
		
										<p><span>Estimated Daily Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Min.'</b></span></p>
										<p><span>Estimated Daily Revenue max</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Max.'</b></span></p>
		
										<p><span>Estimated Monthly Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Min.'</b></span></p>
										<p><span>Estimated Monthly Revenue Max</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Max.'</b></span></p>
		
										<a class="apply applyNow" href="'.$href.'"> Apply now 8</a>
							</div>';
		
			}
			//7
		    if($data['usa']!= NULL and $data['eu'] != NULL and $data['international'] == NULL )
			{
			    $setdefault = $data['usa'];
			    $Impression_for_mat = number_format($data['dailyadimpression'],2,",",".");
			        $arr = explode('.',$Impression_for_mat);
			        if($data['dailyadimpression'] > 1000 )
			        {
			        	$Impression = $arr[0] ; 
			        }else  if($data['dailyadimpression'] < 1000 )
			        {
			        	$Impression = 0;
			        }
			        if($data['dailyadimpression'] == 1000)
			        {
			        	$Impression = 1 ;
			        }
			        
			        $website = $data['website'];
			        $ECPMMIN = 0.5;
			        $ECPMMAX = 3;
			        $Estimated_Daily_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Daily_Revenue_Max = $ECPMMAX * $Impression;
			        
			        $Estimated_Monthly_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Monthly_Revenue_Max = $ECPMMAX * $Impression*30;
			        
			        
			        
			        
					$text ='<div id="price" class="cochu" style="display: block;">
					<p><span>impressions </span>:<span class="colorprice" id="dailyadimpressionresilt"><b> '.$Impression_for_mat.'</b></span>  </p>
										<p><span>Your ECPM Min:</span><span class="colorprice"><b>$'.$ECPMMIN.'</b></span></p>
										<p><span>Your ECPM Max:</span><span class="colorprice"><b>$'.$ECPMMAX.'</b></span></p>
		
										<p><span>Estimated Daily Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Min.'</b></span></p>
										<p><span>Estimated Daily Revenue max</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Max.'</b></span></p>
		
										<p><span>Estimated Monthly Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Min.'</b></span></p>
										<p><span>Estimated Monthly Revenue Max</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Max.'</b></span></p>
		
										<a class="apply applyNow" href="'.$href.'"> Apply now 7</a>
							</div>';
				}
			//6
			if($data['usa']!= NULL and $data['eu'] == NULL and $data['international'] != NULL )
				{
					$setdefault = $data['usa'];
			        $Impression_for_mat = number_format($data['dailyadimpression'],2,",",".");
			        $arr = explode('.',$Impression_for_mat);
			        if($data['dailyadimpression'] > 1000 )
			        {
			        	$Impression = $arr[0] ; 
			        }else  if($data['dailyadimpression'] < 1000 )
			        {
			        	$Impression = 0;
			        }
			        if($data['dailyadimpression'] == 1000)
			        {
			        	$Impression = 1 ;
			        }
			        
			        $website = $data['website'];
			        $ECPMMIN = 0.5;
			        $ECPMMAX = 3;
			        $Estimated_Daily_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Daily_Revenue_Max = $ECPMMAX * $Impression;
			        
			        $Estimated_Monthly_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Monthly_Revenue_Max = $ECPMMAX * $Impression*30;
			        
			        
			        
			        
					$text ='<div id="price" class="cochu" style="display: block;">
					<p><span>impressions </span>:<span class="colorprice" id="dailyadimpressionresilt"><b> '.$Impression_for_mat.'</b></span>  </p>
										<p><span>Your ECPM Min:</span><span class="colorprice"><b>$'.$ECPMMIN.'</b></span></p>
										<p><span>Your ECPM Max:</span><span class="colorprice"><b>$'.$ECPMMAX.'</b></span></p>
		
										<p><span>Estimated Daily Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Min.'</b></span></p>
										<p><span>Estimated Daily Revenue max</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Max.'</b></span></p>
		
										<p><span>Estimated Monthly Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Min.'</b></span></p>
										<p><span>Estimated Monthly Revenue Max</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Max.'</b></span></p>
		
										<a class="apply applyNow" href="'.$href.'"> Apply now 6</a>
							</div>';
				}
			//5
			if($data['usa']!= NULL and $data['eu'] == NULL and $data['international'] == NULL )
				{
					$setdefault = $data['usa'];
			       $Impression_for_mat = number_format($data['dailyadimpression'],2,",",".");
			        $arr = explode('.',$Impression_for_mat);
			        if($data['dailyadimpression'] > 1000 )
			        {
			        	$Impression = $arr[0] ; 
			        }else  if($data['dailyadimpression'] < 1000 )
			        {
			        	$Impression = 0;
			        }
			        if($data['dailyadimpression'] == 1000)
			        {
			        	$Impression = 1 ;
			        }
			        
			        $website = $data['website'];
			        $ECPMMIN = 0.5;
			        $ECPMMAX = 3;
			        $Estimated_Daily_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Daily_Revenue_Max = $ECPMMAX * $Impression;
			        
			        $Estimated_Monthly_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Monthly_Revenue_Max = $ECPMMAX * $Impression*30;
			        
			        
			        
			        
					$text ='<div id="price" class="cochu" style="display: block;">
					<p><span>impressions </span>:<span class="colorprice" id="dailyadimpressionresilt"><b> '.$Impression_for_mat.'</b></span>  </p>
										<p><span>Your ECPM Min:</span><span class="colorprice"><b>$'.$ECPMMIN.'</b></span></p>
										<p><span>Your ECPM Max:</span><span class="colorprice"><b>$'.$ECPMMAX.'</b></span></p>
		
										<p><span>Estimated Daily Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Min.'</b></span></p>
										<p><span>Estimated Daily Revenue max</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Max.'</b></span></p>
		
										<p><span>Estimated Monthly Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Min.'</b></span></p>
										<p><span>Estimated Monthly Revenue Max</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Max.'</b></span></p>
		
										<a class="apply applyNow" href="'.$href.'"> Apply now 5</a>
							</div>';
				}
			//4
			if($data['usa']== NULL and $data['eu'] != NULL and $data['international'] != NULL )
				{
					
					
					$setdefault = $data['eu'];
					
					
					 $Impression_for_mat = number_format($data['dailyadimpression'],2,",",".");
			        $arr = explode('.',$Impression_for_mat);
			        if($data['dailyadimpression'] > 1000 )
			        {
			        	$Impression = $arr[0] ; 
			        }else  if($data['dailyadimpression'] < 1000 )
			        {
			        	$Impression = 0;
			        }
			        if($data['dailyadimpression'] == 1000)
			        {
			        	$Impression = 1 ;
			        }
			        
			        $website = $data['website'];
			        
			        $ECPMMIN = 0.3;
			        $ECPMMAX = 2;
			        
			        $Estimated_Daily_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Daily_Revenue_Max = $ECPMMAX * $Impression;
			        
			        $Estimated_Monthly_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Monthly_Revenue_Max = $ECPMMAX * $Impression*30;
			        
			        
			        
			        
					$text ='<div id="price" class="cochu" style="display: block;">
					<p><span>impressions </span>:<span class="colorprice" id="dailyadimpressionresilt"><b> '.$Impression_for_mat.'</b></span>  </p>
										<p><span>Your ECPM Min:</span><span class="colorprice"><b>$'.$ECPMMIN.'</b></span></p>
										<p><span>Your ECPM Max:</span><span class="colorprice"><b>$'.$ECPMMAX.'</b></span></p>
		
										<p><span>Estimated Daily Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Min.'</b></span></p>
										<p><span>Estimated Daily Revenue max</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Max.'</b></span></p>
		
										<p><span>Estimated Monthly Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Min.'</b></span></p>
										<p><span>Estimated Monthly Revenue Max</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Max.'</b></span></p>
		
										<a class="apply applyNow" href="'.$href.'"> Apply now 4</a>
							</div>';
				}
			// 3
			if($data['usa']== NULL and $data['eu'] != NULL and $data['international'] == NULL )
				{
					$setdefault = $data['eu'];
					
					 $Impression_for_mat = number_format($data['dailyadimpression'],2,",",".");
			        $arr = explode('.',$Impression_for_mat);
			        if($data['dailyadimpression'] > 1000 )
			        {
			        	$Impression = $arr[0] ; 
			        }else  if($data['dailyadimpression'] < 1000 )
			        {
			        	$Impression = 0;
			        }
			        if($data['dailyadimpression'] == 1000)
			        {
			        	$Impression = 1 ;
			        }
			        
			        $website = $data['website'];
			        $ECPMMIN = 0.3;
			        $ECPMMAX = 2;
			        $Estimated_Daily_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Daily_Revenue_Max = $ECPMMAX * $Impression;
			        
			        $Estimated_Monthly_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Monthly_Revenue_Max = $ECPMMAX * $Impression*30;
			        
			        
			        
			        
					$text ='<div id="price" class="cochu" style="display: block;">
					<p><span>impressions </span>:<span class="colorprice" id="dailyadimpressionresilt"><b> '.$Impression_for_mat.'</b></span>  </p>
										<p><span>Your ECPM Min:</span><span class="colorprice"><b>$'.$ECPMMIN.'</b></span></p>
										<p><span>Your ECPM Max:</span><span class="colorprice"><b>$'.$ECPMMAX.'</b></span></p>
		
										<p><span>Estimated Daily Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Min.'</b></span></p>
										<p><span>Estimated Daily Revenue max</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Max.'</b></span></p>
		
										<p><span>Estimated Monthly Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Min.'</b></span></p>
										<p><span>Estimated Monthly Revenue Max</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Max.'</b></span></p>
		
										<a class="apply applyNow" href="'.$href.'"> Apply now 3</a>
							</div>';
				}
			//2
			if($data['usa']== NULL and $data['eu'] == NULL and $data['international'] != NULL )
				{
					$setdefault = $data['international'];
					
					 $Impression_for_mat = number_format($data['dailyadimpression'],2,",",".");
			        $arr = explode('.',$Impression_for_mat);
			        if($data['dailyadimpression'] > 1000 )
			        {
			        	$Impression = $arr[0] ; 
			        }else  if($data['dailyadimpression'] < 1000 )
			        {
			        	$Impression = 0;
			        }
			        if($data['dailyadimpression'] == 1000)
			        {
			        	$Impression = 1 ;
			        }
			        
			        $website = $data['website'];
			        $ECPMMIN = 0.1;
			        $ECPMMAX = 1;
			        $Estimated_Daily_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Daily_Revenue_Max = $ECPMMAX * $Impression;
			        
			        $Estimated_Monthly_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Monthly_Revenue_Max = $ECPMMAX * $Impression*30;
			        
			        
			        
			        
					$text ='<div id="price" class="cochu" style="display: block;">
					<p><span>impressions </span>:<span class="colorprice" id="dailyadimpressionresilt"><b> '.$Impression_for_mat.'</b></span>  </p>
										<p><span>Your ECPM Min:</span><span class="colorprice"><b>$'.$ECPMMIN.'</b></span></p>
										<p><span>Your ECPM Max:</span><span class="colorprice"><b>$'.$ECPMMAX.'</b></span></p>
		
										<p><span>Estimated Daily Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Min.'</b></span></p>
										<p><span>Estimated Daily Revenue max</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Max.'</b></span></p>
		
										<p><span>Estimated Monthly Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Min.'</b></span></p>
										<p><span>Estimated Monthly Revenue Max</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Max.'</b></span></p>
		
										<a class="apply applyNow" href="'.$href.'"> Apply now 2</a>
							</div>';
				}
			// 1
			if($data['usa']== NULL and $data['eu'] == NULL and $data['international'] == NULL )
				{
					$data['usa'] = 0.3;
					$setdefault = $data['usa'];
					 $Impression_for_mat = number_format($data['dailyadimpression'],2,",",".");
			        $arr = explode('.',$Impression_for_mat);
			        if($data['dailyadimpression'] > 1000 )
			        {
			        	$Impression = $arr[0] ; 
			        }else  if($data['dailyadimpression'] < 1000 )
			        {
			        	$Impression = 0;
			        }
			        if($data['dailyadimpression'] == 1000)
			        {
			        	$Impression = 1 ;
			        }
			        
			        $website = $data['website'];
			        $ECPMMIN = 0.3;
			        $ECPMMAX = 3;
			        $Estimated_Daily_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Daily_Revenue_Max = $ECPMMAX * $Impression;
			        
			        $Estimated_Monthly_Revenue_Min = $ECPMMIN * $Impression;
			        $Estimated_Monthly_Revenue_Max = $ECPMMAX * $Impression*30;
			        
			        
			        
			        
					$text ='<div id="price" class="cochu" style="display: block;">
					<p><span>impressions </span>:<span class="colorprice" id="dailyadimpressionresilt"><b> '.$Impression_for_mat.'</b></span>  </p>
										<p><span>Your ECPM Min:</span><span class="colorprice"><b>$'.$ECPMMIN.'</b></span></p>
										<p><span>Your ECPM Max:</span><span class="colorprice"><b>$'.$ECPMMAX.'</b></span></p>
		
										<p><span>Estimated Daily Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Min.'</b></span></p>
										<p><span>Estimated Daily Revenue max</span>:<span class="colorprice"><b>$'.$Estimated_Daily_Revenue_Max.'</b></span></p>
		
										<p><span>Estimated Monthly Revenue Min</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Min.'</b></span></p>
										<p><span>Estimated Monthly Revenue Max</span>:<span class="colorprice"><b>$'.$Estimated_Monthly_Revenue_Max.'</b></span></p>
		
										<a class="apply applyNow" href="'.$href.'"> Apply now 1</a>
							</div>';
				}
				
				echo $text; die;
		
			}
			else{
			   echo  $text ='false'; die;
			}
	}
	
	public function estimatedAction()
	{
		$view= new ViewModel();
	   
    	$this->layout ( 'layout/bags' );
		 
		
		return $view;
	}
	
	public function deleteAction() {
		$this->layout ( 'layout/bags' );
		$id = $this->params ()->fromRoute ( 'id', 0 );
		if ($id != 0) {
			$this->getServiceLocator ()->get ( 'ProductTable' )->delete ( $id );
			return $this->redirect ()->toRoute ( 'Product', array (
					'controller' => 'product',
					'action' => 'list-news' 
			) );
		}
	}
	public function upload() {
		$adapter = new \Zend\File\Transfer\Adapter\Http ();
		$fileImage = "file-" . rand ( 100, 999 ) . ".png";
		foreach ( $adapter->getFileInfo () as $info ) {
			if ($info ['name'] != null) {
				$adapter->addFilter ( 'File\Rename', array (
						'target' => 'public/uploads/' . $fileImage,
						'overwrite' => true 
				), $info ['name'] );
				$adapter->receive ( $info ['name'] );
			}
		}
		return $fileImage;
	}
}
