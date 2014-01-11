<?php

	require '/var/www/func/login/core/init.php';
	require '/var/www/func/bleep/bleep.php';
	# echo Input::get('message');

	# the only reason why I swear here is to test it
	$mess = trim(bleep(Input::get('message')));
	
	

?>
