
<?php
require("/init.php");
function head($title = "untitled"){
	/*mysql_select_db("files");
	$stuff = mysql_query("SELECT * FROM `Include Componets` WHERE (`id`=1 OR `id` = 2)") or die(mysql_error());
	$rows = Array();
	$num = mysql_num_rows($stuff) or die("Error with rows");
	if($num == 0):
		die("Error");
	endif;
	while($row = mysql_fetch_assoc($stuff)){
		$rows[] = $row
	}
	echo "<pre>", print_r($rows), "</pre>";
	die();*/
	//echo gen_menu($title);
	$side = Array();
	$side[1] = 	file_get_contents("/var/www/func/page/c_1");
	//echo $side[1];
	$side[2] = 	gen_menu($title);
	$side[3] = 	file_get_contents("/var/www/func/page/c_2");
	$titl  = 	"<title>" . $title;

	$side[1] = str_replace("<title>jkladf", $titl, $side[1]);

	echo implode($side, '

');
}

//head();
