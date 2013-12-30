<?php
require '/var/www/test-pages/login/core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('login.php');
}

if(Input::exists()){
	if(Token::check(Input::get('token'))) {
		echo 
		'ok';
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
				<tr><td><label for="name">
					Name
				</label></td>
				<td><input type="text" name="name" id="name" autocompleate="off" value="<?php echo escape($user->data()->name); ?>" /></td></tr>
			</div>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
			<div class="field">
				<tr><td colspan="2"><input type="submit" value="Update" /></td></tr>
			</div>
		</tbody>
</form>