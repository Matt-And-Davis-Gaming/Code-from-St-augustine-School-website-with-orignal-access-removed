<?php

if($_GET['path']){
	$config = $_GET['path'];
	$path = explode('/', $_GET['path']);

	/*foreach($path as $bit){
		if(isset($config[$bit])){
			$config = $config[$bit];
		}
	}*/

	# return $config;
}
echo "<pre>";
	print_r($path);
echo "</pre>";