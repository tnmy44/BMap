<?php

namespace Controller;
use Models\FriendRequstAcceptHandler;

class FriendRequestAcceptController
{
	public static function post()
	{
		if(!isset($_SESSION['userid']) || !($_POST['user2']))
		{
			echo('{"result" : "7"}');
			exit();
		}
		$user1 = $_SESSION['userid'];
		$user2 = $_POST['user2'];
		
		$updateRequest = FriendRequstAcceptHandler::acceptFR($user1 , $user2); 	
		if($updateRequest)
		{
			//send "Friend Request accepted!You are now friends"
		} 
		else
		{
			//send "There was some error in accepting the friend request. Please try again!";
		}

	}
}