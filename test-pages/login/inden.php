<?php
//echo PHP_VERSION;
ini_set('display_errors', '1');
error_reporting(-1);
require_once 'core/init.php';

/*$user = DB::getInstance()->update('users', 3, array(
	'username'	=> 'Dale',
	'password'	=> 'new_hashed_passphrase',
	'salt'		=> 'salt',
	'name'		=> 'Dale Garrett'
));*/

# echo "<pre>", print_r($_SESSION), "</pre>";
# echo "User id is: ";
$user = new User();
if($user->isLoggedIn()){
	?>
		<p>Hello <a href="#"><?php echo escape($user->data()->name); ?></a></p>

		<ol>
			<li><a href="logout.php">Log out</a></li>
		</ol>
	<?php
}else{
	
}