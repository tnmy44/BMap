<?php

namespace Controllers;
use Models\Signup;
class SignUpController
{
	
	public static function post()
	{
		if(!($_POST['username']) || !($_POST['username']) || !($_POST['username']) || !($_POST['username']) )
			echo('{"result" : "7"}');
		else
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$privacy = $_POST['privacy'];
		
			$created = Signup::create($username , $password  , $name , $privacy);
			echo ('{"result":"' . $created . '"}');
			
		}
	}
}