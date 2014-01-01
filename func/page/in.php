<?php
	$u = new User();

	if($u->isLoggedIn()){
		echo "<div style=\"float: right;\">Hello " . $u->data()->name . "</div>";
	}else{
		?>

		<form style="float: right;" class="navbar-form nav-center" method="post" action="/prossing.php">
			<div class="form-group">
				<input type="text" placeholder="Username" class="form-control" name = "username">
				<input type="hidden" name="action" value="signIn" />
				<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
				<input type="hidden" name="remember" id="remember" value="on"/>
			</div>
			<div class="form-group">
				<input type="password" placeholder="Password" class="form-control" name="password">
			</div>
			<button type="submit" class="btn btn-success">Sign in</button>
		</form>
		<?php
}