<?php
require '/var/www/test-pages/login/core/init.php';
if(Session::exists('home')){
  # echo "<pre>", print_r($_SESSION), "</pre>";
  echo Session::flash("home");
  header("Refresh: 3; inden.php");
}