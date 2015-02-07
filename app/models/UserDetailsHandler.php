<?php

namespace Models;



class UserDetailsHandler
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
	public static function getUserData($searchFriend)
	{
		$db = self::getDB();
		

		$statement = $db->prepare("SELECT * FROM users WHERE username = :user ");
		$statement->bindValue(":user" , $searchFriend);

		$result = $statement->execute();

		if(!$result)
			self::echoresultnexit(7);

		if(!($row = $statement->fetch(\PDO::FETCH_ASSOC)))
			self::echoresultnexit(1);

		
		echo ('{"result":"'. 0 .'",
			"userid":"'.$row["userid"].'",
			"username":"'.$row["username"].'",
			"name":"'.$row["name"].'",
			"privacy":"'.$row["privacy"] . '" }');

		exit();
		
	}

}