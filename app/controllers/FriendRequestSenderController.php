<?php

namespace Controllers;
use Models\FriendRequestSenderHandler;

class FriendRequestSenderController
{
	
    public static function echoresultnexit($id)
    {
        echo('{"result" : "' . $id . '"}');
        exit();
    }   

	public static function post()
	{
		
		if(!isset($_POST['user2']) || !($_POST['user2']))
    	{
    		self::echoresultnexit(7);
    	}

    	
		FriendRequestSenderHandler::sendFR($_SESSION['userid'] , $_POST['user2']);
		
	}
}
?>
