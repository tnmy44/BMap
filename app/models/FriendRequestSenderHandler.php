<?php


namespace Models;

class FriendRequestSenderHandler
{
	

    public static function echoresultnexit($id)
    {
        echo('{"result" : "' . $id . '"}');
        exit();
    }   

	public static function getDB()
	{

			require ("Cread.php");
			return new \PDO("mysql:dbname={$creden['database']};host={$creden['host']}" ,  $creden['username'] , $creden['password']);	
	}

	public static function sendFR($user1 , $user2)
	{
		$db = self::getDB();
		$checkQuery = $db->prepare("SELECT * FROM relations WHERE user1 = :user1 AND user2  = :user2");
		$user1 = $_SESSION['userid'];
		$user2 = $_POST['user2'];
		$me=1;
		if($user1>$user2)
		{
			$me=2;
			$temp = $user1;
			$user1 = $user2;
			$user2 = $temp;
		}
		$checkQuery->bindValue(":user1" , $user1 , \PDO::PARAM_INT);
		$checkQuery->bindValue(":user2" , $user2 , \PDO::PARAM_INT);
		if(!($checkQuery->execute())) 
			echoresultnexit(7);



		$row = $checkQuery->fetch(\PDO::FETCH_ASSOC);



		if($row){
			if($row['status']==3)
				echoresultnexit (2);

			if($me==1)
			{
				if($row['status']==1)
					echoresultnexit(1);		//you have already sent fr
				if($row['status']==2)

					// he had sent. now make them friends.
					$statement = $db->prepare("UPDATE relations SET status = 1 WHERE user1 = :user1 AND user2 = :user2");
					$statement->bindValue(":user1" , $user1 , \PDO::PARAM_INT);
					$statement->bindValue(":user2" , $user2 , \PDO::PARAM_INT);
					if(!($checkQuery->execute())) 
						echoresultnexit(7);
					echoresultnexit(3);
			}
			else
			{
				if($row['status']==2)
					echoresultnexit(1);
				if($row['status']==1)
					// he had sent. now make them friends.
					$statement = $db->prepare("UPDATE relations SET status = 1 WHERE user1 = :user1 AND user2 = :user2");
					$statement->bindValue(":user1" , $user1 , \PDO::PARAM_INT);
					$statement->bindValue(":user2" , $user2 , \PDO::PARAM_INT);
					if(!($checkQuery->execute())) 
						echoresultnexit(7);
					echoresultnexit(3);

			}
			
		}
		else	
		{
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