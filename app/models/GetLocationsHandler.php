
<?php

namespace Models;
use Models\User;

class GetLocationsHandler
{
	public static function getDB()
	{

			require ("Cread.php");
			return new \PDO("mysql:dbname={$creden['database']};host={$creden['host']}" ,  $creden['username'] , $creden['password']);	
	}

	public static function echoresultnexit($id)
    {
        echo('{"result" : "' . $id . '"}');
        exit();
    } 

	public static function getLocations()
	{
		$db = self::getDB();
		$userid = $_SESSION['userid'];

		$statement = $db->prepare("SELECT * FROM users WHERE user1 != :userid");
		$statement->bindValue(":userid" , $userid , \PDO::PARAM_INT);

		$result = $statement->execute();

		if(!$result)
			self::echoresultnexit(7);

		$list='{"result":"0","people":[';
		
		while ($row=$statement->fetch(\PDO::FETCH_ASSOC)) {
			//$list = $list . self::getUserData($row['user2'] , $row['status']) . ',';
			getUserData($row['userid'],$row['privacy']);

		}


		$statement = $db->prepare("SELECT * FROM relations WHERE user2 = :user2 ");
		$statement->bindValue(":user2" , $user , \PDO::PARAM_INT);

		$result = $statement->execute();
			
		if(!$result)
			self::echoresultnexit(7);

		while ($row=$statement->fetch(\PDO::FETCH_ASSOC)){

			$list = $list . self::fetchFriendsLocation($row['user1'] , $row['status']) . ',';
		}


		$statement = $db->prepare("SELECT * FROM users WHERE privacy = 2");
		$result = $statement->execute();

			$db = self::getDB();
				$statement = $db->prepare("SELECT * FROM users WHERE userid!= :id AND privacy = 2");
				$user1 = $_SESSION['userid'];
				$statement->bindValue(':id', $user1, \PDO::PARAM_INT);
				

				$result = $statement->execute();
				if (!$result)
					self::echoresultnexit(7);

				while($row = $statement->fetch(\PDO::FETCH_ASSOC)){
					$list .= ('{"userid":"'.$row["userid"].'","username":"'.$row["username"].'","name":"'.$row["name"].'","status":"'.
					$row["privacy"] .'" }');
					
				}
				removecommawhichisnotuseful($list);
				
		

	}
	public static function getUserData($user2 , $privacy)
	{


		
		if($status==3)
		{
			$db = self::getDB();
				$statement = $db->prepare("SELECT * FROM users WHERE userid= :id AND privacy = 1");

				$statement->bindValue(':id', $user2, \PDO::PARAM_INT);
				

				$result = $statement->execute();
				if (!$result)
					self::echoresultnexit(7);

				if(!($row = $statement->fetch(\PDO::FETCH_ASSOC)))
					self::echoresultnexit(1);
				return ('{"userid":"'.$row["userid"].'","username":"'.$row["username"].'","name":"'.$row["name"].'","privacy":"'.
					$row["privacy"] .'" }');
		}
	}
	
} 