<?php
require '/var/www/func/login/core/init.php';

$user = new User();
$user->logout();

Redirect::to('/account-control');