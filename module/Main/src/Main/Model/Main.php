<?php
namespace Main\Model;

 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Main implements InputFilterAwareInterface
 {
     public $id;
     public $title;
     public $seriecode;
     public $catelog;
     public $user_name;
     public $description;
	 public $tags;
	 public $duration;
     public $datetime;
     public $views;
     public $sticky;
     public $ads_pre;
     public $ads_mid;
     public $ads_bot;
     public $banner;
	 public $folder_key;
	 public $quick_key;
	 public $local_link;
	 public $imgfolder;
	 public $localsv_id;
	 public $externalsv_id;
	 public $external_link;
     protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->title = (isset($data['title'])) ? $data['title'] : null;
         $this->seriecode  = (isset($data['seriecode']))  ? $data['seriecode']  : null;
         $this->catelog  = (isset($data['catelog']))  ? $data['catelog']  : null;
         $this->description= (isset($data['description']))  ? $data['description']  : null;
		 $this->tags= (isset($data['tags']))  ? $data['tags']  : null;
         $this->user_name  = (isset($data['username']))  ? $data['username']  : null;
         $this->datetime  = (isset($data['datetime']))  ? $data['datetime']  : null;
         $this->views  = (isset($data['views']))  ? $data['views']  : null;
         $this->sticky  = (isset($data['sticky']))  ? $data['sticky']  : null;
		 $this->duration= (isset($data['duration']))  ? $data['duration']  : null;
         $this->ads_pre  = (isset($data['ads_pre']))  ? $data['ads_pre']  : null;   
         $this->ads_mid  = (isset($data['ads_mid']))  ? $data['ads_mid']  : null; 
         $this->ads_bot  = (isset($data['ads_bot']))  ? $data['ads_bot']  : null; 
         $this->banner  = (isset($data['banner']))  ? $data['banner']  : null;
		 $this->folder_key  = (isset($data['folder_key']))  ? $data['folder_key']  : null; 
		 $this->quick_key  = (isset($data['quick_key']))  ? $data['quick_key']  : null; 
		 $this->local_link  = (isset($data['local_link']))  ? $data['local_link']  : null; 
		 $this->imgfolder  = (isset($data['imgfolder']))  ? $data['imgfolder']  : null; 
		 $this->localsv_id  = (isset($data['localsv_id']))  ? $data['localsv_id']  : null; 
		 $this->externalsv_id  = (isset($data['externalsv_id']))  ? $data['externalsv_id']  : null;    
		$this->external_link  = (isset($data['external_link']))  ? $data['external_link']  : null;    		 
     }
  

     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }
     // Add the following method:
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }
      public function getInputFilter()
     {
     }
    
 }
 ?>