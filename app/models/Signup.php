<?php

namespace Models;

class Signup

{
	protected $db;

	public static function __construct()
	{
		$this->db = new \PDO("mysql:dbname=blog;host=localhost" , "root" , "passkey");
	}
	public static function getDB()
	{
		return new \PDO("mysql:dbname=blog;host=localhost" , "root" , "passkey");
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