<?php

namespace Settings\Model;

class Settings {
    public $id;
    public $name;
    public $title;
    public $address;
    public $phone;
    public $mobile;
    public $fax;
    public $email;
    public $url;
    
    public $linkweb;
    public $keyword;
    public $description;
    public $created;
    public $modified;
    public $about;
    public $introduction;
    public $yahoo;
    public $skype;
    public $logo_footer;
    public $sologen;
    public $logo1;
    public $ico;
    public $facebook;
    public $facebook_text;
    public $tweets;
    public $tweets_text;
    public $github;
    public $google;
    public $feed;
    public $seo_keywords;
    public $seo_description;
    public $printerest;
    public $youtube_acount;
    
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : null;
        $this->address = (isset($data['address'])) ? $data['address'] : null;
        $this->phone = (isset($data['phone'])) ? $data['phone'] : null;
        $this->mobile = (isset($data['mobile'])) ? $data['mobile'] : null;
        $this->fax = (isset($data['fax'])) ? $data['fax'] : 0;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        
        $this->linkweb = (isset($data['linkweb'])) ? $data['linkweb'] : null;
        $this->keyword = (isset($data['keyword'])) ? $data['keyword'] : null;
        $this->description = (isset($data['description'])) ? $data['description'] : null;
        $this->created = (isset($data['created'])) ? $data['created'] : null;
        $this->modified = (isset($data['modified'])) ? $data['modified'] : 0;
        $this->about = (isset($data['about'])) ? $data['about'] : null;
        $this->introduction = (isset($data['introduction'])) ? $data['introduction'] : null;
        
        $this->yahoo = (isset($data['yahoo'])) ? $data['yahoo'] : null;
        $this->skype = (isset($data['skype'])) ? $data['skype'] : null;
        
        
        $this->logo1 = (isset($data['logo1'])) ? $data['logo1'] : null;
        $this->logo_footer = (isset($data['logo_footer'])) ? $data['logo_footer'] : null;
        
        $this->ico = (isset($data['ico'])) ? $data['ico'] : null;
        $this->sologen = (isset($data['sologen'])) ? $data['sologen'] : null;
        
        $this->facebook = (isset($data['facebook'])) ? $data['facebook'] : null;
        $this->facebook_text = (isset($data['facebook_text'])) ? $data['facebook_text'] : null;
        $this->tweets = (isset($data['tweets'])) ? $data['tweets'] : null;
        $this->tweets_txt = (isset($data['tweets_txt'])) ? $data['tweets_txt'] : null; 
        $this->github = (isset($data['github'])) ? $data['github'] : null;
        
        $this->google = (isset($data['google'])) ? $data['google'] : null;
        $this->feed = (isset($data['feed'])) ? $data['feed'] : null;
        
        $this->seo_description = (isset($data['seo_description'])) ? $data['seo_description'] : null;
        $this->seo_keywords = (isset($data['seo_keywords'])) ? $data['seo_keywords'] : null;
        
        $this->printerest = (isset($data['printerest'])) ? $data['printerest'] : null;
        $this->youtube_acount = (isset($data['youtube_acount'])) ? $data['youtube_acount'] : null;
      
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
