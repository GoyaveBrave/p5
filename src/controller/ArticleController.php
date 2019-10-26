<?php
namespace App\controller;
use App\entity\{Article, Database, Comment, Form};
use App\manager\{ArticleManager, CommentManager};
use App\controller\CommentController;

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
        $form = new Form($_POST);
        $titlee = 'Single Post';
        $manager = new ArticleManager();
        $managerr = new CommentManager();
        $article = $manager->find($_GET['article']);
        $comments = $managerr->findCommentsByArticleId($_GET['article']);
        require('view/postpage.html.php');
    }
    public function viewAll()
    {
        $titlee = 'All Posts'; 
        $articleMana = new ArticleManager();
        $articles = $articleMana->findAll();
        include('view/allPostspage.html.php');
    }
    public function editPostView()
    {
        $form = new Form($_POST);
        $titlee = 'Edit Post';
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
        $form = new Form($_POST);
        $titlee = 'Contact Form';
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
}




