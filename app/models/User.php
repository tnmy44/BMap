<?php
namespace Models;

class User
{
		

		public static function getDB(){
			return new \PDO("mysql:dbname=blog;host=localhost","root","passkey");	
		}

		public static function login($username,$password)
		{
				
				$db = self::getDB();
				$statu = $db->prepare("SELECT * FROM users WHERE username= :user  AND  passhash= :passhash");
				$result = $statu->execute(array(
					"username" => $username,
					"passhash" => md5($password),
					)
				);


				

				if(!$result)
				{

					var_dump($db->errorInfo());
					exit();
				}
				

				if ($row=$statu->fetch(\PDO::FETCH_ASSOC))
				{
					return($row);
				}
				return 1;
		}
}