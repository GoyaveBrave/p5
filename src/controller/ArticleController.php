<?php
namespace App\controller;
use App\entity\Article;
use App\entity\Database;
use App\manager\ArticleManager;
use App\entity\Comment;
class ArticleController
{
    //DB connexion
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
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
            'id' => htmlentities($_POST['id']),
            'img' => htmlentities($_POST['img']),
            'title' => htmlentities($_POST['title']),
            'text' =>  htmlentities($_POST['text']),
            'category' =>  htmlentities($_POST['category']),
            'author' =>  htmlentities($_POST['author'])
        ]);
        $manager->editPost($article);
        $controller = new AdminController;
        $controller->adminView();
    }
    public function delete()
    {
        if (!empty($_GET['article'])) {
            $manager = new ArticleManager();
            $article = $manager->find($_GET['article']);
            $manager->deleteid($article);
            $controller = new AdminController;
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
            'img' => htmlentities($_POST['img']),
            'title' => htmlentities($_POST['title']),
            'text' =>  htmlentities($_POST['text']),
            'category' =>  htmlentities($_POST['category']),
            'author' =>  htmlentities($_POST['author'])
        ]);
        $manager->addPost($article);
        $controller = new AdminController();
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
            'comments' => htmlentities($_POST['comment']),
            'username' => htmlentities($_POST['username'])
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
