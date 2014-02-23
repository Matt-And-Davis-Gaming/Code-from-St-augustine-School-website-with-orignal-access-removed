<?php
require_once '/var/www/func/swift-mailer/lib/swift_required.php';
require '/var/www/init.php';
ini_set('display_errors', '1');
			error_reporting(-1);
switch($_POST['action']){
	case "signIn":
		#echo "This action has not yet been created and is intended for future refrence. Please try again later";
		#header("Refresh:2;/");
		#require '/var/www/init.php';
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
	case "bully":
		# throw bully into db and email
		# require("/pass.php");
		function emailReport($add)
		{
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'bully_name'  => array('required' => true, 'name' => 'Bully Name'),
				'story'  => array('required' => true, 'name' => 'story')
			));
			if($validation->passed()){
			    
			    //Create the Transport
			    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com')
			      ->setPort(465)
			      ->setEncryption('ssl')
			      ->setUsername('mcolekrueger@gmail.com')
			      ->setPassword(GMAIL_PASS)
			      ;

			    //Create the Mailer using your created Transport
			    $mailer = Swift_Mailer::newInstance($transport);
			    require '/var/www/func/bleep/bleep.php';
			    //Create a message
			    $cen = bleep(mysql_real_escape_string(Input::get('story')));
			    if($cen == mysql_real_escape_string(Input::get('story'))){}
			    $message = Swift_Message::newInstance('New Bully Report')
			      ->setFrom(array('no_reply@staugustineschool.org' => 'New Bully report recieved'))
			      ->setTo($add)
			      ->setBody(
                "Bully report is as follows:<br />
	Bully name: " . mysql_real_escape_string(Input::get('bully_name')) . "<br />
	Story (un-censored):<br />
			" . mysql_real_escape_string(Input::get('story')) . "<br />
	Additional Infromation:<br />
			" . mysql_real_escape_string(Input::get('add')), 'text/html'
            );
			}else{
				$run = true;
			}

		    //Send the message
		    $result = $mailer->send($message);

		    /*
		    You can alternatively use batchSend() to send the message

		    $result = $mailer->batchSend($message);
		    */ 
		}
		emailReport(array('mcolekrueger@gmail.com'));
	break;
	default:
		echo "Sorry! We could not find the action given. Site Specific error code: 1";
	break;
}

					#php
						if (isset($run) or isset($go)) {
							?>
							<h2>Errors:</h2><ol>
							<?php
							foreach ($validation->errors() as $error) {
								echo "<li>" . escape($error) . "</li>";
							}
							?>
							</ol>
							<?php
						}
					
