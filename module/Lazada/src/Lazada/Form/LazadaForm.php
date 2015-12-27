<?php
namespace Lazada\Form;
use Lazada\Controller\IndexController;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;
use Zend\Session\Container;

//sql data
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
//adapter
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Adapter;

class LazadaForm extends Form
{
    protected $data=array();
    protected $id;
    protected $adapter;
    protected $tags = array();
    protected $manufacturer = array();
    public function __construct(AdapterInterface $dbAdapter ,$id = Null)
    {
    	$this->adapter =$dbAdapter;
    	$this->id = (int)$id;
        parent::__construct('product');
        $this->addElements();
      
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');
        $this->setAttribute('enctype', 'multipart/form-data');
       
        //$this->setId($id);
        $this->add(array(
        		'name' => 'submit',
        		'attributes' => array(
        				'type'  => 'submit',
        				'value' => 'Edit',
        				'id' => 'submitbutton',
        				'class'=>"btn btn-primary",
        		),
        ));
    }
    
    public function addElements()
    {
    	$id=new Element\Text('id');
    	$id->setLabel('ID')
    	->setAttribute('class','form-control')
    	// ->setAttribute('required','true')
    	->setAttribute('type','hidden');
    	$this->add($id);
    	
    	$rating=new Element\Number('rating');
    	$rating->setLabel('Rating .Max = 5 (Good) , Min=0 (no rating)')
    	->setAttribute('class','form-control')
    	// ->setAttribute('required','true')
    	->setAttribute('type','hidden');
    	$this->add($rating);
    	
    	
    	
    	$name = new Element\Text('name');
    	$name->setLabel('Lazada name')
    	->setAttribute('class','form-control')
    	->setAttribute('required','true')
    	->setAttribute('onchange','get_alias();')
    	->setAttribute('id', 'name');
    	$this->add($name);
    	
    	$alias = new Element\Text('alias');
    	$alias->setLabel('Lazada alias')
    	->setAttribute('required','true')
    	->setAttribute('class','form-control')
    	->setAttribute('id', 'alias');
    	$this->add($alias);
    	
    	$availability = new Element\Number('availability');
    	$availability->setLabel('Availability')
    	->setAttribute('class','form-control')
    	->setAttribute('required','true')
    	->setAttribute('id', 'availability');
    	$this->add($availability);
    	
    	$descripts= new Element\Textarea('description');
    	$descripts->setLabel('Description short')
    	->setAttribute('class','form-control')
    	->setAttribute('id', 'descripts');
    	$this->add($descripts);
    	 
    	$description= new Element\Textarea('detail_product');
    	$description->setLabel('Detail Lazada')
    	->setAttribute('class','form-control')
    	->setAttribute('id', 'detail_product');
    	$this->add($description);
    	
    	$hot= new Element\Radio('hot');
    	$hot->setLabel('Choice hot')
    	->setValueOptions(
    			array(
    					'0' => 'No Hot',
    					'1' => 'Hot', ))
    					->setAttribute('id', 'hot');
    	$this->add($hot);
    	
    	
    	 
    	$promotions = new Element\Number('promotions');
    	$promotions->setLabel('Promotions')
    	->setAttribute('class','form-control')
    	//->setAttribute('required','true')
    	->setAttribute('id', 'promotions');
    	$this->add($promotions);
    	
    	$new= new Element\Radio('new');
    	$new->setLabel('Choice new')
    	->setValueOptions(
    			array(
    					'0' => 'No New',
    					'1' => 'New', ))
    					->setAttribute('id', 'new');
    	$this->add($new);
    	
    	$status= new Element\Radio('status');
    	$status->setLabel('status')
    	->setAttribute('required','true')
    	->setValueOptions(
    			array(
    					'0' => 'Pause',
    					'1' => 'Active', ))
    					->setAttribute('id', 'status');
    	$this->add($status);
    	
    	$about_price = new Element\Number('about_price');
    	$about_price->setLabel('About Price')
    	->setAttribute('class','form-control')
    	->setAttribute('id', 'about_price');
    	$this->add($about_price);
    	
    	
    	$weekly_featured= new Element\Radio('weekly_featured');
    	$weekly_featured->setLabel('Weekly featured')
    	//->setAttribute('required','true')
    	->setValueOptions(
    			array(
    					'0' => 'No',
    					'1' => 'Yes', ))
    	->setAttribute('id', 'weekly_featured');
    	$this->add($weekly_featured);
    	
    	$featured_products= new Element\Radio('featured_products');
    	$featured_products->setLabel('Featured Lazadas')
    	//->setAttribute('required','true')
    	->setValueOptions(
    			array(
    					'0' => 'No',
    					'1' => 'Yes', ))
    					->setAttribute('id', 'featured_products');
    	$this->add($featured_products);
    	
    	
    	
    	$new_products= new Element\Radio('new_products');
    	$new_products->setLabel('New Lazadas')
    	//->setAttribute('required','true')
    	->setValueOptions(
    			array(
    					'0' => 'No',
    					'1' => 'Yes', ))
    					->setAttribute('id', 'new_products');
    	$this->add($new_products);
    	
    	
    	$sale_products= new Element\Radio('sale_products');
    	$sale_products->setLabel('Sale Lazadas')
    	//->setAttribute('required','true')
    	->setValueOptions(
    			array(
    					'0' => 'No',
    					'1' => 'Yes', ))
    					->setAttribute('id', 'sale_products');
    	$this->add($sale_products);
    	
    	
    	
    	
    	
    	$img= new Element\File('img');
    	$img->setLabel('file img (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img');
    	$this->add($img);
    	
    	$img1= new Element\File('img1');
    	$img1->setLabel('file img1 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img1');
    	$this->add($img1);
    	
    	
    	$img2= new Element\File('img2');
    	$img2->setLabel('file img2 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img2');
    	$this->add($img2);
    	
    	$img3= new Element\File('img3');
    	$img3->setLabel('file img3 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img3');
    	$this->add($img3);
    	
    	$img4= new Element\File('img4');
    	$img4->setLabel('file img4 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img4');
    	$this->add($img4);
    	
    	
    	$img5= new Element\File('img5');
    	$img5->setLabel('file img5 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img5');
    	$this->add($img5);
    	
    	$img6= new Element\File('img6');
    	$img6->setLabel('file img6 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img6');
    	$this->add($img6);
    	
    	
    	$img7= new Element\File('img7');
    	$img7->setLabel('file img7 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img7');
    	$this->add($img7);
    	
    	$img8= new Element\File('img8');
    	$img8->setLabel('file img8 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img8');
    	$this->add($img8);
    	
    	$img9= new Element\File('img9');
    	$img9->setLabel('file img9 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img9');
    	$this->add($img9);
    	
    	
    	$img10= new Element\File('img10');
    	$img10->setLabel('file img10 (* not support .png , .gif)')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img10');
    	$this->add($img10);
    	
    	
    	
    }
    
    
    public function setId($ids){
        $this->data= $ids;
		
        $cata= new Element\Select('cat_id');
        $cata->setLabel('Parent')
			->setAttribute('class','form-control')
            ->setValueOptions($this->data);
        $this->add($cata);
        
       
    }
    
    public function settagsId($ids){
    	$this->tags= $ids;
    
    	$tags= new Element\Select('tag_id');
    	$tags->setLabel('Tags ')
    	->setAttribute('class','form-control')
    	->setValueOptions($this->tags);
    	$this->add($tags);
    
    	 
    }
    
    
    public function setmanufacturerId($ids){
    	$this->manufacturer= $ids;
    
    	$manufacturer= new Element\Select('manufacturer_id');
    	$manufacturer->setLabel('Manufacturer ')
    	->setAttribute('class','form-control')
    	->setValueOptions($this->manufacturer);
    	$this->add($manufacturer);
    
    
    }
  

}
?>