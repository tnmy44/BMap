<?php

namespace Controllers;
use Models\PrivacyHandler;


class PrivacyController{

	public static function post()
	{
		$newprivacy = $_POST['privacy'];
		PrivacyHandler::changeSettings($newprivacy);
		
	}
}