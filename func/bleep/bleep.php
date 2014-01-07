<?php

function bleep($p){
	$swearo = array();
	require '/var/www/func/bleep/swearo.php';

	
	
	$swearr = array();
	require '/var/www/func/bleep/swearr.php';
	
	$swearo[] = 'fuck';
	$swearr[] = '****';
	$swearo[] = 'fück';
	$swearr[] = '****';
	$swearo[] = 'shit';
	$swearr[] = '****';
	$swearo[] = 'sh1t';
	$swearr[] = '****';
	$swearo[] = 'ass';
	$swearr[] = '***';
	$swearo[] = 'butt';
	$swearr[] = '****';
	$swearo[] = 'anus';
	$swearr[] = '****';
	$swearo[] = 'damn';
	$swearr[] = '****';
	$swearo[] = 'fick';
	$swearr[] = '****';
	$swearo[] = 'penis';
	$swearr[] = '*****';
	$swearo[] = 'vagina';
	$swearr[] = '******';
	$swearo[] = 'homo';
	$swearr[] = '****';
	$swearo[] = 'cunt';
	$swearr[] = '****';
	$swearo[] = 'hell';
	$swearr[] = '****';
	$swearo[] = 'bloody';
	$swearr[] = '******';
	$swearo[] = 'sex';
	$swearr[] = '***';

	$p = str_ireplace($swearo, $swearr, $p);

	return $p;
}