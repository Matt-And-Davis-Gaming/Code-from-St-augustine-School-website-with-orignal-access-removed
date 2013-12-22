<?php
require '/var/www/test-pages/login/core/init.php';
if(Session::exists('success')){
  # echo "<pre>", print_r($_SESSION), "</pre>";
  echo Session::flash("success");
  header("Refresh: 3; inden.php");
}