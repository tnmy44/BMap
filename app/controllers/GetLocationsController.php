<?php

namespace Controllers;
use Models\GetLocationsHandler;

class GetLocationsController
{
	public static function post()
	{
		
		GetLocationsHandler::getLocations();
	}
}