<?php

namespace Models;

public static function __construct()
{

}

public static function getDB()
{
	return new \PDO("mysql:dbname={$sqldb};host={$sqlhost}" , "{$sqluser}" , "{$sqlpass}");
}

public function getNotifications($user)
{
	$db = getDB();
	$statement = $db->prepare("SELECT * FROM relations WHERE (user1 = :user1 AND status = 3) OR (user2 = :user2 AND status = 1)");
	$statement->bindValue(":user1" , $user , \PDO::PARAM_INT);
	$statement->bindValue(":user2" , $user , \PDO::PARAM_INT);

	$statement->execute();
	$post = array();

	while($row = $statement->fetch(\PDO::FETCH_ASSOC))
	{
		$post[] = $row;
	}
	return $post;	
}
?>
