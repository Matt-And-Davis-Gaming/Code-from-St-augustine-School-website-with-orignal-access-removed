<?php
	//require '/var/www/test-pages/login/core/init.php';

/*	if(Input::exists()){
		#echo "Submitted. Username = " . Input::get("username");
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' 		=> array(
								'required' 	=> true,
								'min' 		=> 2,
								'max'		=> 20,
								'unique'	=> Config::get('mysql/db'),
								'name'		=> 'Username'
							),
			'password' 		=> array(
								'required' 	=> true,
								'min' 		=> 6,
								'name'		=> 'Password'
							),
			'password_again'=> array(
								'required' 	=> true,
								'matches'	=> 'password',
								'name'		=> 'Repeat Password'
							),
			'name' 			=> array(
								'required' 	=> true,
								'min' 		=> 2,
								'max'		=> 50,
								'name'		=> 'Real Name'
							)
		));
/*
		if ($validation->passed()) {
			echo 'Success';
		}else{
			echo "<pre>", print_r($validation->errors()), "</pre>";
		}
	}
*/
?>

<form action="" method="post">
	<table>
		<thead>

		</thead>
		<tbody>
			<tr><div class="field">
				<td><label for="username">Please choose a username</label></td>
				<td><input type="text" name="username" id="username" value="" autocomplete="off" /></td>
			</div></tr>
			<tr><div class="field">
				<td><label for="password">Please choose a password</label></td>
				<td><input type="password" name="password" id="password" /></td>
			</div></tr>
			<tr><div class="field">
				<td><label for="password_again">Repeat your password please</label></td>
				<td><input type="password" name="password_again" id="password_again" /></td>
			</div></tr>
			<tr><div class="field">
				<td><label for="name">Please enter your name</label></td>
				<td><input type="text" name="name" id="name" value="" autocomplete="off" /></td>
			</div></tr>

			<tr><td colspan="2" style="text-align:center;float:center;"><input type="submit" value="Register" /></td></tr>
		</tbody>
	</table>
</form>