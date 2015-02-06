<?php
include("Cread.php");

namespace Models;

class FriendRequestAcceptHandler
{

	public static function getDB()
	{
		return new \PDO("mysql:dbname={$sqldb};host={$sqlhost}" , "{$sqluser}" , "$sqlpass");
	}

	public static function acceptFR($user1 , $user2)
	{
		$db = self::getDB();
		$statement = $db->prepare("UPDATE relations SET status = 2 WHERE user1 = :user1 AND user2 = :user2");
		$statement->bindValue(":user1" , $user1 , \PDO::PARAM_INT);
		$statement->bindValue(":user2" , $user2 , \PDO::PARAM_INT);
		$result = $statement->execute();
		if($result)
			return true;
		else
			return false;
	}
}
?>