<?php
//echo PHP_VERSION;
ini_set('display_errors', '1');
error_reporting(-1);
require_once 'core/init.php';
$user = DB::getInstance()->query("SELECT username FROM users WHERE username='asd'");

var_dump($user->error());
/*
if($user->error()){
	echo 'No User Found';
}else{
	echo 'ok';
}
//echo $lev = E_ALL & !E_NOTICE & !E_DEPRECATED;
//http://www.youtube.com/watch?feature=player_detailpage&v=PaBWDOBFxDc#t=567
