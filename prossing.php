<?php

switch($_POST['action']){
	case "signIn":
		echo "This action has not yet been created and is intended for future refrence. Please try again later";
		header("Refresh:2;/");
	break;
	default:
		echo "Sorry! We could not find the action given. Site Specific error code: 1";
	break;
}
