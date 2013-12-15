<?php
//echo PHP_VERSION;
ini_set('display_errors', '1');
error_reporting(-1);
require_once 'core/init.php';
//die(Config::get('mysql/password'));


$user = DB::getInstance()->get('users', array('username', '=', 'matt'));

//var_dump($user->error());
?><br><?php
if(!$user->count()){
	echo 'No User Found';
}else{
	foreach ($user->results() as $user) {
		echo $user->username . "<br>";
	}
}
//echo $lev = E_ALL & !E_NOTICE & !E_DEPRECATED;
//http://www.youtube.com/watch?feature=player_detailpage&v=PaBWDOBFxDc#t=567
