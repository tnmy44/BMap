<?php

namespace Controllers;
use Models\Signup;
class SignUpController
{
	public static function __construct()
	{

	}
	public static function post()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$created = Signup::create($username , $password);
		if($created)
		{

		}
		else
		{
			
		}
	}
}