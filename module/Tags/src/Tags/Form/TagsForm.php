<?php
namespace Tags\Form;
use Tags\Controller\IndexController;
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

class TagsForm extends Form
{
    protected $data=array();
    protected $id;
    protected $adapter;
    public function __construct(AdapterInterface $dbAdapter ,$id = Null)
    {
    	$this->adapter =$dbAdapter;
    	$this->id = (int)$id;
        parent::__construct('Tags');
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
    	
    	$name = new Element\Text('name');
    	$name->setLabel('Tags name')
    	->setAttribute('class','form-control')
    	->setAttribute('required','true')
    	->setAttribute('onchange','get_alias();')
    	->setAttribute('id', 'name');
    	$this->add($name);
    	
    	$alias = new Element\Text('alias');
    	$alias->setLabel('Tags alias')
    	->setAttribute('required','true')
    	->setAttribute('class','form-control')
    	->setAttribute('id', 'alias');
    	$this->add($alias);
    	
    	
    	 
    	$description= new Element\Textarea('description');
    	$description->setLabel('Description')
    	->setAttribute('class','form-control materialize-textarea')
    	->setAttribute('id', 'description');
    	$this->add($description);
    	
    	
    	
    	$status= new Element\Radio('status');
    	$status->setLabel('status')
    	->setAttribute('required','true')
    	->setValueOptions(
    			array(
    					'0' => 'Pause',
    					'1' => 'Active', ))
    					->setAttribute('id', 'status');
    	$this->add($status);
    	
    	
    	$img= new Element\File('img');
    	$img->setLabel('file img (* not support .png , .gif) ')
    	->setAttribute('class','form-control')
    	->setAttribute('type', 'file')
    	->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
    	->setAttribute('id', 'img');
    	$this->add($img);
    }
    
    
    public function setId($ids){
        $this->data= $ids;
		
        $cata= new Element\Select('parent');
        $cata->setLabel('Parent')
			->setAttribute('class','form-control select-dropdown')
            ->setValueOptions($this->data);
        $this->add($cata);
        
       
    }
    
  

}
?>