<?php
require_once 'model/Article.php';
require_once 'model/Admin.php';
require_once 'model/Comments.php';
require_once 'model/DatabaseConnexion.php';
require_once 'model/ArticleManager.php';
require_once 'model/Contact.php';
require_once 'model/FormManager.php';


class Controller {

    //DB connexion
    private $pdo;

    public function __construct()
     {
     $this->pdo = getPdo();
     }
    //Function pour Page d'Accueil
    public function index()
    {
        $articleMana = new ArticleManager();
        $articles = $articleMana->findFour();
        require('view/homepage.view.html.php');
    }
    public function adminView()
    {
            $adminV= new ArticleManager();
            $articles = $adminV->findAll();
            include 'view/adminView.html.php';
    }
    public function viewId()
    {
            $manager = new ArticleManager();
            $article = $manager->find($_GET['article']);
			require('view/postpage.html.php');
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
        if (!empty($_GET['article'])) 
		{
            $manager = new ArticleManager();
            $article = $manager->find($_GET['article']);
			$manager->deleteid($article);
			$controller = new Controller;
			$controller->adminView();
		}
		else
		{
			echo "Error Processing Request";
		}
    }
    public function viewAll()
    {
     $articleMana = new ArticleManager();
     $articles = $articleMana->findAll();
    include('view/allPostspage.html.php');
    }

    public function signInView()
    {
        $signIn = new ArticleManager();
        include('view/signInView.html.php');
    }
    public function signIn()
    {
        $signIn = new ArticleManager();
        $admin = new Admin();
        $result = $signIn->signIn();
        //var_dump($result); die;
		$isPasswordCorrect = password_verify($_POST['password'], $result['password']);
		if (!$result) 
		{
			var_dump($result); die;
			echo "error1"; //('view/signinView.html.php');
		}
		else
		{
			if ($isPasswordCorrect) {
				session_start();
                $_SESSION['mail'] = htmlspecialchars($_POST['mail']);
				require('view/adminView.html.php');
				return;
			}
			else 
			{
				$error = true;
				$errorPassword = true;
                echo "error2"; //require('view/signinView.html.php');
                //var_dump($_POST); die;
			}
		}
    }

    public function signUpView()
    {
        $signUp = new ArticleManager();
        include('view/signUpView.html.php');
    }
    public function signUp()
    {
        $manager = new ArticleManager();
        $admin = new Admin([
        'username' => $_POST['username'],
        'mail' => $_POST['mail'],
		'password' =>  $_POST['password'],
        ]);
        $manager->signUp($admin);
        include 'view/signInView.html.php';
    }

    
    //Redirige vers page AddPost
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
        echo 'ok';
    }

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
        $manager->addComment($comment);
        echo 'ok';
    }
    public function contactView()
    {
        $contact = new ArticleManager();
        include('view/contactFormView.html.php');
    }
    public function contactSend()
    {
        $contact = new FormManager();
        $contactform = new Contact([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'message' => $_POST['message']
        ]);
        $contact->contactSend($contactform);
        echo 'ok';
    }
}
