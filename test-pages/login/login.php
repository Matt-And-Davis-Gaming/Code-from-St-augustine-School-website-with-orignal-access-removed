<form method="post" action="" >
	<div class="field">
		<label for="username">Username </label>
		<input type="text" name="username" id="username" autocompleate="off" />
	</div>
	<div class="filed">
		<label for="password">Password </label>
		<input type="text" name="password" id="password" autocompleate="off" />
	</div>


	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
	<input type="submit" value="Log In" />
</form>