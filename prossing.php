<?php

switch($_POST['action']){
	case "signIn":
		#echo "This action has not yet been created and is intended for future refrence. Please try again later";
		#header("Refresh:2;/");
		require '/var/www/init.php';
		<?php
			#require '/var/www/func/login/core/init.php';
			ini_set('display_errors', '1');
			error_reporting(-1);
			if (Input::exists()) {
				if(Token::check(Input::get('token'))){

					# validate the stuff
					$validate = new Validate();
					$validation = $validate->check($_POST, array(
						'username'  => array('required' => true, 'name' => 'Username'),
						'password'  => array('required' => true, 'name' => 'Password')
					));

					if($validation->passed()){
						# Log in

						# make user object
						$user = new User();

						# set the var for the rember me

						$remember = (Input::get('remember') === 'on') ? true : false ;
						# call login method
						$login = $user->login(Input::get('username'), Input::get('password'), $remember);

						# check if login is successful
						if ($login) {
							
						Session::flash('in', "You, " . $user->data()->name . ", have been successfully logged in. Have fun!");
						Redirect::to("/account-control/flash.php");
						}else{
							  echo "sorry, we could not log you in";
						}
					}else{
						# fail
						$go = true;
					}
				}else{
					echo "<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">CSRF request detected. Click to read more.</a>
					<br>If you still have any questions, visit our help guidelines at <a href=\"/help/policies#csrf\"> CSRF F.A.Q.</a>";
				}
			}elseif(Session::exists(Config::get('session/session_name'))){
				Redirect::to('/account-control');
			}
	break;
	default:
		echo "Sorry! We could not find the action given. Site Specific error code: 1";
	break;
}
