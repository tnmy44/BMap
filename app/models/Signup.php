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
		$passhash = md5($passhash);
		$db = self::getDB();
		$statement = $db->prepare("INSERT INTO posts(username , passhash) VALUES(:username, :passhash)");
		$result = $statement->execute(array(
			"username" => $username , 
			"passhash" => $passhash));
		if($result)
			return true;
		else
			echo "Error!";
	}
}