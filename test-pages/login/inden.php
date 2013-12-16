<?php
//echo PHP_VERSION;
ini_set('display_errors', '1');
error_reporting(-1);
require_once 'core/init.php';

$user = DB::getInstance()->update('users', 3, array(
	'username'	=> 'Dale',
	'password'	=> 'new_hashed_passphrase',
	'salt'		=> 'salt'
));