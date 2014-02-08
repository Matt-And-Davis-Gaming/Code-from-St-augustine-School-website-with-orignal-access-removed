<?php

	require('../dbcnct.php');

	$query = "
		INSERT INTO  `error`.`404` (
			`id` ,
			`name`
		)
		VALUES (
			NULL ,  'matthew krueger'
		';//);";


	//mysql_query($query) or die(mysql_error());
$num = rand(2,6); 
#panda.jpg
?>
<!DOCTYPE html>
<html>
<head>
<title>Sorry! The page you are looking for was not found on the website. Please try again! Error Code: 404</title>
</head>
<body>
<img style="float:center;" src="
	<?php

	switch($num):

	 case 1:
		echo "/error/httpd/homer.gif";
	break;
	case 2:
		echo "/error/httpd/dog.gif";
	break;
	case 3:
		echo "/error/httpd/fall.jpg";
	break;
	case 4:
		echo "/error/httpd/juice.jpg";
	break;
	case 5:
		echo "/error/httpd/darn.jpg";
	break;
	case 6:
		echo "/error/httpd/panda.jpg";
	break;
	endswitch;

	?>
" />

<p>SORRY! We made a boo-boo and the page you are looking for was not found on the website. Please try again! Error Code: 404</p>
<p>Technical Info: (if you know why one of these errors happened, please put ot on the suggustions page)</p>
<p>
<?php
$ip = getenv ("REMOTE_ADDR");
$requri = getenv ("REQUEST_URI");
$servname = getenv ("SERVER_NAME");
$combine = $ip . " tried to load " . $servname . $requri ;
$httpref = getenv ("HTTP_REFERER");
$httpagent = getenv ("HTTP_USER_AGENT");
$today = date("D M j Y g:i:s a T");
$note = "You are in a wrong page!" ;
$message = "$today \n
<br>
$combine <br> \n
User Agent = $httpagent \n
<h2> $note </h2>\n
<br> $httpref ";
$message2 = "$today \n
$combine \n
User Agent = $httpagent \n
$note \n
$httpref ";
$to = "error@yourdomain.com";
$subject = "yourdomain Error Page";
$from = "From: fake@yourdomain.com\r\n";
//mail($to, $subject, $message2, $from);
echo $message;
?>
</p>
</body>
</html>
