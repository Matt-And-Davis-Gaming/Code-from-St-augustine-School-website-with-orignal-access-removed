<?php
require '/var/www/test-pages/login/core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('login.php');
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
		</tbody>
</form>