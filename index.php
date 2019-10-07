<?php

require 'model/Article.php';
require_once 'model/DatabaseConnexion.php';
require_once 'model/ArticleManager.php';
require_once 'controller/Controller.php';



$pdo = getPdo();



/*	$controller = new Controller;
	if(!empty($_SERVER['QUERY_STRING'])){
	  $controller->index();
	}
	elseif (!empty($_GET['action'])){
		if ($_GET['action'] == "delete" && (!empty($_GET['article']))){
           $controller->delete($_GET['article']);
		} 
			
	}

*/

try 
	{
	$controller = new Controller;
	if(!empty($_GET['action']))
	{
		$action = $_GET['action'];
		if (method_exists($controller, $action))
		{
			$controller->$action();
		}
		/*else
		{
			throw new Exeption("Error Processing Request");
		}*/
	}
	else
	{
		$controller->index();
	}
}
catch(Exeption $e)
{
	die('Erreur : '.$e->getMessage());
}
