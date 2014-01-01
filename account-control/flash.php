<h1>
<?php
ini_set('display_errors', '1');
			error_reporting(-1);
require '/var/www/func/login/core/init.php';

if(Session::exists('home')){
  # echo "<pre>", print_r($_SESSION), "</pre>";
  echo Session::flash("home");
  header("Refresh: 3; login.php");
}
if(Session::exists('in')){
	echo Session::flash('in');
	header('Refresh: 3; ./');
}
?>
</h1>