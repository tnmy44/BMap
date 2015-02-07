<?php

namespace Controllers;
use Models\Signup;
class SignUpController
{
	
    public static function echoresultnexit($id)
    {
        echo('{"result" : "' . $id . '"}');
        exit();
    }   

	public static function post()
	{
		if(!isset($_POST['username']) || !isset($_POST['name']) || !isset($_POST['password'])|| !isset($_POST['privacy']))
			echoresultnexit(7);

		if(!($_POST['username']) || !($_POST['name']) || !($_POST['password'])|| !($_POST['privacy']))
			echoresultnexit(7);

		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$privacy = $_POST['privacy'];
	
		$created = Signup::create($username , $password  , $name , $privacy);
		echo ('{"result":"' . $created . '"}');
		
	
	}
}