<?php
$urls = array (
		'http://www.google.com/',
		'http://dantri.com.vn/',
		'http://www.bing.com/' 
);
$url_count = count ( $urls );

$curl_array = array ();
$ch = curl_multi_init ();

foreach ( $urls as $count => $url ) {
	$curl_array [$count] = curl_init ( $url );
	curl_setopt ( $curl_array [$count], CURLOPT_RETURNTRANSFER, 1 );
	curl_multi_add_handle ( $ch, $curl_array [$count] );
}

do {
	curl_multi_exec ( $ch, $exec );
} while ( $exec > 0 );

foreach ( $urls as $count => $url ) {
	$returned = curl_multi_getcontent ( $curl_array [$count] );
	echo "$url - $returned";
}


// dong ket noi
foreach ( $urls as $count => $url ) {
	curl_multi_remove_handle ( $ch, $curl_array [$count] );
}
curl_multi_close ( $ch );
foreach ( $urls as $count => $url ) {
	curl_close ( $curl_array [$count] );
}
 