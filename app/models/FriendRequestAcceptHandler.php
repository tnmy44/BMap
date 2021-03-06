<?php


namespace Models;

class FriendRequestAcceptHandler
{

    

	public static function getDB()
	{

			require ("Cread.php");
			return new \PDO("mysql:dbname={$creden['database']};host={$creden['host']}" ,  $creden['username'] , $creden['password']);	
	}

	

	public static function acceptFR($user1 , $user2)
	{
		$db = self::getDB();

		$me = 1;
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

			if($status==3) return 2;
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
			
			if($status==0){
				return 1;
			}
			


		}else{

			return 1;

		}

	}
}
?>