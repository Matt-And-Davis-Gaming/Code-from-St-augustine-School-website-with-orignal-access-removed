<?php
session_start();
require_once '/pass.php';
$GLOBALS['config'] = array(
	'mysql'		=> array(
				'host'		=> '127.0.0.1',
				'username'	=> 'root',
				'password'	=>  PASS,
				'db'		=> 'users',
				'table'		=>  array(
					'users'		=> 'users',
					'session'	=> 'users_session',
					'groups'	=> 'groups'
				),
				'utable'	=> 'users'
			),
	'remember'	=> array(
				'cookie_name'	=> 'hash',
				'cookie_expiry'	=>  60*60*24*31*5
			),
	'session'	=> array(
				'session_name'	=> 'user',
				'CSRF_protect' 	=> 'token'
			)
);

spl_autoload_register(function($class){
	require_once '/var/www/test-pages/login/classes/' . $class . '.php';
});

require_once '/var/www/test-pages/login/functions/sanitize.php';


if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	echo "User asked to be remembered";
}