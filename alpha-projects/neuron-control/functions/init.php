<?php
session_start();
require_once '/pass.php';
$GLOBALS['config'] = array(
	'mysql'		=> array(
				'host'		=> '127.0.0.1',
				'username'	=> 'root',
				'password'	=>  PASS,
				'db'		=> 'neuron',
				'table'		=>  array(
					'users'		=> 'users',
					'session'	=> 'users_session',
					'groups'	=> 'groups',
					'chat1'		=> 'chat',
					'logs'		=> array(
						'log'		=> 'rec'
					)
				),
				'utable'	=> 'users'
			),
	'remember'	=> array(
				'cookie_name'	=> 'cookie_name_neuron',
				'cookie_expiry'	=>  60*60*24*31*3
			),
	'session'	=> array(
				'session_name'	=> 'user',
				'CSRF_protect' 	=> 'token'
			)
);

spl_autoload_register(function($class){
	require_once '/var/www/alpha-projects/neuron-control/functions/classes/' . $class . '.php';
});

require_once '/var/www/alpha-projects/neuron-control/functions/sanitize.php';

/*
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
