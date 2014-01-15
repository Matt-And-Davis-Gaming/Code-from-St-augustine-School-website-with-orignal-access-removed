<?php
ini_set('display_errors', '1');
error_reporting(-1);
	require '/var/www/func/login/core/init.php';
	require '/var/www/func/bleep/bleep.php';

	DB::getInstance();

	$chatd = Config::get('mysql/table/chat1');
	$userd = Config::get('mysql/table/users');

	$sql = "SELECT
		`{$chatd}`.`timestamp`,
		`{$chatd}`.`message`,
		`{$chatd}`.`user_id`,
		`{$chatd}`.`id` AS `chat`,
		`{$userd}`.`id`,
		`{$userd}`.`username`,
		`{$userd}`.`name`,
		`{$userd}`.`joined`
		FROM {$chatd}
		INNER JOIN `{$userd}`
		ON `{$chatd}`.`user_id`=`{$userd}`.`id`;
		";

	$results = DB::getInstance()->query($sql);

	foreach($results->results() as $result){
		if($result->chat > 10){
			DB::getInstance()->query('TRUNCATE TABLE `{$chatd}`');
		}
	}