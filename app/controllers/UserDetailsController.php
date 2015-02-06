<?php 

namespace Controllers;

use Models\User;

class UserDetailsController {
    
   
    
    public function post()
    {

    	if(!isset($_POST['userid']) || !($_POST['userid']))
    	{
    		echo "1";
    		exit();
    	}


    	$loginresult = User::getUser($_POST['userid']);
     	
    }
}