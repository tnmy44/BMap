<?php
namespace Models;
use Models\User;

class GetLocationsHandler
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

	public static function getLocations()
	{
		$db = self::getDB();
		$userid = $_SESSION['userid'];

		$statement = $db->prepare("SELECT * FROM users WHERE userid != :userid");
		$statement->bindValue(":userid" , $userid , \PDO::PARAM_INT);

		$result = $statement->execute();

		if(!$result)
			self::echoresultnexit(7);

		$list='{"result":"0","people":[';
		
		while ($row=$statement->fetch(\PDO::FETCH_ASSOC)) {
			//
			if($row['privacy'] != 0)
			{
				$list = $list . self::getUserData($row['userid'],$row['privacy'],$row['username'],$row['lastseen'],$row['name'],$row['latitude'],$row['longitude']);
			}

		}

		$l=strlen($list);
		if($l>28)
			$list = substr($list,0,$l-1);
		$list = $list . ']}';

		echo($list);
		exit();
	}



	public static function getUserData($user2 , $privacy, $username, $lastseen,$name,$latitude,$longitude)
	{

		$status=0;
		$trackhim=false;

		$userid = intval($_SESSION['userid']);		//chhota ho jaega

		$userC=$user2;
		$userB=$userid;

		if($userid < $user2){
			$userC=$userid;			
			$userB=$user2;
			
		}

		$db = self::getDB();
		$statement = $db->prepare("SELECT * FROM relations WHERE user1= :id1 AND user2= :id2");

		$statement->bindValue(':id1', $userC, \PDO::PARAM_INT);
		$statement->bindValue(':id2', $userB, \PDO::PARAM_INT);
		

		$result = $statement->execute();

		if(!$result)
			self::echoresultnexit(7);

		if(!($row = $statement->fetch(\PDO::FETCH_ASSOC)))
		{
			
			$status=0;
			if($privacy==2)
				$trackhim=true;

		}
		else
		{
			if($row['status']==2 || $row['status']==1 )
			{
				$status=0;
				if($privacy==2)
					$trackhim=true;

			}
			if($row['status']==3)
			{
				$status=3;
				if($privacy!=0)
					$trackhim=true;
			}
		}



		if($trackhim)
		{
			return( '{"userid":"'. $user2 . '","username":"' . $username .'","name":"'. $name . '","privacy":"'. $privacy.
			 '","lastseen":"'. $lastseen . '","latitude":"'. $latitude . '","longitude":"' .
				$longitude .'","status":"'. $status . '"},');
			

		}
		return '';
	}
	
} 