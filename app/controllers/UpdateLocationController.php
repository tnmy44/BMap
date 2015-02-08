<?php

namespace Controllers;
use Models\UpdateLocationHandler;

class UpdateLocationController
{
	public static function post()
	{
		$latitude = $_POST['lat'];
		$longitude = $_POST['lon'];
		UpdateLocationHandler::updateLoc($latitude , $longitude);
	}
}