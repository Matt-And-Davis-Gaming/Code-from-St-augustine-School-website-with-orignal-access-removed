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
					'groups'	=> 'groups',
					'logs'		=> array(
						'log'		=> 'rec'
					)
				),
				'utable'	=> 'users'
			),
	'remember'	=> array(
				'cookie_name'	=> 'cookie_name_for_controlled_session_storage',
				'cookie_expiry'	=>  604800
			),
	'session'	=> array(
				'session_name'	=> 'user',
				'CSRF_protect' 	=> 'token'
			)
);

spl_autoload_register(function($class){
	require_once '/var/www/func/login/classes/' . $class . '.php';
});

require_once '/var/www/func/login/functions/sanitize.php';


if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	# User asked to be remembered

	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get(Config::get('mysql/table/session'), array('hash', '=', $hash));

	if ($hashCheck->count()) {
		# hash matches, log user in
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}

}