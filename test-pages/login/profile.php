<?php
	require '/var/www/test-pages/login/core/init.php';
	ini_set('display_errors', '1');
	error_reporting(-1);

	if(!$username = Input::get('user')){
		Redirect::to('inden.php');
	}else{
		$user = new User($username);
		if(!$user->exists()){
			Redirect::to(404);
		}else{
			echo "Exists";
		}
	}
?>