<?php

namespace Controller;
use Models\FriendRequstHandler;

class FriendRequstSenderController
{
	public static function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ .'/../views');
		$this->twig = new \Twig_Environment($loader);
	}
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