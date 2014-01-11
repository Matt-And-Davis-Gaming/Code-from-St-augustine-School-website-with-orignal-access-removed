<?php
ini_set('display_errors', '1');
error_reporting(-1);
	require '/var/www/func/login/core/init.php';
	# require '/var/www/func/bleep/bleep.php';
	# echo Input::get('message');
	if(Input::exists()){
			# bleep message
		$blee = bleep(Input::get('message'));
			
			#die(print_r($blee));
			# die('THere is input');
		
		# the only reason why I swear here is to test it
		$mess = trim($blee[0]);
		
		# create database instance
		DB::getInstance();
		
		# insert if bleep passed
		
		$user = new User();
		
		if($blee[1] == true){
			DB::getInstance()->insert(Config::get('mysql/table/chat1'), array(
	                	'user_id' => $user->data()->id,
	                	'message' => $blee[1]
	                ));
		}
	}

?>
