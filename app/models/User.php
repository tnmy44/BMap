<?php
namespace Models;



class User
{
    public static function echoresultnexit($id)
    {
        echo('{"result" : "' . $id . '"}');
        exit();
    }   


		public static function getDB(){
			
			require ("Cread.php");
			return new \PDO("mysql:dbname={$creden['database']};host={$creden['host']}" ,  $creden['username'] , $creden['password']);	

		}

		public static function login($username,$password)
		{
				
				$db = self::getDB();
				
				
				$passhash = md5($password);
				$statement = $db->prepare("SELECT * FROM users WHERE username= :user  AND  passhash= :passhash");
				$statement->bindValue(":user" , $username);
				$statement->bindValue(":passhash" , $passhash);
				$result = $statement->execute();

				
				if(!$result)
				{

					
					echoresultnexit(7);
					exit();
				}
				

				if ($row=$statement->fetch(\PDO::FETCH_ASSOC))
				{
					return($row);
				}
				self::echoresultnexit(1);
		}

		public static function  getUser($userid)
		{
				$db = self::getDB();
				$statement = $db->prepare("SELECT * FROM users WHERE id= :id");

				$statement->bindValue(':id', $userid, \PDO::PARAM_INT);
				

				$result = $statement->execute();
				
	
		}

}