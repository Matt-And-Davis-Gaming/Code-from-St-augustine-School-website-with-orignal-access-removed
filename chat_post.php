<?php

	require '/var/www/func/login/core/init.php';
	require '/var/www/func/bleep/bleep.php';
	# echo Input::get('message');

	# the only reason why I swear here is to test it
	die(bleep(Input::get('message')));

?>