<?php
namespace Adminmaterialize\Form;


use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;
use Zend\Session\Container;
 class ChangeavaForm extends Form
 {
 	//protected $id;
 	  public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        //$this->addElements();
        $this->addInputFilter();
    }
   
 
    
         public function addInputFilter()
    {
        $inputFilter = new InputFilter\InputFilter();

        // File Input
         //$title=microtime(true)*20000;
        $fileInput = new InputFilter\FileInput('imagefile');
        $fileInput->setRequired(true);

        // You only need to define validators and filters
        // as if only one file was being uploaded. All files
        // will be run through the same validators and filters
        // automatically.
        //$validator = new \Zend\Validator\File\MimeType('image/gif,image/jpg,image/png');
        $fileInput->getValidatorChain()
            ->attachByName('filesize',      array('max' => 5480000))
            ->attachByName('filemimetype', array('mimeType' => 'image/png'));


        // All files will be renamed, i.e.:
        //   ./data/tmpuploads/avatar_4b3403665fea6.png,
        //   ./data/tmpuploads/avatar_5c45147660fb7.png
       /* $fileInput->getFilterChain()->attachByName(
            'filerenameupload',
            array(
                'target'    => './data/tmpuploads/123/',
                'randomize' => true,
            )
        );*/
        
         $name=1;

        if (!file_exists('eclip.tv/data/uploads/user/'.$name)) 
        {
            mkdir('eclip.tv/data/uploads/user/'.$name, 0777, true);
        }
        $fileInput->getFilterChain()->attach(new \Zend\Filter\File\Rename("eclip.tv/data/uploads/user/".$name.'/'.$title.".png"));
        

        $inputFilter->add($fileInput);

        $this->setInputFilter($inputFilter);
    }
 }
 ?>