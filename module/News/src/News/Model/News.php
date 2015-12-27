<?php

namespace News\Model;

class News {

    public $news_id;
    public $news_thumbnail;
    public $news_name;
    public $news_content;
    public $date_creat;
    public $date_mod;
    public $id_user;
    public $possition_view;
    public $url_static;
    public $status;
    public $silder;
    public $travel_corner;
    
    
    

    function exchangeArray($data) {
        $this->news_id = (isset($data['news_id'])) ? $data['news_id'] : null;
        $this->news_thumbnail = (isset($data['news_thumbnail'])) ? $data['news_thumbnail'] : null;
        $this->news_name = (isset($data['news_name'])) ? $data['news_name'] : null;
        $this->news_content = (isset($data['news_content'])) ? $data['news_content'] : null;
        $this->url_static = (isset($data['url_static'])) ? $data['url_static'] : null;
        
        $this->date_creat = (isset($data['date_creat'])) ? $data['date_creat'] : null;
        $this->date_mod = (isset($data['date_mod'])) ? $data['date_mod'] : null;
        $this->id_user = (isset($data['id_user'])) ? $data['id_user'] : null;
        $this->possition_view = (isset($data['possition_view'])) ? $data['possition_view'] : null;
        

        $this->status = (isset($data['status'])) ? $data['status'] : null;
        $this->silder = (isset($data['silder'])) ? $data['silder'] : null;
        $this->travel_corner = (isset($data['travel_corner'])) ? $data['travel_corner'] : null;
        

    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
