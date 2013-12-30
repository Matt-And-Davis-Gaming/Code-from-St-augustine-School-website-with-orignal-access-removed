<?php
require '/var/www/test-pages/login/core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('inden.php');
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