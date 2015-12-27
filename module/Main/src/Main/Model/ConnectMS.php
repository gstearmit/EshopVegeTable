<?php
namespace Main\Model;
Class ConnectMS
{
	protected $session;
	//protected $params;
	
	public function __construct($exter)
	{			//var_dump($exter);				
		$apikey = $exter->appkey;
		$appid = $exter->appid;
		$email = $exter->user;
		$passwd = $exter->passwd;
		
		$params= http_build_query(array(
				   'email' => $email,
				   'password'=> $passwd,
				   'application_id' => $appid,
				   'signature' => sha1("$email$passwd$appid$apikey"),
				   'token_version'=>'1',
				   'response_format' => 'json'
				));
				//var_dump($params);
		$fp = fopen('https://www.mediafire.com/api/user/get_session_token.php?'.$params, 'r');
		if($fp!==false){
			$json = stream_get_contents($fp);
			$obj = json_decode($json);
			fclose($fp);
			//var_dump($obj);
			$session = $obj->response;
			//echo $session;
			return $this->session=$session;
		}
		return $this->session=1;
	
	}
	//public $info_login;
	public function get_folder_key($name,$folder_key='')
	{
		if(!$folder_key)
		{
			$params= http_build_query(array(
							   'session_token' => $this->session->session_token,
							   'response_format' => 'json'
							));
		}
		else
		{
				$params= http_build_query(array(
					   'session_token' => $this->session->session_token,
					   'response_format' => 'json',
					   'folder_key' =>$folder_key,
					));
		}
		$link='http://www.mediafire.com/api/folder/get_content.php?'.$params;
		$fp = fopen($link, 'r');
		$json = stream_get_contents($fp);
		$obj = json_decode($json);
		fclose($fp);
		$folder=$obj->response->folder_content->folders;
		foreach($folder as $value)
		{
			if($value->name=$name)$vidkey=$value->folderkey;
		}
		if(isset($vidkey))return $vidkey;
		else return 0;	
	}
	public function creat_folder($name,$parent='')
	{	
		if(!$parent){
			$params=http_build_query(array(
					"session_token" => $this->session->session_token,		
					"foldername"=>$name,		
					'response_format' => 'json',
					'allow_duplicate_key'=>'yes',
				));
		}else
		{
			$params=http_build_query(array(
					"session_token" => $this->session->session_token,		
					"foldername"=>$name,		
					'response_format' => 'json',
					'allow_duplicate_key'=>'yes',
					'parent_key'  =>$parent,
				));
		}
		
		$link='http://www.mediafire.com/api/folder/create.php?'.$params;
		$fp = fopen($link, 'r');
		$json = stream_get_contents($fp);
		$obj = json_decode($json);
		fclose($fp);
		//return $obj;
		$folder=$obj->response;
		return $folder;

	}
	public function search($name,$folder_key='')
	{
		if($folder_key){

				$params= http_build_query(array(
					   'session_token' => $this->session->session_token,
					   
					   'folder_key' =>$folder_key,
					   'search_text' =>$name,

					   'response_format' => 'json'
					));
					}
		else
		{
							$params= http_build_query(array(
					   'session_token' => $this->session->session_token,					   

					   'search_text' =>$name,

					   'response_format' => 'json'
					));
		}
		
		$link='http://www.mediafire.com/api/folder/search.php?'.$params;
		//echo $link;
		$fp = fopen($link, 'r');
		if($fp!==false){
			$json = stream_get_contents($fp);
			$obj = json_decode($json);
			fclose($fp);			
		}else $obj=false;
		return $obj;
		
	}
	
	
	
	public function add_web_upload($file)
	{
		//$tmpk1=(int) $this->session->secret_key;
		//$k1=($tmpk1*16807)%256;
		//$presig= $k1.$this->session->time.'/api/upload/add_web_upload.php?session_token='.$this->session->session_token;
		//echo $presig;
		$signature=md5($presig);
		$params = http_build_query(array(
			"session_token"				=> $this->session->session_token,
			"url"						=>$file['url'],
			"filename"					=>$file['filename'],
			"folder_key"				=>$file['folder_key'],
			//"signature"					=>$signature,
			'response_format' 			=> 'json'
		));
		$link='http://www.mediafire.com/api/upload/add_web_upload.php?'.$params;
		$fp = fopen($link, 'r');
		$json = stream_get_contents($fp);
		$obj = json_decode($json);
		fclose($fp);
		return $obj;
	}
	public function check()
	{
		$params = http_build_query(array(
			"session_token" 		=>$this->session->session_token,
			"all_web_uploads" 		=>"yes",
			'response_format' 		=> 'json'
		));
		$link='http://www.mediafire.com/api/upload/get_options.php?'.$params;
		$fp = fopen($link, 'r');
		$json = stream_get_contents($fp);
		$obj = json_decode($json);
		fclose($fp);
		//var_dump($obj);
		return $obj->response;
	}
	public function instant($file)
	{
		$params = http_build_query(array(
			"session_token" 		=>$this->session->session_token,
			"filename" 				=>$file['filename'],
			"folder_key" 			=>$file['folder_key'],
			"hash" 					=>$file['hash'],
			"size" 					=>$file['size'],
			//"all_web_uploads" 		=>"yes",
			'response_format' 		=> 'json'
		));
		$link='http://www.mediafire.com/api/upload/instant.php?'.$params;
		$fp = fopen($link, 'r');
		$json = stream_get_contents($fp);
		$obj = json_decode($json);
		fclose($fp);
		//var_dump($obj);
		return $obj->response->quickkey;
	}
	public function get_link($quickkey)
	{
		$params = http_build_query(array(
			"session_token" 		=>$this->session->session_token,
			"link_type"				=>"direct_download",
			"quick_key"				=>$quickkey,
			'response_format' 		=> 'json',
		));
		$link='http://www.mediafire.com/api/file/get_links.php?'.$params;
		$fp = fopen($link, 'r');
		$json = stream_get_contents($fp);
		$obj = json_decode($json);
		fclose($fp);
		return $obj->response->links[0]->direct_download;
	}
	 
}
?>