<?php

function bleep($p){
	$swearo = array();
	require '/var/www/func/bleep/swearo.php';

	
	
	$swearr = array();
	require '/var/www/func/bleep/swearr.php';

	# the words listed here are only for filtering purposes and are never showen to the visitors
	# if you are conserned about the contents of this file, please go put a sock in it. This is to
	# protect the children.
	
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
	$swearo[] = 'bloody';
	$swearr[] = '******';
	$swearo[] = 'sex';
	$swearr[] = '***';
	$swearo[] = 'bitch';
	$swearr[] = '*****';
	$swearo[] = 'piss';
	$swearr[] = '****';
	$swearo[] = 'cock';
	$swearr[] = '****';
	$swearo[] = 'tit';
	$swearr[] = '***';
	$swearo[] = 'cum';
	$swearr[] = '***';

	$pass = str_ireplace($swearo, $swearr, $p);

	if($pass == $p){
		return array($p, true);
	}else{
		return array($p. false);
	}
}
