        <?php
          //echo PHP_VERSION;
          ini_set('display_errors', '1');
          error_reporting(-1);
          require '/var/www/func/login/core/init.php';
          # die(Config::get('mysql/table/session'));
          /*$user = DB::getInstance()->update('users', 3, array(
            'username'  => 'Dale',
            'password'  => 'new_hashed_passphrase',
            'salt'    => 'salt',
            'name'    => 'Dale Garrett'
          ));*/

          # echo "<pre>", print_r($_SESSION), "</pre>";
          # echo "User id is: ";
          $user = new User();
        ?>

<?php
	require('../init.php');
	head("Account Control");
?>
	     <div class="jumbotron" style="padding-top:100px;">
      <div class="container">
        <h1>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->name); ?></a>!</h1>
        <p>From this page, you can choose to make changes to your account, change your password, and read information.</p>
      </div>
    </div>
	<div class="container">
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://chrome.google.com/">upgrade your browser</a> to get the bes$
	        <![endif]-->
            <?php
                    if($user->isLoggedIn()){
            ?>

              <ol>
                <li><a href="logout.php">Log out</a></li>
                <li><a href="update.php">Update user information</a></li>
                <li><a href="changepassword.php">Change your password</a></li>
              </ol>
            <?php

            if ($user->hasPermission('admin')) {
              echo "<p>You are an administrator</p>";
            }
            
            

          }else{
            Redirect::to('login');
          }
          ?>


	</div>
<body>
</html>
