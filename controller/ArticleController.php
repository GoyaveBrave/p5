<?php
//require ('../model/Article.php');
require_once 'model/DatabaseConnexion.php';
require_once 'model/ArticleManager.php';
//showAll

class Controller {

    //DB connexion
    private $pdo;

    public function __construct()
     {
     $this->pdo = getPdo();
     }

    public function index()
    {
        $articleMana = new ArticleManager();
        $articles = $articleMana->findFour();
        require('view/homepage.view.html.php');
    }
    //Call the manager
    public function Controllerr()
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

    public function addPostView()
    {
        require 'view/addPost.html.php';
    }

    public function addPost()
    {
        $manager = new ArticleManager();
        $article = new Article([
        'img' => $_POST['img'],
        'title' => $_POST['title'],
		'text' =>  $_POST['text'],
        'category' =>  $_POST['category'],
        'author' =>  $_POST['author']
        ]);
        $manager->addPost($article);
        echo 'ok';
    }
    /*public function formController(){
        require('../view/form.html.php');
        //instenciation
        $form = new Form($_POST);
        $manager = new ArticleManager([
            'title' => $_POST['title'],
            'text' =>  $_POST['text'],
            'category' =>  $_POST['category'],
            'author' =>  $_POST['author'],
            ]);
        $manager->addPost($blogp)
        

    }
    */

}
//show($id)
