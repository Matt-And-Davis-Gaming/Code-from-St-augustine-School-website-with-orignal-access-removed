<?php
ini_set('display_errors', '1');
error_reporting(-1);
	require '/var/www/func/login/core/init.php';
	require '/var/www/func/bleep/bleep.php';

	DB::getInstance();

	$chatd = Config::get('mysql/table/chat1');
	$userd = Config::get('mysql/table/users');

	$sql = "SELECT
		`{$chatd}`.`timestamp` AS `mt`,
		`{$chatd}`.`message` AS `m`,
		`{$chatd}`.`user_id` AS `uid`,
		`{$userd}`.`id`,
		`{$userd}`.`username` AS `n`,
		`{$userd}`.`name` AS `fn`,
		`{$userd}`.`joined` AS `d`
		FROM {$chatd}
		INNER JOIN `{$userd}`
		ON `{$chatd}`.`user_id`=`{$userd}`.`id`;
		";

		die($sql);

	DB::getInstance()->query("

	");