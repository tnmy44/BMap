<?php

namespace Controllers;
use Models\FriendRequstSenderHandler;

class FriendRequestSenderController
{
	
	public static function post()
	{
		
		$updateRequest = FriendRequstSenderHandler::sendFR($user1 , $user2); 	
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
