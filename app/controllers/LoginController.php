<?php 

namespace Controllers;

use Models\User;

class LoginController {
    
   
    
    public function post()
    {

    	if(!isset($_POST['username']) || !isset($_POST['password']))
    	{
    		echo "1";
    		exit();
    	}

    	

    	$loginresult = User::login($_POST['username'],$_POST['password']);
     	
    }
}