<?php
namespace Main\Form;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;
use Zend\Session\Container;
class UploadForm extends Form
{
    protected $data=array();
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        //$this->addElements();
        $this->addInputFilter();
    }

    public function addElements($id)
    {
        // File Input
        $this->data=$id;
        $file = new Element\File('seriecode');
        $file->setLabel('Video Mp4 Upload: ')
             ->setAttribute('id', 'seriecode')
			 ->setAttribute('class', 'form-control')
			 ->setAttribute('title', 'File Upload')
             ->setAttribute('multiple', true);   // That's it
        $this->add($file);
        $title= new Element\Text('title');
        $title->setLabel('Title')
			  ->setAttribute('class', 'form-control')
              ->setAttribute('id','title');
        $this->add($title);
        $cata= new Element\Select('catelog');
        $cata->setLabel('Catelog: ');
		$cata->setAttribute('class', 'form-control');
            $cata->setValueOptions($this->data);
        $this->add($cata);
		$tags=new Element\Text('tags');
        $tags->setLabel('Tags: ')
				->setAttribute('id', 'tag')
				->setAttribute('class', 'form-control')
				->setAttribute('class', 'form-control');
        $this->add($tags);
        $des=new Element\Textarea('description');
        $des->setLabel('Description: ');
		$des->setAttribute('class', 'form-control');
        $this->add($des);
        
              
   }
    
    public function addInputFilter()
    {
        $inputFilter = new InputFilter\InputFilter();

        // File Input
       $title= sprintf("%.0f ", microtime(true)*20000);
       $title=str_replace(' ','',$title);
         //$title=(float) microtime(true)*20000;
        $fileInput = new InputFilter\FileInput('seriecode');
        $fileInput->setRequired(true);
		
		

        // You only need to define validators and filters
        // as if only one file was being uploaded. All files
        // will be run through the same validators and filters
        // automatically.
        $fileInput->getValidatorChain()
            ->attachByName('filesize',      array('max' => 500000000))
			
           // ->attachByName('filemimeType',  array('mimetype' =>'video/m4v'))
			->attachByName('filemimetype',  array('mimeType' =>'video/mp4'));
		
		

        // All files will be renamed, i.e.:
        //   ./data/tmpuploads/avatar_4b3403665fea6.png,
        //   ./data/tmpuploads/avatar_5c45147660fb7.png
		$name=md5(date('ymd'));
		if (!file_exists('temp/data/tmpuploads/videos/'.$name)) 
        {
            mkdir('temp/data/tmpuploads/videos/'.$name, 0777, true);
        }
		$fileInput->getFilterChain()->attachByName(
            'filerenameupload',
            array(
                'target'    => './temp/data/tmpuploads/videos/'.$name.'/',
                'randomize' => true,
            )
        );   

        $inputFilter->add($fileInput);
        $this->setInputFilter($inputFilter);
    }
}
?>