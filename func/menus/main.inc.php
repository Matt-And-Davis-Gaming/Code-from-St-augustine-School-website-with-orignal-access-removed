<?php
require_once '/pass.php';
mysql_connect("localhost","root",PASS) or die("mysql Error");
function gen_menu($name = "unnamed page"){
	$con = "class=\"active\"";
	$location = getenv ("REQUEST_URI");
	//echo $ip;
	$ar[1] = '<nav class="collapse navbar-collapse bs-navbar-collapse" style="
text-align:center;
float: left;
" role="navigation"><ul class="nav navbar-nav nav-right">';
	
	switch($location){
		case "/":
			case "/index.php":
			case "/index2.php":
			$ar[2] = '
				<li class="active"><a href="/">' . $name . '</a></li>
        		<li><a href="/parents">Parents</a></li>
				<li><a target="_blank" href="//staugie.net">Church Website</a></li>
        		<li><a href="/kids">Kids Area</a></li>';
		break;
		case "/kids/":
			case "/kids/index.php":
			$ar[2] = '
				<li class="active"><a href="/">' . $name . '</a></li>
        		<li><a href="/parents">Parents</a></li>
				<li><a target="_blank" href="//staugie.net">Church Website</a></li>
        		<li><a href="/kids">Kids Area</a></li>';
		break;
	}
	return $ar[1] . $ar[2] . '</ul></nav>';
}
//gen_menu("Home");

/*<nav class="collapse navbar-collapse bs-navbar-collapse" style="
text-align:center;
float: left;
" role="navigation">

<ul class="nav navbar-nav nav-right">
        <li class="active">
          <a href="./getting-started">Home</a>
        </li>
        <li>
          <a href="./css">CSS</a>
        </li>
        <li>
          <a href="./components">Components</a>
        </li>
        <li>
          <a href="./javascript">JavaScript</a>
        </li>
      </ul>*/
