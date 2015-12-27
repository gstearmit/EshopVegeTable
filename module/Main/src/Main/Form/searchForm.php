<?php
namespace Main\Form;
use Main\Controller\IndexController;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;
use Zend\Session\Container;
class searchForm extends Form
{
    //protected $pre=array();
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->addElements();
        //$this->addInputFilter();
        //$this->setId($id);
    }
    public function addElements()
    {
       
        $search= new Element\Text('search');
        $search->setLabel('search');
        $search->setAttribute('id','search');
        $this->add($search);

    }

}
?>