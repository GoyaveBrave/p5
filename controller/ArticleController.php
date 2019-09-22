<?php
require ('../model/Article.php');
require_once ('../model/DatabaseConnexion.php');
require ('../model/ArticleManager.php');
//showAll

class Controller {

    //DB connexion
    private $pdo;

    public function __construct()
     {
     $this->pdo = getPdo();
     }
    //Call the manager
    public function Controller()
    {
     $articleMana = new ArticleManager($pdo);
    //Call the view
    include('allPostspage.html.php');
    }

    public function articleController($id)
    {
    $articleMana = new ArticleManager($pdo);
    $article = $articleMana->find($id, 'Article');

    include('View/postpage.html.php');
    }

}
//show($id)
