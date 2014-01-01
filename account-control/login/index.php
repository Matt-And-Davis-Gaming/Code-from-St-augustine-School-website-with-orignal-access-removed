<?php
	require('../../init.php');
	head("Log in");
?>
	     <div class="jumbotron" style="padding-top:100px;">
      <div class="container">
        <h1>Log in</h1>
        <p>Please log in to your account in order to do things like blogging, commenting, and a lot more.</p>
        <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
	<div class="container">
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://chrome.google.com/">upgrade your browser</a> to get the bes$
	        <![endif]-->

		<?php
			#require '/var/www/func/login/core/init.php';
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

						# set the var for the rember me

						$remember = (Input::get('remember') === 'on') ? true : false ;
						# call login method
						$login = $user->login(Input::get('username'), Input::get('password'), $remember);

						# check if login is successful
						if ($login) {
							
						Session::flash('in', "You, " . $user->data()->name . ", have been successfully logged in. Have fun!");
						Redirect::to("../flash.php");
						}else{
							  echo "sorry, we could not log you in";
						}
					}else{
						# fail
						$go = true;
					}
				}else{
					echo "<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">CSRF request detected. Click to read more.</a>
					<br>If you still have any questions, visit our help guidelines at <a href=\"/help/policies#csrf\"> CSRF F.A.Q.</a>";
				}
			}elseif(Session::exists(Config::get('session/session_name'))){
				Redirect::to('/account-control');
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

					<div class="field">
						<tr>
							<td colspan="2" style="text-align:center;">
								<label for="remember">
									<input type="checkbox" name="remember" id="remember" />
									Remember Me
								</label>
							</td>
						</tr>
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

		<p>Don't have an account yet? <a href="../register">Register Here!</a></p>
	        
	</div>
<body>
</html>