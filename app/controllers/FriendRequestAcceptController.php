<?php

namespace Controller;
use Models\FriendRequstAcceptHandler;

class FriendRequstAcceptController
{
	public static function post()
	{
		$user1 = $_POST['user1'];
		$user2 = $_POST['user2'];
		if($user1>$user2)
		{
			$temp = $user1;
			$user1 = $user2;
			$user2 = $temp;
		}
		$updateRequest = FriendRequstAcceptHandler::update($user1 , $user2); 	
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