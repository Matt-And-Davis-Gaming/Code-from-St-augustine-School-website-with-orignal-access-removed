<?php
	require '/var/www/test-pages/login/core/init.php';
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

				# call login method
				$login = $user->login(Input::get('username'), Input::get('password'));

				# check if login is successful
				if ($login) {
					echo "success";
				}
			}else{
				# fail
				$go = true;
			}
		}else{
			echo "<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">CSRF request detected. Click to read more.</a>";
		}
	}else{
		echo "Please enter the info below";
	}
?>

<form method="post" action="" >
	<table>
		<thead>

		</thead>
		<tbody>
			<div class="field">
				<tr><td><label for="username">Username </label></td>
				<td><input type="text" name="username" id="username" autocompleate="off" /></td></tr>
			</div>
			<div class="filed">
				<tr><td><label for="password">Password </label></td>
				<td><input type="password" name="password" id="password" autocompleate="off" /></td></tr>
			</div>


			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
			<tr><td colspan="2" style="text-align:center;"><input type="submit" value="Log In" /></td></tr>
		</tbody>
		<?php
			# echo errors
			if (isset($go)) {
				if ($go === true) {
					?>
						<h1>Errors:</h1>
						<ol>
					<?php
						foreach ($validation->errors() as $error) {
							echo "<li>{$error}</li>";
						}
					?>
						</ol>
					<?php
				}
			}
		?>
</form>