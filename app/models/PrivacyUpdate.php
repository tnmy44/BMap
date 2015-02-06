<?php
include("Cread.php");
namespace Models;

public static function __construct()
{

}
$
public static function getDB()
{
	return new \PDO("mysql:dbname={$sqldb};host={$sqlhost}" , "{$sqluser}" , "{$sqlpass}");
}

public static function changeSettings($setting)
{
	//session_start();
	//something to start session
	$db = self::getDB();
	$statement = $db->prepare("UPDATE users SET privacy = :privacy WHERE id = :id");
	$statement->bindValue(":privacy" , $setting , \PDO::PARAM_INT);
	$statement->bindValue(":id" , $_SESSION['userid'] , \PDO::PARAM_INT);
	$result = $statement->execute();
	return $setting;
}