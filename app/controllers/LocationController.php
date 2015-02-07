<?php

namespace Controllers;
use Models\LocationHandler;

class LocationController
{
	public static function post()
	{
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		LocationHandler::userLocation($latitude , $longitude);
	}
}