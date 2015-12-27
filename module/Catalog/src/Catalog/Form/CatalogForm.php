<?php

namespace Catalog\Form;

use Catalog\Controller\IndexController;
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

class catalogForm extends Form {

    protected $data = array();
    protected $id;
    protected $adapter;

    public function __construct(AdapterInterface $dbAdapter, $id = Null) {
        $this->adapter = $dbAdapter;
        $this->id = (int) $id;
        parent::__construct('catalogue');
        $this->addElements();

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');
        $this->setAttribute('enctype', 'multipart/form-data');

        //$this->setId($id);
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Edit',
                'id' => 'submitbutton',
                'class' => "btn btn-primary",
            ),
        ));
    }

    public function addElements() {
        $id = new Element\Text('id');
        $id->setLabel('ID')
                ->setAttribute('class', 'form-control')
                // ->setAttribute('required','true')
                ->setAttribute('type', 'hidden');
        $this->add($id);

        $name = new Element\Text('name');
        $name->setLabel('catalog name')
                ->setAttribute('class', 'form-control')
                ->setAttribute('required', 'true')
                ->setAttribute('onchange', 'get_alias();')
                ->setAttribute('id', 'name');
        $this->add($name);

        $alias = new Element\Text('alias');
        $alias->setLabel('catalog alias')
                ->setAttribute('required', 'true')
                ->setAttribute('class', 'form-control')
                ->setAttribute('id', 'alias');
        $this->add($alias);

        
        $description = new Element\Textarea('description');
        $description->setLabel('Description')
                ->setAttribute('class', 'materialize-textarea form-control')
                ->setAttribute('id', 'description');
        $this->add($description);

        $hot = new Element\Radio('hot');
        $hot->setLabel('Choice hot')
                ->setValueOptions(
                        array(
                            '0' => 'No Hot',
                            '1' => 'Hot',))
                ->setAttribute('id', 'hot')
                ->setAttribute('class', 'radio_style');

        $this->add($hot);


        $new = new Element\Radio('new');
        $new->setLabel('Choice new')
                ->setValueOptions(
                        array(
                            '0' => 'No New',
                            '1' => 'New',))
                ->setAttribute('id', 'new')
                ->setAttribute('class', 'radio_style');
        $this->add($new);


        $status = new Element\Radio('status');
        $status->setLabel('status');
        //->setAttribute('required', 'true')
        $status->setValueOptions(
                        array(
                            '0' => 'Pause',
                            '1' => 'Active',))
                ->setAttribute('id', 'status')
                ->setAttribute('class', 'radio_style');

        $this->add($status);
        
         $show_index = new Element\Radio('show_index');
        $show_index->setLabel('show_index');
        //->setAttribute('required', 'true')
        $show_index->setValueOptions(
                        array(
                            '0' => 'No',
                            '1' => 'Yes',))
                ->setAttribute('id', 'show_index')
                ->setAttribute('class', 'radio_style');

        $this->add($show_index);


        $img = new Element\File('img');
        $img->setLabel('file img (* not support .png , .gif)')
                ->setAttribute('class', 'form-control')
                ->setAttribute('type', 'file')
                ->setAttribute('accept', '.jpg, .jpeg, .JPG, .JPEG') // .png, .gif .PNG, .GIF,
                ->setAttribute('id', 'img');
        $this->add($img);
    }

    public function setId($ids) {
        $this->data = $ids;

        $cata = new Element\Select('parent');
        $cata->setLabel('Parent')
                ->setAttribute('class', 'form-control')
                ->setValueOptions($this->data);
        $this->add($cata);
    }

}

?>