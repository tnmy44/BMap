<?php

namespace Models;

require ("Cread.php");

class Signup

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

	public static function create($username , $passhash , $name , $privacy)
	{
		$db = self::getDB();
		$checkQuery = $db->prepare("SELECT * FROM  users WHERE username = :username");
		$checkQuery->bindValue(":username" ,  $username);
		$checkQuery->execute();

		$row = $checkQuery->fetch(\PDO::FETCH_ASSOC);
		if($row)
		{
			return 1;
		}
		else
		{
			$passhash = md5($passhash);
			$db = self::getDB();
			$statement = $db->prepare("INSERT INTO users (username , passhash , name , privacy) VALUES(:username, :passhash , :name , :privacy)");
			$result = $statement->execute(array(
				"username" => $username , 
				"passhash" => $passhash,
				"name" => $name , 
				"privacy" => $privacy));
			if($result)
				return 0;
			else
				return 7;
		}
	}
}