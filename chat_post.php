<?php
ini_set('display_errors', '1');
error_reporting(-1);
	require '/var/www/func/login/core/init.php';
	require '/var/www/func/bleep/bleep.php';
	# echo Input::get('message');
	if(Input::exists()){
		$trimmed = trim(Input::get('message'));
			# bleep message
		if ($trimmed == '') {
			die('you cannot send empty messages');
		}
		$blee = bleep($trimmed);
			
			#die(print_r($blee));
			# die('THere is input');
		
		$mess = trim($blee[0]);
		
		# create database instance
		DB::getInstance();
		
		# insert if bleep passed
		
		$user = new User();
		
		if($user->isLoggedIn()){
			if(isset($blee[1])){
				if($blee[1] == true){
					if($blee[0] != ''){
						DB::getInstance()->insert(Config::get('mysql/table/chat1'), array(
							'timestamp' => time(),
				                	'user_id' => $user->data()->id,
				                	'message' => $blee[0]
				                ));
					}
				}else{
					die("I'm sorry, but you cannot say that word in chat!");
				}
			}else{
				die("I'm sorry, but you cannot say that word in chat! Press ok to acknowledge, press cancel to see our guidelines.");
			}
		}
	}

?>
