<?php
require '/var/www/test-pages/login/core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('inden.php');
}

if(Input::exists()){
	if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'password_current'			=> array(
				'required'	=> true,
				'min'		=> 6,
				'name'		=> 'Old Password'
			),
			'password_new'				=> array(
				'required'	=> true,
				'min'		=> 6,
				'name'		=> 'New Password'
			),
			'password_new_again'		=> array(
				'required'	=> true,
				'min'		=> 6,
				'name'		=> 'Repeat New Password',
				'matches'	=> 'password_new'
			)
		));

		if($validation->passed()){

		}else{
			$go = true;
		}

	}else{
		echo "<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">CSRF request detected. Click to read more.</a>
			<br>If you still have any questions, visit our help guidelines at <a href=\"/help/policies#csrf\"> CSRF F.A.Q.</a>";
	}
}

?>

<style type="text/css">
	.centre{
		text-align: center;
	}
</style>

<form action="" method="post">
	<table>
		<thead>

		</thead>
		<tbody class="centre">
			<div class="field">
				<tr><td><label for="password_current">
					Current Password
				</label></td>
				<td><input type="password" name="password_current" id="password_current" autocompleate="off" /></td></tr>
			</div>

			<tr><td><label for="password_new">
					Name
				</label></td>
				<td><input type="password" name="password_new" id="password_new" /></td></tr>
			</div>

			<tr><td><label for="password_new_again">
					Name
				</label></td>
				<td><input type="password" name="password_new_again" id="password_new_again" /></td></tr>
			</div>

			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
				<tr><td colspan="2"><input type="submit" value="Change" /></td></tr>
		</tbody>
</form>

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