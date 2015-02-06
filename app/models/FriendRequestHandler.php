<?php
include("Cread.php");

namespace Models;

class FriendRequestHandler
{
	public  function __construct()
	{

	}

	public static function getDB()
	{
		return new \PDO("mysql:dbname={$sqldb};host={$sqlhost}" , "{$sqluser}" , "$sqlpass");
	}

	public static function update($user1 , $user2)
	{
		$db = self::getDB();
		$checkQuery = $db->prepare("SELECT * FROM relations WHERE user1 = :user1 AND user2  = :user2");
		$user1 = $_SESSION['userid'];
		$user2 = $_POST['user2'];
		$setSwap = false;
		if($user1>$user2)
		{
			$setSwap = true;
			$temp = $user1;
			$user1 = $user2;
			$user2 = $temp;
		}
		$checkQuery->bindValue(":user1" , $user1 , \PDO::PARAM_INT);
		$checkQuery->bindValue(":user2" , $user2 , \PDO::PARAM_INT);
		$checkQuery->execute();
		$row = $checkQuery->fetch(\PDO::FETCH_ASSOC);
		if($row){
			if($row['status']==2)
				echo ('"result":"2"');
			if($setSwap)
			{
				if($row['status']==1)
					echo ('"result":"3"');
				if($row['status']==3)
					echo('"result":"1"');
			}
			else
			{
				if($row['status']==1)
					echo ('"result":"1"');
				if($row['status']==3)
					echo('"result":"3"');

			}
			//some other lines of code determining which user has sent the friend request and which user has to accept the friend request
			return true;
		}
		else	
		{//few lines remaining
			$statement = $db->prepare("UPDATE relations SET status = 1 WHERE user1 = :user1 AND user2 = :user2");
			$result = $statement->execute(array(
				"user1" => $user1,
				"user2" => $user2
				));
			if($result)
			{
				echo('"return":"0"');
				return true;
			}
			else
			{
				echo('"return":"7"');
				return false;
			}
		}
	}
}
?>