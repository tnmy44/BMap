<?php
namespace Models;

require ("Cread.php");

class User
{
		

		public static function getDB(){
			return new \PDO("mysql:dbname={$sqldb};host={$sqlhost}" , "$sqluser" , "$sqlpass");	
		}

		public static function login($username,$password)
		{
				
				$db = self::getDB();
				$passhash = md5($password);
				$statment = $db->prepare("SELECT * FROM users WHERE username= :user  AND  passhash= :passhash");
				$statment->bindValue(":user" , $username);
				$statment->bindValue(":passhash" , $passhash);
				$result = $statement->execute();

				
				if(!$result)
				{

					var_dump($db->errorInfo());
					exit();
				}
				

				if ($row=$statement->fetch(\PDO::FETCH_ASSOC))
				{
					return($row);
				}
				return 1;
		}

		public static function  getUser($userid)
		{
				$db = self::getDB();
				$statement = $db->prepare("SELECT * FROM users WHERE id= :id");

				$statement->bindValue(':id', $userid, \PDO::PARAM_INT);
				

				$result = $statement->execute();
				
	
		}

}