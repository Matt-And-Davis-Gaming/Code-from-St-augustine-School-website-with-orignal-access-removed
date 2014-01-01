<?php
	$u = new User();

	if($u->isLoggedIn()){
		echo "<div style=\"font-size:1.2em;float: right;text-shadow: 0 -1px 0 rgba(0,0,0,0.25);color:#999;padding-top:15px;padding-bottom:10px;\">
		Hello <a href=\"/user/" . $u->data()->username . "\"" . $u->data()->name . "! <a href='/account-control/logout'>Log out?</a></div>";
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