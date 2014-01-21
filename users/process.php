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

require ('/var/www/init.php');
$user = new User($path[0]);
echo "<pre>";
	print_r($user->data());
echo "</pre>";