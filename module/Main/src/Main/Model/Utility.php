<?php

namespace Main\Model;

class Utility {
	public function __construct() {
	}
	
	public function deburg($data)
	{
		echo "<pre>";
		print_r($data);
		echo "<pre>";
		die;
	}
	
	// echo _substr_co_nghia('Chao Mung Ban Den Voi Thu Thuat Web',7);
	// xuất ra màn hình là “Chao Mung…”
	function _substr_co_nghia($str, $length, $minword = 3) {
		$sub = '';
		$len = 0;
		foreach ( explode ( ' ', $str ) as $word ) {
			$part = (($sub != '') ? ' ' : '') . $word;
			$sub .= $part;
			$len += strlen ( $part );
			if (strlen ( $word ) > $minword && strlen ( $sub ) >= $length) {
				break;
			}
		}
		return $sub . (($len < strlen ( $str )) ? '...' : '');
	}
	public function _name_moth($_number) {
		if (! is_numeric ( $_number )) {
			return $name_moth = Null;
		}
		
		$_array_month = array (
				"01",
				"02",
				"03",
				"04",
				"05",
				"06",
				"07",
				"08" . "09",
				"10",
				"11",
				"12" 
		);
		$dictionary = array (
				'01' => 'January',
				'02' => 'February',
				'03' => 'March',
				'04' => 'April',
				'05' => 'May',
				'06' => 'June',
				'07' => 'July',
				'08' => 'August',
				'09' => 'September',
				'10' => 'October',
				'11' => 'November',
				'12' => 'December' 
		)
		;
		
		if (in_array ( $_number, $_array_month )) {
			$name_moth = $dictionary [$_number];
		} else {
			$name_moth = Null;
		}
		return $name_moth;
	}
	public function convert_number_to_word_month($number) {
		$hyphen = ' ';
		$conjunction = '  ';
		$separator = ' ';
		$negative = 'âm ';
		$decimal = ' phẩy ';
		$dictionary = array (
				1 => 'January',
				2 => 'February',
				3 => 'March',
				4 => 'April',
				5 => 'May',
				6 => 'June',
				7 => 'July',
				8 => 'August',
				9 => 'September',
				10 => 'October',
				11 => 'November',
				12 => 'December' 
		)
		;
		
		if (! is_numeric ( $number )) {
			return false;
		}
		
		if (($number >= 0 && ( int ) $number < 0) || ( int ) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error ( 'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING );
			return false;
		}
		
		if ($number < 0) {
			return $negative . convert_number_to_words ( abs ( $number ) );
		}
		
		$string = $fraction = null;
		
		if (strpos ( $number, '.' ) !== false) {
			list ( $number, $fraction ) = explode ( '.', $number );
		}
		
		switch (true) {
			case $number < 21 :
				$string = $dictionary [$number];
				break;
			case $number < 100 :
				$tens = (( int ) ($number / 10)) * 10;
				$units = $number % 10;
				$string = $dictionary [$tens];
				if ($units) {
					$string .= $hyphen . $dictionary [$units];
				}
				break;
			case $number < 1000 :
				$hundreds = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary [$hundreds] . ' ' . $dictionary [100];
				if ($remainder) {
					$string .= $conjunction . convert_number_to_words ( $remainder );
				}
				break;
			default :
				$baseUnit = pow ( 1000, floor ( log ( $number, 1000 ) ) );
				$numBaseUnits = ( int ) ($number / $baseUnit);
				$remainder = $number % $baseUnit;
				$string = convert_number_to_words ( $numBaseUnits ) . ' ' . $dictionary [$baseUnit];
				if ($remainder) {
					$string .= $remainder < 100 ? $conjunction : $separator;
					$string .= convert_number_to_words ( $remainder );
				}
				break;
		}
		
		if (null !== $fraction && is_numeric ( $fraction )) {
			$string .= $decimal;
			$words = array ();
			foreach ( str_split ( ( string ) $fraction ) as $number ) {
				$words [] = $dictionary [$number];
			}
			$string .= implode ( ' ', $words );
		}
		
		return $string;
	}
	
	// Lấy ngày cuối cùng của tháng
	public function lastday($month = '', $year = '') {
		if (empty ( $month )) {
			$month = date ( 'm' );
		}
		if (empty ( $year )) {
			$year = date ( 'Y' );
		}
		$result = strtotime ( "{$year}-{$month}-01" );
		$result = strtotime ( '-1 second', strtotime ( '+1 month', $result ) );
		return date ( 'Y-m-d', $result );
	}
	
	// first day of month
	// Lấy ngày đầu tiên của tháng chỉ định.
	public function firstDay($month = '', $year = '') {
		if (empty ( $month )) {
			$month = date ( 'm' );
		}
		if (empty ( $year )) {
			$year = date ( 'Y' );
		}
		$result = strtotime ( "{$year}-{$month}-01" );
		return date ( 'Y-m-d', $result );
	}
	public function _substr($str, $length) {
		$sub = '';
		$len = 0;
		$string = explode ( '-', $str );
		$i = 0;
		foreach ( $string as $key => $word ) {
			if (count ( $string ) < $length)
				break;
			if ($i > $length)
				break;
			if (count ( $string ) > $length and $i <= $length) {
				$sub .= $string [$i] . '-';
			}
			$i ++;
		}
		return $sub . ((count ( $string ) > $length) ? '...' : '');
	}
	public function formatDate($date, $showNow = true) {
		$date = trim ( $date );
		if (! $date && $showNow) {
			$date = 'now';
		}
		if ($date) {
			return date ( 'd/m/Y', strtotime ( $date ) );
		} else {
			return '';
		}
	}
	public function chuyenDoi($cs, $tolower = false) {
		/* Mảng chứa tất cả ký tự có dấu trong Tiếng Việt */
		$marTViet = array (
				"à",
				"á",
				"ạ",
				"ả",
				"ã",
				"â",
				"ầ",
				"ấ",
				"ậ",
				"ẩ",
				"ẫ",
				"ă",
				"ằ",
				"ắ",
				"ặ",
				"ẳ",
				"ẵ",
				"è",
				"é",
				"ẹ",
				"ẻ",
				"ẽ",
				"ê",
				"ề",
				"ế",
				"ệ",
				"ể",
				"ễ",
				"ì",
				"í",
				"ị",
				"ỉ",
				"ĩ",
				"ò",
				"ó",
				"ọ",
				"ỏ",
				"õ",
				"ô",
				"ồ",
				"ố",
				"ộ",
				"ổ",
				"ỗ",
				"ơ",
				"ờ",
				"ớ",
				"ợ",
				"ở",
				"ỡ",
				"ù",
				"ú",
				"ụ",
				"ủ",
				"ũ",
				"ư",
				"ừ",
				"ứ",
				"ự",
				"ử",
				"ữ",
				"ỳ",
				"ý",
				"ỵ",
				"ỷ",
				"ỹ",
				"đ",
				"À",
				"Á",
				"Ạ",
				"Ả",
				"Ã",
				"Â",
				"Ầ",
				"Ấ",
				"Ậ",
				"Ẩ",
				"Ẫ",
				"Ă",
				"Ằ",
				"Ắ",
				"Ặ",
				"Ẳ",
				"Ẵ",
				"È",
				"É",
				"Ẹ",
				"Ẻ",
				"Ẽ",
				"Ê",
				"Ề",
				"Ế",
				"Ệ",
				"Ể",
				"Ễ",
				"Ì",
				"Í",
				"Ị",
				"Ỉ",
				"Ĩ",
				"Ò",
				"Ó",
				"Ọ",
				"Ỏ",
				"Õ",
				"Ô",
				"Ồ",
				"Ố",
				"Ộ",
				"Ổ",
				"Ỗ",
				"Ơ",
				"Ờ",
				"Ớ",
				"Ợ",
				"Ở",
				"Ỡ",
				"Ù",
				"Ú",
				"Ụ",
				"Ủ",
				"Ũ",
				"Ư",
				"Ừ",
				"Ứ",
				"Ự",
				"Ử",
				"Ữ",
				"Ỳ",
				"Ý",
				"Ỵ",
				"Ỷ",
				"Ỹ",
				"Đ",
				" ",
				",",
				"?",
				")",
				"(",
				":",
				"!",
				"*",
				"&",
				"%",
				"$",
				"@",
				"`",
				"~",
				"/",
				"'",
				"#" 
		);
		
		/* Mảng chứa tất cả ký tự không dấu tương ứng với mảng $marTViet bên trên */
		$marKoDau = array (
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"a",
				"e",
				"e",
				"e",
				"e",
				"e",
				"e",
				"e",
				"e",
				"e",
				"e",
				"e",
				"i",
				"i",
				"i",
				"i",
				"i",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"o",
				"u",
				"u",
				"u",
				"u",
				"u",
				"u",
				"u",
				"u",
				"u",
				"u",
				"u",
				"y",
				"y",
				"y",
				"y",
				"y",
				"d",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"A",
				"E",
				"E",
				"E",
				"E",
				"E",
				"E",
				"E",
				"E",
				"E",
				"E",
				"E",
				"I",
				"I",
				"I",
				"I",
				"I",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"O",
				"U",
				"U",
				"U",
				"U",
				"U",
				"U",
				"U",
				"U",
				"U",
				"U",
				"U",
				"Y",
				"Y",
				"Y",
				"Y",
				"Y",
				"D",
				"-",
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"" 
		);
		
		if ($tolower) {
			return strtolower ( str_replace ( $marTViet, $marKoDau, $cs ) );
		}
		
		return str_replace ( $marTViet, $marKoDau, $cs );
	}
	public function removescript($str) {
		$script = array (
				"<",
				">" 
		);
		$remove = array (
				"&lt;",
				"&gt;" 
		);
		return str_replace ( $script, $remove, $str );
	}
	function subStringv($str, $len) {
		// $str = html_entity_decode($str, ENT_QUOTES, $charset='UTF-8');
		if (strlen ( $str ) > $len) {
			$arr = explode ( ' ', $str );
			$str = substr ( $str, 0, $len );
			$arrRes = explode ( ' ', $str );
			$last = $arr [count ( $arrRes ) - 1];
			unset ( $arr );
			if (strcasecmp ( $arrRes [count ( $arrRes ) - 1], $last )) {
				unset ( $arrRes [count ( $arrRes ) - 1] );
			}
			return implode ( ' ', $arrRes ) . "...";
		}
		return $str;
	}
	public function tooltipString($str, $maxlength = 30, $strip_tag = true) {
		if ($strip_tag) {
			$str = strip_tags ( $str );
		}
		if (strlen ( $str ) > $maxlength) {
			return "<span title='$str'>" . $this->subStringv ( $str, $maxlength ) . '</span>';
		} else {
			return $str;
		}
	}
	public function getBrowser() {
		$u_agent = $_SERVER ['HTTP_USER_AGENT'];
		$bname = 'Unknown';
		$platform = 'Unknown';
		$version = "";
		
		// First get the platform?
		if (preg_match ( '/linux/i', $u_agent )) {
			$platform = 'linux';
		} elseif (preg_match ( '/macintosh|mac os x/i', $u_agent )) {
			$platform = 'mac';
		} elseif (preg_match ( '/windows|win32/i', $u_agent )) {
			$platform = 'Windows';
			if (preg_match ( '/NT 6.2/i', $u_agent )) {
				$platform .= ' 8';
			} elseif (preg_match ( '/NT 6.3/i', $u_agent )) {
				$platform .= ' 8.1';
			} elseif (preg_match ( '/NT 6.1/i', $u_agent )) {
				$platform .= ' 7';
			} elseif (preg_match ( '/NT 6.0/i', $u_agent )) {
				$platform .= ' Vista';
			} elseif (preg_match ( '/NT 5.1/i', $u_agent )) {
				$platform .= ' XP';
			} elseif (preg_match ( '/NT 5.0/i', $u_agent )) {
				$platform .= ' 2000';
			}
			if (preg_match ( '/WOW64/i', $u_agent ) || preg_match ( '/x64/i', $u_agent )) {
				$platform .= ' (x64)';
			}
		}
		
		// Next get the name of the useragent yes seperately and for good reason
		if (preg_match ( '/MSIE/i', $u_agent ) && ! preg_match ( '/Opera/i', $u_agent )) {
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		} 

		elseif (preg_match ( '/Trident/i', $u_agent )) {
			$bname = 'Internet Explorer';
			$ub = "IE";
		} 

		elseif (preg_match ( '/Firefox/i', $u_agent )) {
			$bname = 'Mozilla Firefox';
			$ub = "Firefox";
		} elseif (preg_match ( '/Chrome/i', $u_agent ) && ! preg_match ( '/OPR/', $u_agent )) {
			$bname = 'Google Chrome';
			$ub = "Chrome";
		} elseif (preg_match ( '/Safari/i', $u_agent ) && ! preg_match ( '/OPR/', $u_agent ) && ! preg_match ( '/Chrome/', $u_agent )) {
			$bname = 'Apple Safari';
			$ub = "Safari";
		}		// elseif(preg_match('/Opera/i',$u_agent) )
		elseif (preg_match ( '/Chrome/', $u_agent ) && preg_match ( '/OPR/i', $u_agent )) {
			$bname = 'Opera';
			$ub = "Opera";
		} elseif (preg_match ( '/Netscape/i', $u_agent )) {
			$bname = 'Netscape';
			$ub = "Netscape";
		}
		
		// finally get the correct version number
		$known = array (
				'Version',
				$ub,
				'other',
				'rv',
				'OPR' 
		);
		$pattern = '#(?<browser>' . join ( '|', $known ) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (! preg_match_all ( $pattern, $u_agent, $matches )) {
			// we have no matching number just continue
		}
		
		// see how many we have
		$i = count ( $matches ['browser'] );
		if ($i != 1) {
			// we will have two since we are not using 'other' argument yet
			// see if version is before or after the name
			if (strripos ( $u_agent, "Version" ) < strripos ( $u_agent, $ub )) {
				$version = $matches ['version'] [0];
			} else {
				$version = $matches ['version'] [1];
			}
		} else {
			$version = $matches ['version'] [0];
		}
		
		// check if we have a number
		if ($version == null || $version == "") {
			$version = "?";
		}
		
		return array (
				'userAgent' => $u_agent,
				'name' => $bname,
				'version' => $version,
				'platform' => $platform,
				'pattern' => $pattern 
		);
	}
	
	// ----------------Start Upload , Creat thumbnail Img-------------------------------
	public function createImageThumbnail($filePathName, $destinationPath, $options) {
		$arr = explode ( '/', $filePathName );
		$file_name = end ( $arr );
		
		$new_file_name = $file_name;
		$new_file_path = $destinationPath . '/' . $new_file_name;
		
		
		list ( $img_width, $img_height ) = @getimagesize ( $filePathName );
		if (! $img_width || ! $img_height) {
			return false;
		}
		$scale = min ( $options ['max_width'] / $img_width, $options ['max_height'] / $img_height );
		$new_width = $img_width * $scale;
		$new_height = $img_height * $scale;
		$new_img = @imagecreatetruecolor ( $new_width, $new_height );
		switch (strtolower ( substr ( strrchr ( $file_name, '.' ), 1 ) )) {
			case 'jpg' :
			case 'jpeg' :
				$src_img = @imagecreatefromjpeg ( $filePathName );
				$write_image = 'imagejpeg';
				$image_quality = isset ( $options ['jpeg_quality'] ) ? $options ['jpeg_quality'] : 100;
				break;
			case 'gif' :
				@imagecolortransparent ( $new_img, @imagecolorallocate ( $new_img, 0, 0, 0 ) );
				$src_img = @imagecreatefromgif ( $filePathName );
				$write_image = 'imagegif';
				$image_quality = null;
				break;
			case 'png' :
				@imagecolortransparent ( $new_img, @imagecolorallocate ( $new_img, 0, 0, 0 ) );
				@imagealphablending ( $new_img, false );
				@imagesavealpha ( $new_img, true );
				$src_img = @imagecreatefrompng ( $filePathName );
				$write_image = 'imagepng';
				$image_quality = isset ( $options ['png_quality'] ) ? $options ['png_quality'] : 100;
				break;
			default :
				$src_img = null;
		}
		$success = $src_img && @imagecopyresampled ( $new_img, $src_img, 0, 0, 0, 0, $new_width, $new_height, $img_width, $img_height ) && $write_image ( $new_img, $new_file_path, $image_quality );
		// Free up memory (imagedestroy does not delete files):
		@imagedestroy ( $src_img );
		@imagedestroy ( $new_img );
		if ($success) return $new_file_name;
		return $success;
	}
	
	public function createImageThumbnailslider($filePathName, $destinationPath, $options) {
		$arr = explode ( '\\', $filePathName );
		$file_name = end ( $arr );
	
		$new_file_name = $file_name;
		$new_file_path = $destinationPath . '\\' . $new_file_name;
	
	
		list ( $img_width, $img_height ) = @getimagesize ( $filePathName );
		if (! $img_width || ! $img_height) {
			return false;
		}
		$scale = min ( $options ['max_width'] / $img_width, $options ['max_height'] / $img_height );
		$new_width = $img_width * $scale;
		$new_height = $img_height * $scale;
		$new_img = @imagecreatetruecolor ( $new_width, $new_height );
		switch (strtolower ( substr ( strrchr ( $file_name, '.' ), 1 ) )) {
			case 'jpg' :
			case 'jpeg' :
				$src_img = @imagecreatefromjpeg ( $filePathName );
				$write_image = 'imagejpeg';
				$image_quality = isset ( $options ['jpeg_quality'] ) ? $options ['jpeg_quality'] : 100;
				break;
			case 'gif' :
				@imagecolortransparent ( $new_img, @imagecolorallocate ( $new_img, 0, 0, 0 ) );
				$src_img = @imagecreatefromgif ( $filePathName );
				$write_image = 'imagegif';
				$image_quality = null;
				break;
			case 'png' :
				@imagecolortransparent ( $new_img, @imagecolorallocate ( $new_img, 0, 0, 0 ) );
				@imagealphablending ( $new_img, false );
				@imagesavealpha ( $new_img, true );
				$src_img = @imagecreatefrompng ( $filePathName );
				$write_image = 'imagepng';
				$image_quality = isset ( $options ['png_quality'] ) ? $options ['png_quality'] : 100;
				break;
			default :
				$src_img = null;
		}
		$success = $src_img && @imagecopyresampled ( $new_img, $src_img, 0, 0, 0, 0, $new_width, $new_height, $img_width, $img_height ) && $write_image ( $new_img, $new_file_path, $image_quality );
		// Free up memory (imagedestroy does not delete files):
		@imagedestroy ( $src_img );
		@imagedestroy ( $new_img );
		if ($success) return $new_file_name;
		return $success;
	}
	
	
	
	public function deleteImage($image, $dir) {
		try {
			$this->deleteFile ( $dir . '/' . $image );
			$this->deleteFile ( $dir . '/thumb_/thumb_' . $image );
		} catch ( \Exception $exc ) {
			$this->errorMessage = $exc->getMessage ();
		}
	}
	
	public function deleteSlideshow($image, $dir) {
		try {
			$this->deleteFile ( $dir . '/' . $image );
		} catch ( \Exception $exc ) {
			$this->errorMessage = $exc->getMessage ();
		}
	}
	
	public function uploadImage($imageData = array(), $dir, $createThumb = true, $options = array()) {
		if (! empty ( $imageData )) {
			$fileName = 'thumb_'.time () . '.jpg';
			$dirFileName = $dir . '/' . $fileName;
			
			$filter = new \Zend\Filter\File\RenameUpload ( $dirFileName );
			if ($filter->filter ( $imageData )) {
				if ($createThumb) {
					$options = (! empty ( $options )) ? $options : array (
							'max_width' => 65,
							'max_height' => 65,
							'jpeg_quality' => 100 
					);
					$this->createImageThumbnail ( $dirFileName, $dir . '/thumb_', $options );
				}
				
				return $fileName;
			}
		}
		
		return false;
	}
	
	
	/*
	 $options = array (
						'max_width' => 102,
						'max_height' => 102,
						'jpeg_quality' => 100
				);
	$_UPLOAD_PATH_IMG = UPLOAD_PATH_IMG_290x372 ;// or UPLOAD_PATH_IMG_67x86 or UPLOAD_PATH_IMG	
	 */
	public function upload_creat_maxHeight_maxWidthByOtion($imageData = array(),$options = array(),$_UPLOAD_PATH_IMG) 
	{
		$epx_img ='';
		if (! empty ( $imageData )) {
			
			if($imageData['type']=='image/jpeg' || $imageData['type']=='image/jpg')  $epx_img='.jpg';
			if($imageData['type']=='image/gif')  $epx_img='.gif';
			if($imageData['type']=='image/png')  $epx_img='.png';
			
			$fileName = 'thumb_'.time () . $epx_img;
			$dir = $_UPLOAD_PATH_IMG;
			$dirFileName = $dir . '/' . $fileName;
				
			$filter = new \Zend\Filter\File\RenameUpload ( $dirFileName );
			if ($filter->filter ( $imageData )) {
				
				$this->createImageThumbnail ( $dirFileName, $dir . '/thumb_', $options );
				return $fileName;
			}
		}
		return false;
	}
	public function uploadImageAlatca($imageData = array()) {
		
		if (! empty ( $imageData )) {
			
			$fileName = 'thumb_'.time () . '.jpg';
			$dir = UPLOAD_PATH_IMG;
			$dirFileName = $dir . '/' . $fileName;
			
			$filter = new \Zend\Filter\File\RenameUpload ( $dirFileName );
			
			if ($filter->filter ( $imageData )) {
				$options = array (
						'max_width' => 178,
						'max_height' => 178,
						'jpeg_quality' => 100 
				);
				$this->createImageThumbnail ( $dirFileName, $dir.'/thumb_', $options );
				return $fileName;
			}
		}
		return false;
	}
	
	public function uploadImageSlideshow($imageData = array()) {
	
		if (! empty ( $imageData )) {
				
			$fileName = 'slideshow_'.time () . '.jpg';
			
			$dir = ROOT_PATH.'\public\imgslideshow';
			$dirFileName = $dir . '\\' . $fileName;
				
			$filter = new \Zend\Filter\File\RenameUpload ( $dirFileName );
				
			if ($filter->filter ( $imageData )) {
				$options = array (
						'max_width' => 846,
						'max_height' => 388,
						'jpeg_quality' => 250
				);
				
				$options2 = array (
						'max_width' => 100,
						'max_height' => 100,
						'jpeg_quality' => 250
				);
				 $this->createImageThumbnailslider ( $dirFileName, $dir.'\thumb_slideshow', $options );
				 $this->createImageThumbnailslider ( $dirFileName, $dir.'\thumb_slideshow2', $options2 );
				return $fileName;
			}
		}
		return false;
	}
	
	
	
	
	
        public function uploadImageCatalog($imageData = array()) {
		
		if (! empty ( $imageData )) {
			
			$fileName = 'catalog_'.time () . '.jpg';
			$dir = UPLOAD_PATH_IMG;
			$dirFileName = $dir . '/' . $fileName;
			
			$filter = new \Zend\Filter\File\RenameUpload ( $dirFileName );
			
			if ($filter->filter ( $imageData )) {
				$options = array (
						'max_width' => 380,
						'max_height' => 380,
						'jpeg_quality' => 100 
				);
				$this->createImageThumbnail ( $dirFileName, $dir.'/thumb_catalog', $options );
				return $fileName;
			}
		}
		return false;
	}
	public function deleteFile($file_path) {
		if (! empty ( $file_path ) && file_exists ( $file_path )) {
			return @unlink ( $file_path );
		}
		return false;
	}
	// ------------------End Start ThumNail -----------------------------
}
