<?php
require '/var/www/test-pages/login/core/init.php';
if(Session::exists('success')){
  echo "exists";
  echo Session::flash("success");
}