<?php
session_start();
require_once '/pass.php';
$GLOBALS['config'] = array(
	'mysql'		=> array(
				'host'		=> '127.0.0.1',
				'username'	=> 'root',
				'password'	=>  PASS,
				'db'		=> 'users'
			),
	'remember'	=> array(
				'cookie_name'	=> 'hash',
				'cookie_expiry'	=>  604800
			),
	'session'	=> array(
				'session_name'	=> 'user'
			)
);

spl_autoload_register(function($class){
	require_once '/var/www/test-pages/login/classes/' . $class . '.php';
});

require_once '/var/www/test-pages/login/functions/sanitize.php';
