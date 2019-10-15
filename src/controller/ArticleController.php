<?php
namespace App\controller;
use App\entity\Article;

class ArticleController
{
    //DB connexion
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }

    //ARTICLE
    public function viewId()
    {
        $manager = new ArticleManager();
        $article = $manager->find($_GET['article']);
        $comments = $manager->findCommentsByArticleId($_GET['article']);
        require('view/postpage.html.php');
    }
    public function viewAll()
    {
        $articleMana = new ArticleManager();
        $articles = $articleMana->findAll();
        include('view/allPostspage.html.php');
    }
    public function editPostView()
    {
        $manager = new ArticleManager();
        $article = $manager->find($_GET['article']);
        require('view/editView.html.php');
    }
    public function editPost()
    {
        $manager = new ArticleManager();
        $article = new Article([
            'id' => $_POST['id'],
            'img' => $_POST['img'],
            'title' => $_POST['title'],
            'text' =>  $_POST['text'],
            'category' =>  $_POST['category'],
            'author' =>  $_POST['author']
        ]);
        $manager->editPost($article);
        $controller = new Controller;
        $controller->adminView();
    }
    public function delete()
    {
        if (!empty($_GET['article'])) {
            $manager = new ArticleManager();
            $article = $manager->find($_GET['article']);
            $manager->deleteid($article);
            $controller = new Controller;
            $controller->adminView();
        } else {
            echo "Error Processing Request";
        }
    }
    public function addPostView()
    {
        $manager = new ArticleManager();
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
        $controller = new Controller();
        $controller->adminView();
    }




    //COMMENTS



    public function addCommentView()
    {
        $signIn = new ArticleManager();
        include('view/addCommentView.html.php');
    }
    public function addComment()
    {
        $manager = new ArticleManager();
        $comment = new Comment([
            'comments' => $_POST['comment'],
            'username' => $_POST['username']
        ]);
        $manager->addComment($comment, $_GET['article']);
        echo 'ok';
    }
    public function commentVerify()
    {
        $manager = new ArticleManager();
        $comment = $manager->commentVerifyView($_GET['article']);
        $manager->commentVerify($comment);
        $controller = new Controller;
        $controller->adminView();
    }
}
