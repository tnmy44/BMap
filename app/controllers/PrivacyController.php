<?php

namespace Controllers;
use Models\PrivacyUpdate;

public static function __construct()
{
		
}

public static function post()
{
	$privacySetter = $_POST['privacy'];
	$updatePrivacy = PrivacyUpdate::changeSettings($privacySetter);
	if($updatePrivacy==0)
		echo('"result" : "0"');
	else if($updatePrivacy==1)
		echo('"result" :  "1"');
	else if($updatePrivacy==2)
		echo('"result" :  "2"');

}