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

		$user = 1;
		if($user1>$user2)		
		{
			$temp = $user1;
			$user1 = $user2;
			$user2 = $temp;
			$me = 2;
		}
		
		$checkQuery = $db->prepare("SELECT * FROM relations WHERE user1 = :user1 AND user2  = :user2");
		$checkQuery->bindValue(":user1" , $user1 , \PDO::PARAM_INT);
		$checkQuery->bindValue(":user2" , $user2 , \PDO::PARAM_INT);
		$checkQuery->execute();
		

		if($row = $checkQuery->fetch(\PDO::FETCH_ASSOC)){

			$status = $row['status'];

			if($status==0) return 2;
			if($status==1 || $status==2){
				if($me==$status) return 3;

				$statement = $db->prepare("UPDATE relations SET status = 3 WHERE user1 = :user1 AND user2 = :user2");
				$statement->bindValue(":user1" , $user1 , \PDO::PARAM_INT);
				$statement->bindValue(":user2" , $user2 , \PDO::PARAM_INT);
				$result = $statement->execute();

				if($result)
					return 0;
				else 
					return 7;
			}
			
			if($status==3){
				return 2;
			}
			


		}else{


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
}
?>