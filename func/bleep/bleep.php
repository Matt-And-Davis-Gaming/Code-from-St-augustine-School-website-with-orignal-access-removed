<?php

function d($value,$replace)
{
	$swearo[] = $value;
	$swearr[] = $replace;
}

function bleep($p){
	$swearo = array();
	require '/var/www/func/bleep/swearo.php';
	
	$swearr = array();
	require '/var/www/func/bleep/swearr.php';

	d('fuck', '****');

	$p = str_ireplace($swearo, $swearr, $p);

	return $p;
}