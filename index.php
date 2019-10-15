<?php
require 'vendor/autoload.php';
use App\controller\AdminController;
use App\controller\ArticleController;
use App\controller\ContactFormController;
use App\entity\Database;
Database::getPdo();
//$pdoo = getPdo();

/*
try 
	{
	$controller0 = new AdminController;
	$controller1= new ArticleController;
	$controller2 = new ContactFormController;
	if(!empty($_GET['action']))
	{
		$action = $_GET['action'];
		if (method_exists($controller0, $action))
		{
			$controller->$action();
		}
		elseif (method_exists($controller1, $action))
		{
			$controller->$action();
		}
		elseif (method_exists($controller2, $action))
		{
			$controller->$action();
		}
	}
	else
	{
		$controller0->index();
	}
}
catch(Exeption $e)
{
	die('Erreur : '.$e->getMessage());
}
*/