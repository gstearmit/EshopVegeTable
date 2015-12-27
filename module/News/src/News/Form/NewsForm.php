<?php

namespace News\Form;

use Zend\Form\Form;
use Zend\InputFilter;
use Zend\Form\Element;


class NewsForm extends Form {

    public function __construct($name = null) {
        parent::__construct('news-form');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data');

//         $this->add(array(
//             'name' => 'news_name',
//             'attributes' => array(
//                 'type' => 'text',
//                 'maxlength' => 250,
//                 'class' => 'form-control',
//                 //'required' => 'true',
//             	'onchange','get_static()',
//             ),
//             'options' => array(
//                 'label' => 'Title',
//             ),
//         ));
        
        $news_name= new Element\Text('news_name');
        $news_name->setLabel('Title:')
          ->setAttribute('class','Title')
          ->setAttribute('id','news_name')
          ->setAttribute('type','text')
          ->setAttribute('maxlength',250)
          ->setAttribute('class','form-control')
         ->setAttribute('onchange','get_static();')
          ->setAttribute('type','text');
        $this->add($news_name);
       
        $this->add(array(
        		'name' => 'url_static',
        		'attributes' => array(
        				'type' => 'text',
        				'id'=>'url_static',
        				'maxlength' => 250,
        				'class' => 'form-control',
        				//'required' => 'true',
        		),
        		'options' => array(
        				'label' => 'Static-url',
        		),
        ));
        
        $this->add(array(
            'name' => 'news_thumbnail',
            'attributes' => array(
                'type' => 'file',
                'class' => '',
                'accept' => '.jpg, .png, .gif, .jpeg, .JPG, .PNG, .GIF, .JPEG',
                //'required' => 'required',
            ),
            'options' => array(
                'label' => 'Thumbnail',
            ),
        ));

        $this->add(array(
            'name' => 'news_content',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'class' => 'form-control',
                'rows' => 5,
            ),
            'options' => array(
                'label' => 'Content'
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'security',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600
                )
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Save changes',
                'class' => 'btn btn-primary',
            ),
        ));
    }

}
