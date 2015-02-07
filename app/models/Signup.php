<?php

namespace Models;

require ("Cread.php");

class Signup

{
	protected $db;

	public static function __construct()
	{
		$this->db = self::getDB();
	}
	public static function getDB()
	{
		return new \PDO("mysql:dbname={$sqldb};host={$sqlhost}" , $sqluser , $sqlpass);
	}
	public static function create($username , $passhash)
	{
		//this piece of code to check whether there existed a user by same username previously
		$checkQuery = $db->prepare("SELECT * FROM  users WHERE username = :username");
		$checkQuery->bindValue(":username" ,  $username);
		$checkQuery->execute();

		$row = $checkQuery->fetch(\PDO::FETCH_ASSOC);
		if($row)
		{
			return 1
		}
		else
		{
			$passhash = md5($passhash);
			$db = self::getDB();
			$statement = $db->prepare("INSERT INTO users (username , passhash) VALUES(:username, :passhash)");
			$result = $statement->execute(array(
				"username" => $username , 
				"passhash" => $passhash));
			if($result)
				return 0;
			else
				return 7;
		}
	}
}