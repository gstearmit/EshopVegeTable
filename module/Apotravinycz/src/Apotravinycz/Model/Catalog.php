<?php

namespace Apotravinycz\Model;

// Add these import statements
//use Zend\InputFilter\InputFilter;
//use Zend\InputFilter\Factory as InputFactory;
//use Zend\InputFilter\InputFilterAwareInterface;
//use Zend\InputFilter\InputFilterInterface;

class Catalog  {

    public $id;
    public $name;
    public $parent;
    public $child;
    public $date_creat;
    public $date_modified;
    public $hot;
    public $status;
    public $new;
    public $alias;
    public $img;
    public $description;
    public $show_index;
   

    public function exchangeArray($data) {
        $this->id = (isset($data ['id'])) ? $data ['id'] : null;
        $this->name = (isset($data ['name'])) ? $data ['name'] : null;        
        $this->parent = (isset($data ['parent'])) ? $data ['parent'] : null;
        $this->child = (isset($data ['child'])) ? $data ['child'] : null;
        $this->date_creat = (isset($data ['date_creat'])) ? $data ['date_creat'] : null;
        $this->date_modified = (isset($data ['date_modified'])) ? $data ['date_modified'] : null;
        $this->hot = (isset($data ['hot'])) ? $data ['hot'] : null;
        $this->status = (isset($data ['status'])) ? $data ['status'] : null;
        $this->new = (isset($data ['new'])) ? $data ['new'] : null;
        $this->alias = (isset($data ['alias'])) ? $data ['alias'] : null;
        $this->img = (isset($data ['img'])) ? $data ['img'] : null;
        $this->description = (isset($data ['description'])) ? $data ['description'] : null;
        $this->show_index = (isset($data ['show_index'])) ? $data ['show_index'] : null;
    }

    

}

?>