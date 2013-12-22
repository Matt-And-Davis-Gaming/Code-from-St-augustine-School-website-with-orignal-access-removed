<?php
require '/var/www/test-pages/login/core/init.php';
if(Session::exists('succuss')){
  echo "exists";
  echo Session::flash("succuss");
}