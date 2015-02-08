<?php

namespace Models;

class UpdateLocationHandler
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


	public static function updateLoc($latitude ,$longitude )
	{
		$db = self::getDB();
		$userid = $_SESSION['userid'];

		$statement = $db->prepare("UPDATE users SET latitude = :latitude , longitude =  :longitude , lastseen= :timest where userid = :id");

		$statement->bindValue(":id" , $userid , \PDO::PARAM_INT);
		$statement->bindValue(":latitude" , $latitude );
		$statement->bindValue(":longitude" , $longitude);
		$dtnow= new \DateTime();
		$statement->bindValue(":timest" , $dtnow->format("Y-m-d H:i:s"));

		$result = $statement->execute();

		if(!$result)
			self::echoresultnexit(7);

		self::echoresultnexit(0);

		
	}

}