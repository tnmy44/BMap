<?php

namespace Controllers;
use Models\UserDetailsHandler;
use Models\User;

class UserDetailsController
{
	public static function post()
	{
		$searchedFriend = $_POST['username'];
		UserDetailsHandler::getUserData($searchedFriend);
		
	}
}