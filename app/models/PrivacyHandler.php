<?php

namespace Models;

class PrivacyHandler{




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

	public static function changeSettings($setting)
	{
		$db = self::getDB();

		$statement = $db->prepare("UPDATE users SET privacy = :privacy WHERE userid = :id");
		$statement->bindValue(":privacy" , $setting , \PDO::PARAM_INT);
		$statement->bindValue(":id" , $_SESSION['userid'] , \PDO::PARAM_INT);

		
		if(!($result = $statement->execute()))
			self::echoresultnexit(7);
		self::echoresultnexit(0);
		
	}
}