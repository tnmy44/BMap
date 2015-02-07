<?php
namespace Models;

use Models\User;

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
				
				$list='{"result":"0","people":[';
				

				
				
				$user=$_SESSION['userid'];


				$statement = $db->prepare("SELECT * FROM relations WHERE user1 = :user1 AND status = 3");
				$statement->bindValue(":user1" , $user , \PDO::PARAM_INT);
				
				$result = $statement->execute();

				if(!$result)
					self::echoresultnexit(7);

				while ($row=$statement->fetch(\PDO::FETCH_ASSOC)){
					$list = $list . User::getUser($row['user2']) . ',';
				}


				$statement = $db->prepare("SELECT * FROM relations WHERE user2 = :user2 AND status = 3");
				$statement->bindValue(":user2" , $user , \PDO::PARAM_INT);

				$result = $statement->execute();
			
				if(!$result)
					self::echoresultnexit(7);

				while ($row=$statement->fetch(\PDO::FETCH_ASSOC)){

					$list = $list . User::getUser($row['user1']) . ',';
				}




				$l=strlen($list);
				if($l>28)
					$list = substr($list,0,$l-1);

				$list = $list . ']}';
				

				
				echo($list);
				exit();
		}

		
}