<?php
//echo PHP_VERSION;
ini_set('display_errors', '1');
error_reporting(-1);
require_once 'core/init.php';
//die(Config::get('mysql/password'));


$user = DB::getInstance()->get('users', array('username', '=', 'matt'));

var_dump($user->error());
?><br><?php
if($user->error()){
	echo 'No User Found';
}else{
	echo 'ok';
}
//echo $lev = E_ALL & !E_NOTICE & !E_DEPRECATED;
//http://www.youtube.com/watch?feature=player_detailpage&v=PaBWDOBFxDc#t=567
