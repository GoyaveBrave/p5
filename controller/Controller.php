<?php
require_once 'model/Article.php';
require_once 'model/Admin.php';
require_once 'model/DatabaseConnexion.php';
require_once 'model/ArticleManager.php';


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
    public function viewId()
    {
            $manager = new ArticleManager();
            $article = $manager->find($_GET['article']);
			require('View/postpage.html.php');
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
		$result = $signIn->signIn();
		$isPasswordCorrect = password_verify($_POST['password'], $result['password']);
		if (!$result['mail']) 
		{
			$error = true;
			$errorEmail = true;
			echo "error1"; //('view/signinView.html.php');
		}
		else
		{
			if ($isPasswordCorrect) {
				session_start();
				$_SESSION['mail'] = htmlspecialchars($_POST['mail']);
				require('view/adminView.html.php');
				return $result;
				return $isPasswordCorrect;
			}
			else 
			{
				$error = true;
				$errorPassword = true;
				echo "error2"; //require('view/signinView.html.php');
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
        echo 'ok';
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

    
}
