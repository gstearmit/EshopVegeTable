<?php
namespace Crowler\Model;
use Crowler\Model\Crowler;
// use DOMDocument;
// use DOMXPath;
// use DOMNode;
// use Zend\Stdlib\ErrorHandler;
// use Zend\Dom\Query;
// use Crowler\Model\Database;

@ob_start ();
class Crowler {
	static $items = array ();
	public function __construct() {
	}
	public function test()  { return 99; } 
	public static function get_site($cond = 1) {
		
// 		$sqlserver="localhost";
// 		$sqluser="root";
// 		$sqlpassword="";
// 		$dbname="rohlikcz";
		
// 		$sqlserver = (isset($sqlserver) and $sqlserver) ? $sqlserver:'';
// 		$sqluser   =  (isset($sqluser) and $sqluser) ? $sqluser:'';
// 		$sqlpassword = (isset($sqlpassword) and $sqlpassword) ? $sqlpassword:'';
// 		$dbname = (isset($dbname) and $dbname) ? $dbname:'';
// 		//$db = new DB($sqlserver, $sqluser, $sqlpassword, $dbname);

		//return "phuc---".$sqlserver.'---'.$sqluser.'-----'.$sqlpassword.'---'.$dbname;
		//return "phuc----".$cond;

// 		$data = new Database($sqlserver, $sqluser, $sqlpassword, $dbname);
		$data = new Database();
	   // return "trave nay :--- ".$data->DB();
	    
		return $data->fetch_all ( '
			SELECT
				declaration.*
			FROM
				declaration
			WHERE
				' . $cond . '
			ORDER BY
				declaration.id DESC
		' );
	}
	
	public static function feed_data($cmd ,$dir_tmp_cache,$temps) {
		
		// cmd = insert_database
		if ($cmd == 'insert_database') {
			$dir = 'cache/temp_data.cache.php';
			if (file_exists ( $dir )) {
				require $dir;
				if (isset ( $items ) and $items) {
					foreach ( $items as $key => $value ) {
						// Feed::debug($value);
						$table = $value ['table'];
						if (! DB::fetch ( 'select id from ' . $table . ' where name="' . str_replace ( '"', '\"', $value ['name'] ) . '"' )) {
							unset ( $value ['table'] );
							DB::insert ( $table, $value );
						}
					}
					@unlink ( $dir );
				}
			}
			header ( 'Location:' . $_SERVER ['REQUEST_URI'] );
		} else
			
		// Case lay du lieu
	
		if($cmd == 'feed') {
			// Lấy tin
			$temps = implode ( ',', $temps );
			
			//require_once 'lib/simple_html_dom.php';
			//require_once 'lib/crawler.php';
			
			$_Feed = new Crowler(); // return $_Feed;
			$sites = $_Feed->get_site ( 'declaration.id in (' . $temps . ')' );
			
			return $sites;
			
			
			if ($sites = $_Feed::get_site ( 'declaration.id in (' . $temps . ')' )) 			// lay thong tin website can lay qua id tu bang site : tra ce 1 mang cac field cua bang do
			                                                               // Array
			                                                               // (
			                                                               // [21] => Array
			                                                               // (
			                                                               // [id] => 21
			                                                               // [name] => Sá»©c Máº¡nh Sá»‘ - DÃ¢n TrÃ­
			                                                               // [host] => http://dantri.com.vn/
			                                                               // [url] => http://dantri.com.vn/suc-manh-so.htm
			                                                               // [extra] => a.fon6
			                                                               // [table_name] => news
			                                                               // [image_pattern] => img.img130
			                                                               // [image_content_left] =>
			                                                               // [image_content_right] =>
			                                                               // [pattern_bound] => .mt3
			                                                               // [category_id] => 7
			                                                               // [page_num] => 1-15
			                                                               // [image_dir] => upload
			                                                               // [begin] =>
			                                                               // [end] =>
			                                                               // )
			                                                               
			// )
			{
				// Feed::debug($sites);
				foreach ( $sites as $key => $value ) {
					$check_page = strpos ( $value ['url'], '*' ); // strpos : tim kiem chuoi
					if ($check_page === false) {
						
						Feed::get_data ( $value, Feed::get_pattern ( $key ) );
					} else {
						if ($page_num = $value ['page_num']) {
							$check_page_num = strpos ( $page_num, '-' );
							if ($check_page_num === false) {
								$value ['url'] = str_replace ( '*', $page_num, $value ['url'] );
								Feed::get_data ( $value, Feed::get_pattern ( $key ) );
							} else {
								$arr_page = explode ( '-', $page_num );
								for($i = $arr_page [1]; $i >= $arr_page [0]; $i --) {
									$site = $value;
									$site ['url'] = str_replace ( '*', $i, $value ['url'] );
									Feed::get_data ( $site, Feed::get_pattern ( $key ) );
								}
							}
						} else {
							$value ['url'] = str_replace ( '*', '1', $value ['url'] );
							Feed::get_data ( $value, Feed::get_pattern ( $key ) );
						}
					}
				}
				
				// Lưu tin đã lấy vào file cache
				$path = 'cache/temp_data.cache.php';
				$content = '<?php $items = ' . var_export ( Feed::$items, true ) . ';?>';
				$handler = fopen ( $path, 'w+' );
				fwrite ( $handler, $content );
				fclose ( $handler );
			}
			header ( 'Location:' . $_SERVER ['REQUEST_URI'] );
		}
	}
	
}
