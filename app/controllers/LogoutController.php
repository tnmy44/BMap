<?php 

namespace Controllers;



class LogoutController {
    

    public static function echoresultnexit($id)
    {
        echo('{"result" : "' . $id . '"}');
        exit();
    }   
    
    public function post()
    {
        if($_SESSION['status']==0)
            self::echoresultnexit(1);

        session_destroy();
        self::echoresultnexit(0);
    }

}