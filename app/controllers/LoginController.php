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

<<<<<<< HEAD
    	if(!($_POST['username']) || !($_POST['password']))
    	{
    		self::echoresultnexit(1);
    	}
=======
    	
>>>>>>> 7938a201cad1fcf2a1ccbe0b0261bd229076848a

    	$loginresult = User::login($_POST['username'],$_POST['password']);
     	
    }

}