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
	private $_user

	function __construct($userObject = null){
		$this->_user = $userObject;
	}

	public function pr($substr = null){
		print_r(($substr != null) ? $this->user[$substr] : $this->_user);
	}
}


require ('/var/www/init.php');
$user = new User($path[0]);
echo "<pre>";
	$get = new Get($user->data());
	$get->pr();
echo "</pre>";