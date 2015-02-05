<?php

require_once __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
	"/" => "Controllers\\HomeController",
	"/login" => "Controllers\\LoginController",
));