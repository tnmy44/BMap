<?php

namespace Controller;
use Models\FriendRequstHandler;

class FriendRequestSenderController
{
	public static function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ .'/../views');
		$this->twig = new \Twig_Environment($loader);
	}
	public static function post()
	{
		
		$updateRequest = FriendRequstHandler::update($user1 , $user2); 	
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