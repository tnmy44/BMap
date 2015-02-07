<?php 

namespace Controllers;

use Models\User;

class LoginController {
    

    public static function echoresultnexit($id)
    {
        echo('"result" : "' . $id . '"');
        exit();
    }   
    
    public function post()
    {

    	if(!isset($_POST['username']) || !isset($_POST['password']))
    	{
    		self::echoresultnexit(1);
    	}

    	if(!($_POST['username']) || !($_POST['password']))
    	{
    		self::echoresultnexit(1);
    	}

    	$loginresult = User::login($_POST['username'],$_POST['password']);
     	
    }

}