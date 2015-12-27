<?php

namespace Crowler\Model;

// use Zend\InputFilter\InputFilter;
// use Zend\InputFilter\Factory as InputFactory;
// use Zend\InputFilter\InputFilterAwareInterface;
// use Zend\InputFilter\InputFilterInterface;

class Declaration  { //implements InputFilterAwareInterface
    public $id;
    public $product_code;
    public $name_id;
    public $host;
    public $url;
    public $page_taken;
    public $avatar_images;
    public $directoryavatar;
    public $product_name;
    public $product_price;
    public $product_images;
    public $product_descriptstion;
    public $detail_product_descriptstion;
    public $countryoforigin;
    public $product_promotion;
    public $product_href_detail;
   
    protected $inputFilter;

    function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->product_code = (isset($data['product_code'])) ? $data['product_code'] : null;
        $this->name_id = (isset($data['name_id'])) ? $data['name_id'] : null;
        $this->host = (isset($data['host'])) ? $data['host'] : null;
        $this->url = (isset($data['url'])) ? $data['url'] : null;
        $this->page_taken = (isset($data['page_taken'])) ? $data['page_taken'] : null;
        $this->avatar_images = (isset($data['avatar_images'])) ? $data['avatar_images'] : null;
        $this->directoryavatar = (isset($data['directoryavatar'])) ? $data['directoryavatar'] : null;
        $this->product_name = (isset($data['product_name'])) ? $data['product_name'] : null;
        $this->product_price = (isset($data['product_price'])) ? $data['product_price'] : null;
        $this->product_images = (isset($data['product_images'])) ? $data['product_images'] : null;
        $this->product_descriptstion = (isset($data['product_descriptstion'])) ? $data['product_descriptstion'] : null;
        $this->detail_product_descriptstion = (isset($data['detail_product_descriptstion'])) ? $data['detail_product_descriptstion'] : null;
        $this->countryoforigin = (isset($data['countryoforigin'])) ? $data['countryoforigin'] : null;
        $this->product_promotion = (isset($data['product_promotion'])) ? $data['product_promotion'] : null;
        $this->product_href_detail = (isset($data['product_href_detail'])) ? $data['product_href_detail'] : null;
       
    }
    
   

    public function getArrayCopy() {
        return get_object_vars($this);
    }
    
    
    public function getInputFilter() {
    
    }

}
