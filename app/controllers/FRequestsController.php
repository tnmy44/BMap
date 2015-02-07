<?php 

namespace Controllers;

use Models\FRequestsHandler;

class FRequestsController {
    

    public static function echoresultnexit($id)
    {
        echo('{"result" : "' . $id . '"}');
        exit();
    }   
    
    public function post()
    {

    	$userinfo = FRequestsHandler::fetchRequests();


    	echo('{"result" : ' . 0 . '",userid" : "' .  $userinfo['userid'] .  '","username" : "' .  
    		$userinfo['username'] .  '","name" : "' .  $userinfo['name']  . 
    		 '","privacy" : "' .  $userinfo['privacy'] .  '"}');
     	
    }

}