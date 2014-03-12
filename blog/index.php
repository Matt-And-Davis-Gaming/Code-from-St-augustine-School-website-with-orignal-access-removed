<?php
require 'resources/init.php';
  head("Blog");?>
  	     <div class="jumbotron" style="padding-top:100px;">
      <div class="container">
      	<?php
      	if($user->isLoggedIn()){
        	echo "<h1>Hello <a href=\"/user/" . escape($user->data()->username) . "\">" . escape($user->data()->name) . "</a>!</h1>";
    	}else{
    		echo "<h1>Hello!</h1>";
    	}
        ?>
        <p>Welcome to the blog of St. Augustine!</p>
      </div>
    </div>
	<div class="container">
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://chrome.google.com/">upgrade your browser</a> to get the bes$
	        <![endif]-->
            <?php

            if ($user->hasPermission('admin')) {
              echo "<p>You are an administrator</p>";
            }
          ?>


	</div>
<body>
</html>