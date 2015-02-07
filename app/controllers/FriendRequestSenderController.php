<?php

namespace Controllers;
use Models\FriendRequestSenderHandler;

class FriendRequestSenderController
{
	
	public static function post()
	{
		
		if(!isset($_POST['user2']) || !($_POST['user2']))
    	{
    		self::echoresultnexit(7);
    	}

    	
		$result = FriendRequestSenderHandler::sendFR($user1 , $user2); 	
		if($updateRequest)
		{
			//send "Friend Request sent!"
		}
		else
		{
			//send "There was some error in sending the friend request. Please try again!";
		}

	}
}
?>
