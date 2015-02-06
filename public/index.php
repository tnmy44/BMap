<?php

require_once __DIR__ . "/../vendor/autoload.php";

session_start();
if(!isset($_SESSION['status'])){
	$_SESSION['status']=0;
}

Toro::serve(array(
	"/" => "Controllers\\HomeController",
	"/login" => "Controllers\\LoginController",
	"/accfr" => "Controllers\\FriendRequestAcceptController",
	"/sendfr" => "Controllers\\FriendRequestSenderController",
	"/setprivacy" => "Controllers\\SetPrivacyController",
	"/getuser" => "Controllers\\UserDetailsController",
));