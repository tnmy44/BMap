<?php

namespace Models;

class SearchFriendsHandler
{
	public static function getDB()
	{
		include("Cread.php");
		return new \PDO("mysql:dbname=$credn['dbname']; host=$credn['host']" ,$credn['username'] , $credn['password']);
	}
	public static function friendData($searchFriend)
	{
		$db = self::getDB();
		$ownName = $_SESSION['username'];
		if($searchFriend==$ownName)
			return 0;
		$statement = $db->prepare("SELECT * FROM users WHERE username = :user ");
		$statement->bindValue(":users" , $searchFriend);
		$statement->execute();
		$row = $statement->fetch(\PDO::FETCH_ASSOC);
		if($row)
			return $row['id'];
		else
			return -1;
	}

}