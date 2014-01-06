<?php
	require '/var/www/func/login/core/init.php';
	$user = new User();
	if($user->isLoggedIn()){
		require '/var/www/test-pages/chat/inden.php';
	}else{
		echo "Please log in to chat";
	}
?>
