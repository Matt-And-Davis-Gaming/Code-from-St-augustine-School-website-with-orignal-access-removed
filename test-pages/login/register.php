<?php

ini_set('display_errors', '1');
error_reporting(-1);
	require '/var/www/test-pages/login/core/init.php';

if(Input::exists()){
	if (!Token::check(Input::get('token'))) {
		echo "<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">CSRF request detected. Click to read more.</a>";
		?>
		<br>
			If you still have any questions, visit our help guidelines at <a href="/help/policies#csrf"> CSRF F.A.Q.</a>
		<?php
	}else{
		# echo "Submitted. Username = " . Input::get("username");
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' 		=> array(
								'required' 	=> true,
								'min' 		=> 2,
								'max'		=> 20,
								'unique'	=> Config::get('mysql/utable'),
								'alnum'		=> true,
								'name'		=> 'Username'
							),
			'password' 		=> array(
								'required' 	=> true,
								'min' 		=> 6,
								'name'		=> 'Password'
							),
			'password_again'=> array(
								'required' 	=> true,
								'matches'	=> 'password',
								'name'		=> 'Repeat Password'
							),
			'name' 			=> array(
								'required' 	=> true,
								'min' 		=> 2,
								'max'		=> 50,
								'name'		=> 'Real Name'
							)
		));

		if ($validation->passed()) {
			# echo 'Success';
			$user = new User();

			$salt = Hash::salt(32);
			try{

				$user->create(array(
					'username' 	=> Input::get('username'),
					'password' 	=> Hash::make(Input::get('password'), $salt),
					'salt' 		=> $salt,
					'name' 		=> Input::get('name'),
					'joined' 	=> date("Y-m-d H:i:s"),
					'group' 	=> 1
				));
				$log = new Log();
				$log->log('registered', Input::get('name'), 'registration');
				Session::flash('home', "You, " . Input::get('name') . ", have been successfully registered and can now log in. Have fun!");
				Redirect::to("flash.php");
			}catch(Exception $e){
				die($e->getMessage());
			}
			/*
			Session::flash('success', 'You registered successfully');
			header('Location: flash.php');
			*/
		}else{
			# echo "<pre>", print_r($validation->errors()), "</pre>";
			$run = true;
		}
	}
}
?>

<form action="" method="post">
	<table>
		<thead>

		</thead>
		<tbody>
			<tr><div class="field">
				<td><label for="username">Please choose a username</label></td>
				<td><input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" /></td>
			</div></tr>
			<tr><div class="field">
				<td><label for="password">Please choose a password</label></td>
				<td><input type="password" name="password" id="password" /></td>
			</div></tr>
			<tr><div class="field">
				<td><label for="password_again">Please repeat your password</label></td>
				<td><input type="password" name="password_again" id="password_again" /></td>
			</div></tr>
			<tr><div class="field">
				<td><label for="name">Please enter your real name</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>" autocomplete="off" /></td>
			</div></tr>

			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />

			<tr><td colspan="2" style="text-align:center;float:center;"><input type="submit" value="Register" /></td></tr>
		</tbody>
	</table>
	<?php
		if (isset($run)) {
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
	?>
</form>