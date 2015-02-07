<?php

namespace Controllers;
use Models\Signup;
class SignUpController
{
	
	public static function post()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$created = Signup::create($username , $password);
		if($created==0)
		{
			echo ('{"result":"0"}');
		}
		else if($created==1)
		{
			echo('{"result":"1"}');
		}
		else if($created==7)
		{
			echo('{"result":"7"}');
		}
	}
}