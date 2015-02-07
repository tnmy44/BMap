<?php

namespace Controllers;
use Models\FriendRequestAcceptHandler;

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

		$accCode = FriendRequestAcceptHandler::acceptFR($user1 , $user2); 	
		
		echo('"result" : ' . $accCode . '"');

	}
}