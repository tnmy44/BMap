<?php 

namespace Controllers;

use Models\User;

class LoginController {
    

    public static function echoresultnexit($id)
    {
        echo('{"result" : "' . $id . '"}');
        exit();
    }   
    
    public function post()
    {

    	

    	if(!isset($_POST['username']) || !isset($_POST['password']))
    	{
    		self::echoresultnexit(7);
    	}

    	if(!($_POST['username']) || !($_POST['password']))
    	{

    		self::echoresultnexit(7);

    	}

    	

    	$userinfo = User::login($_POST['username'],$_POST['password']);

        $_SESSION['status']=1;
        $_SESSION['userid']= $userinfo['userid'];

    	echo('{"result" : ' . 0 . '",userid" : "' .  $userinfo['userid'] .  '","username" : "' .  
    		$userinfo['username'] .  '","name" : "' .  $userinfo['name'] .  '","email" : "' .  $userinfo['email'] . 
    		 '","privacy" : "' .  $userinfo['privacy'] .  '"}');
     	
    }

}