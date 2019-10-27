<?php

namespace App\controller;

use App\entity\Article;
use App\entity\Database;
use App\entity\Comment;
use App\entity\Form;
use App\manager\ArticleManager;
use App\manager\CommentManager;
use App\controller\AdminController;

class CommentController
{
    //DB connexion
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }
    //COMMENTS



    public function addCommentView()
    {
        $signIn = new ArticleManager();
        include('view/addCommentView.html.php');
    }
    public function addComment()
    {
        $manager = new CommentManager();
        $comment = new Comment([
            'articles_id' => htmlentities($_GET['article']),
            'comments' => htmlentities($_POST['comment']),
            'username' => htmlentities($_POST['username'])
        ]);
        
        $manager->addComment($comment);
        $controller = new AdminController;
        $controller->adminView();
    }
    public function commentVerify()
    {
        $manager = new CommentManager();
        $view = $manager->commentVerifyView();
        $comment = new Comment([
            'id' => htmlentities($_GET['article'])]);
        $manager->commentVerify($comment);
        $controller = new AdminController;
        $controller->adminView();
    }
    public function deleteComment()
    {
        $manager = new CommentManager();
        $comment = new Comment(['id' => htmlentities($_GET['article'])]);
        $manager->deleteComment($comment);
        $controller = new AdminController;
        $controller->adminView();
    }
}
