<?php

require 'model/Article.php';
require_once 'model/DatabaseConnexion.php';
require_once 'model/ArticleManager.php';
require_once 'controller/Controller.php';



$pdo = getPdo();

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




/*$articleManager = new ArticleManager;
if (isset($_GET['article'])) {
    $article = $articleManager->find($_GET['article']);
    include 'view/postpage.html.php';
} else  {
    $articles = $articleManager->findAll();
    include 'view/allPostspage.html.php';
} */
