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
class Get{
	public static function willitwork($data)
	{
		print_r($data);
	}
}
require ('/var/www/init.php');
$user = new User($path[0]);
echo "<pre>";
	Get::willitwork($user->data());
echo "</pre>";