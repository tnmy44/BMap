<?php 

namespace Controllers;

use Models\FListHandler;

class FListController {
    

    public static function echoresultnexit($id)
    {
        echo('{"result" : "' . $id . '"}');
        exit();
    }   
    
    public function post()
    {

    	
        FListHandler::fetchList();
    }

}