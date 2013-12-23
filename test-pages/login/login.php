<?php
	require '/var/www/test-pages/login/core/init.php';
	if (Input::exists()) {
		echo "Hello";
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
</form>