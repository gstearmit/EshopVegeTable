<?php
namespace Main\Form;
use Main\Controller\IndexController;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;
use Zend\Session\Container;
class LoginForm extends Form
{

    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        //$this->addElements();
        //$this->addInputFilter();
        $this->setId();
    }
    public function setId(){
        $username= new Element\Text('username');
        $username->setLabel('User name');
            $username->setAttribute('id','username');
        $this->add($username);

        $password= new Element\Password('Password');
        $password->setLabel('Password');
            $password->setAttribute('id','password');
        $this->add($password);

    }

}
?>