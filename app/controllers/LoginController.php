<?php 
/*

Controller for / requets

*/

namespace Controllers;

class LoginController {
    
    protected $twig;
    
    public function __construct() 
    {
        
    }
    
    public function post()
    {

    	if(!isset($_POST['username']) || !isset($_POST['password']))
    	{
    		echo "1";
    		exit();
    	}

    	if(!($_POST['username']) || !($_POST['password']))
    	{
    		echo "1";
    		exit();
    	}

     	$db = new \PDO("mysql:dbname=blog;host=localhost","root","passkey");
    }