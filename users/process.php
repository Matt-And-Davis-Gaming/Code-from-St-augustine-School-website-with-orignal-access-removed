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
			$prin = $this->_user->$substr;
		else:
			$prin = $this->_user;
		endif;
		print_r($prin);
	}

	public function pharse($json){
		return json_decode($json, true);
	}
	public function encode($json){
		return json_encode($json);
	}

	public function data($data)
	{
		return $this->_user->$data;
	}
}


require ('/var/www/init.php');
$user = new User($path[0]);
echo "<pre>";
	$get = new Get($user->data());
	$get->pr();
	print_r($get->pharse($user->data()->data));
	DB::getInstance()->update('users', 3, array(
		'data' => '{
	"blog": {
		"posts": {
			"2014": {
				"january": {
					"27": {
						"count": 1,
						"posts": {
							"a": {
								"timestamp": 1234567897
							}
						}
					}
				}
			}
		}
	}
}'));
$save = $get->pharse($user->data()->data);
echo "</pre>";
echo $save["blog"]["posts"]["2014"]["january"]["27"]["posts"]["a"]["timestamp"];