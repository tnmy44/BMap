<?php

namespace Controllers;
use Models\Notifications;

class NotificationController
{
	protected $twig;

	public  function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../views");
		$this->twig = new \Twig_Environment($loader);
	}

	public static function post()
	{
		//session_start();
		$user = $_SESSION['userid'];

		$notifications = Notifications::getNotifications($user);
		//some confusion here (to echo the json object here or at the front end)@tanmay?

	}
}
?>