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

    	FRequestsHandler::fetchRequests();
     	
    }

}