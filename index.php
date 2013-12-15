<?php
	require('init.php');
?>
<!DOCTYPE html>
<html manifest="/cache.manifest">
<head>
        <!-- our goal is to educate, and to instruct in the matters of God -->
        <title>Home - St. Augustine Catholic School</title>
        <!-- Google Chrome Frame -->
        <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>

        <!-- jquery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap-theme.min.css">

<!-- set viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<link rel="shortcut icon" href="/favicon.ico">
</head>
<body>
        <!-- navbar -->
	    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">St. Augustine School</a>
        </div>
        <div class="navbar-collapse collapse">
	<?php echo gen_menu("Home"); 
?> 
          <form style="float: right;" class="navbar-form nav-center" method="post" action="/prossing.php">
	    <div class="form-group">
              <input type="text" placeholder="Username" class="form-control" name = "username">
		<input type="hidden" name="action" value="signIn" />
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
	     <div class="jumbotron" style="padding-top:100px;">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
	<div class="container">
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://chrome.google.com/">upgrade your browser</a> to get the bes$
	        <![endif]-->
		<div class="row">
        		<div class="col-md-4">
          			<h2>Heading</h2>
          				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          				<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        		</div>
        		<div class="col-md-4">
         			<h2>Heading</h2>
          				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          				<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       			</div>
        		<div class="col-md-4">
          			<h2>Heading</h2>
          				<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          				<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        		</div>
		</div>
	</div>


<?php
	echo $_GET['username'];
?>
<body>
</html>
