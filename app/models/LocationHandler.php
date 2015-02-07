<?php

namespace Models;

class LocationHandler
{
	public static function getDB()
	{

			require ("Cread.php");
			return new \PDO("mysql:dbname={$creden['database']};host={$creden['host']}" ,  $creden['username'] , $creden['password']);	
	}

	public static function userLocation($latitude ,$longitude )
	{
		$db = self::getDB();
		$userid = $_SESSION['userid'];
		$statement = $db->prepare("SELECT * FROM userlocation WHERE userid = :userid");
		$statement->bindValue(":userid" , $userid , \PDO::PARAM_INT);
		$result = $statement->execute();
		if(!$result)
		{
			self::insertLocation($userid , $latitude ,$longitude );
		}
		else
		{
			self::updateLocation($userid , $latitude ,$longitude );
		}
	}
	public static function insertLocation($userid , $latitude , $longitude)
	{
		$db = self::getDB();
		$userid = $_SESSION['userid'];
		$statement = $db->prepare("INSERT INTO userlocation (userid , latitude , longitude) VALUES (:userid , :latitude , :longitude)");
		$statement->bindValue(":userid" , $userid , \PDO::PARAM_INT);
		$statement->bindValue(":latitude" , $latitude );
		$statement->bindValue(":longitude" , $longitude);
		$result = $statement->execute();
		if(!$result)
			return 7;
	}
	public static function updateLocation($userid , $latitude , $longitude)
	{
		$db = self::getDB();
		$userid = $_SESSION['userid'];
		$statement = $db->prepare("UPDATE userlocation SET latitude = :latitude AND longitude =  :longitude where userid = :id");
		$statement->bindValue(":userid" , $userid , \PDO::PARAM_INT);
		$statement->bindValue(":latitude" , $latitude );
		$statement->bindValue(":longitude" , $longitude);
		$result = $statement->execute();
		if(!$result)
			return 7;
	}
} 