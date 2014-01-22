<?php
ini_set('display_errors', '1');
error_reporting(-1);
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
	private $_user;

	function __construct($userObject = null){
		$this->_user = $userObject;
	}

	public function pr($substr = null){
		if($substr != null):
			$prin = $this->_user[$substr];
		else:
			$prin = $this->_user;
		endif;
		print_r($prin);
	}
}


require ('/var/www/init.php');
$user = new User($path[0]);
echo "<pre>";
	$get = new Get($user->data());
	$get->pr('salt');
echo "</pre>";