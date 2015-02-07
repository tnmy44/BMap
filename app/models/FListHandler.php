<?php
namespace Models;



class FListHandler
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

		public static function fetchList()
		{
				
				$db = self::getDB();
				
				
				$user=$_SESSION['userid'];

				$statement = $db->prepare("SELECT * FROM relations WHERE (user1 = :user1 AND status = 3) OR (user2 = :user2 AND status = 1)");
				$statement->bindValue(":user1" , $user , \PDO::PARAM_INT);
				$statement->bindValue(":user2" , $user , \PDO::PARAM_INT);


				$result = $statement->execute();

				
				if(!$result)
				{

					
					self::echoresultnexit(7);
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
				if (!$result)
					self::echoresultnexit(7);

				if(!$row = $statement->fetch(\PDO::fetch(FETCH_ASSOC)))
					self::echoresultnexit(1);

				echo ('{"result":"'. 0 .'",
						"userid":"'.$row["userid"].'",
						"username":"'.$row["username"].'",
						"name":"'.$row["name"].'",
						"privacy":"'.$row["privacy"] . '" }');
				exit();
		}

}