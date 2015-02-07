<?php

namespace Controllers;
use Models\SearchFriendsHandler;
use Models\User;

class SearchFriendsController
{
	public static function post()
	{
		$searchedFriend = $_POST['searchedFriend'];
		$result = SearchFriendsHandler::friendData($searchFriend);
		if($result>0)
		{
			$userDetails = User::getDetails($result);
			return $userDetails;
		}
		else
		{
			return '{"result":"{ $result }"}';
		}

	}
}