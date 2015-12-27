<?php

namespace Apotravinycz\Model;

// use Zend\InputFilter\InputFilter;
// use Zend\InputFilter\Factory as InputFactory;
// use Zend\InputFilter\InputFilterAwareInterface;
// use Zend\InputFilter\InputFilterInterface;

class Apotravinyczproduct  { 
    public $id;
    public $name;
    public $descripts;
    public $detail_product;
    public $cat_id;
    public $new;
    public $hot;
    public $promotions;
    public $price;
    public $rating;
    public $availability;
    public $tag_id;
    public $manufacturer_id;
    public $date_creat;
    public $date_change;
    public $user_id;
    public $status;
    public $about_price;
    public $weekly_featured;
    public $featured_products;
    public $new_products;
    public $sale_products;
    public $most_viewed;
    public $lastest_products;
    public $array_img;
    public $img;
    public $img1;
    public $img2;
    public $img3;
    public $img4;
    public $img5;
    public $img6;
    public $img7;
    public $img8;
    public $img9;
    public $img0;
  

    function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->descripts = (isset($data['descripts'])) ? $data['descripts'] : null;
        $this->detail_product = (isset($data['detail_product'])) ? $data['detail_product'] : null;
        $this->cat_id = (isset($data['cat_id'])) ? $data['cat_id'] : null;
        $this->new = (isset($data['new'])) ? $data['new'] : null;
        $this->hot = (isset($data['hot'])) ? $data['hot'] : null;
        $this->promotions = (isset($data['promotions'])) ? $data['promotions'] : null;
        $this->price = (isset($data['price'])) ? $data['price'] : null;
        $this->rating = (isset($data['rating'])) ? $data['rating'] : null;
        $this->availability = (isset($data['availability'])) ? $data['availability'] : null;
        $this->tag_id = (isset($data['tag_id'])) ? $data['tag_id'] : null;
        $this->manufacturer_id = (isset($data['manufacturer_id'])) ? $data['manufacturer_id'] : null;
        $this->date_creat = (isset($data['date_creat'])) ? $data['date_creat'] : null;
        $this->date_change = (isset($data['date_change'])) ? $data['date_change'] : null;
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
        $this->about_price = (isset($data['about_price'])) ? $data['about_price'] : null;
        $this->weekly_featured = (isset($data['weekly_featured'])) ? $data['weekly_featured'] : null;
        $this->featured_products = (isset($data['featured_products'])) ? $data['featured_products'] : null;
        $this->new_products = (isset($data['new_products'])) ? $data['new_products'] : null;
        $this->sale_products = (isset($data['sale_products'])) ? $data['sale_products'] : null;
        $this->most_viewed = (isset($data['most_viewed'])) ? $data['most_viewed'] : null;
        $this->lastest_products = (isset($data['lastest_products'])) ? $data['lastest_products'] : null;
        
        $this->array_img = (isset($data['array_img'])) ? $data['array_img'] : null;
        $this->img = (isset($data['img'])) ? $data['img'] : null;
        $this->img1 = (isset($data['img1'])) ? $data['img1'] : null;
        $this->img2 = (isset($data['img2'])) ? $data['img2'] : null;
        $this->img3 = (isset($data['img3'])) ? $data['img3'] : null;
        $this->img4 = (isset($data['img4'])) ? $data['img4'] : null;
        $this->img5 = (isset($data['img5'])) ? $data['img5'] : null;
        $this->img6 = (isset($data['img6'])) ? $data['img6'] : null;
        $this->img7 = (isset($data['img7'])) ? $data['img7'] : null;
        $this->img8 = (isset($data['img8'])) ? $data['img8'] : null;
        $this->img9 = (isset($data['img9'])) ? $data['img9'] : null;
        $this->img0 = (isset($data['img0'])) ? $data['img0'] : null;
         
    }
    
   
    

}
