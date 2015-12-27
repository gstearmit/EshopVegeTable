<?php

namespace Crowler\Model;

class Getcrowler {
	public function __construct() { }
	
	public function _is_checkurl($url)
	{
		
		//check url co song ko
		//$uri = 'https://www.rohlik.cz/c75533-napoje';
		if ($url == NULL) return false;
		$options = array(
				CURLOPT_RETURNTRANSFER => true,     // return web page
				CURLOPT_HEADER         => false,    // don't return headers
				CURLOPT_FOLLOWLOCATION => true,     // follow redirects
				CURLOPT_ENCODING       => "",       // handle all encodings
				CURLOPT_USERAGENT      => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
				CURLOPT_AUTOREFERER    => true,     // set referer on redirect
				CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
				CURLOPT_TIMEOUT        => 120,      // timeout on response
				CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
				CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
		);
	
		$ch      = curl_init( $url );
		curl_setopt_array( $ch, $options );
		
		$data = curl_exec ( $ch );
		$httpcode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE ); // lay code tra ve cua http
		curl_close ( $ch );
		return $httpcode;
		//return ($httpcode >= 200 && $httpcode < 300);
	}
	public function get_web_page( $url )
	{
		$options = array(
				CURLOPT_RETURNTRANSFER => true,     // return web page
				CURLOPT_HEADER         => false,    // don't return headers
				CURLOPT_FOLLOWLOCATION => true,     // follow redirects
				CURLOPT_ENCODING       => "",       // handle all encodings
				CURLOPT_USERAGENT      => "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10", // who am i
				CURLOPT_AUTOREFERER    => true,     // set referer on redirect
				CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
				CURLOPT_TIMEOUT        => 120,      // timeout on response
				CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
				CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
		);
	
		$ch      = curl_init( $url );
		curl_setopt_array( $ch, $options );
		$content = curl_exec( $ch );
		$err     = curl_errno( $ch );
		$errmsg  = curl_error( $ch );
		$header  = curl_getinfo( $ch );
		curl_close( $ch );
	
		$header['errno']   = $err;
		$header['errmsg']  = $errmsg;
		$header['content'] = $content;
		return $header;
	}
	
	
	public function innerHTML( $contentdiv ) {
		$r = '';
		$elements = $contentdiv->childNodes;
		foreach( $elements as $element ) {
			if ( $element->nodeType == XML_TEXT_NODE ) {
				$text = $element->nodeValue;
				// IIRC the next line was for working around a
				// WordPress bug
				//$text = str_replace( '<', '&lt;', $text );
				$r .= $text;
			}
			// FIXME we should return comments as well
			elseif ( $element->nodeType == XML_COMMENT_NODE ) {
				$r .= '';
			}
			else {
				$r .= '<';
				$r .= $element->nodeName;
				if ( $element->hasAttributes() ) {
					$attributes = $element->attributes;
					foreach ( $attributes as $attribute )
						$r .= " {$attribute->nodeName}='{$attribute->nodeValue}'" ;
				}
				$r .= '>';
				$r .= $this->innerHTML( $element );
				$r .= "</{$element->nodeName}>";
			}
		}
		return $r;
	}
	
}
