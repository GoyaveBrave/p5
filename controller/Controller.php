<?php session_start();
require_once 'model/ConnectionManager.php';
require_once 'model/Article.php';
require_once 'model/Admin.php';
require_once 'model/Comments.php';
require_once 'model/DatabaseConnexion.php';
require_once 'model/ArticleManager.php';
require_once 'model/Contact.php';
require_once 'model/FormManager.php';
require_once 'model/Mail.php';

class Controller {

    //DB connexion
    private $pdo;

    public function __construct()
     {
     $this->pdo = getPdo();
     }
    //HOME PAGE
    public function index()
    {
        $articleMana = new ArticleManager();
        $articles = $articleMana->findFour();
        require('view/homepage.view.html.php');
    }


    //MANAGE ARTICLES

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




    //MANAGE COMMENTS


    
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

    //CONNECTION
    
    public function adminView()
    {
        if(isset($_SESSION['mail'])){
            $adminV= new ArticleManager();
            $articles = $adminV->findAll();
            $comments = $adminV->commentView();
            $comments_verify = $adminV->commentVerifyView();
            require('view/adminView.html.php');
        }
        else{
          $cont = new Controller;
          $adminSection = $cont->signInView();
          echo 'CONNEXION REQUISE';
        }
    }
    public function signInView()
    {
        $signIn = new Connection();
        include('view/signInView.html.php');
    }
    public function signIn()
    {
        $signIn = new Connection();
        $admin = new Admin();
        $result = $signIn->signIn();
		$isPasswordCorrect = password_verify($_POST['password'], $result['password']);
		if (!$result) 
		{
			echo "error1";
		}
		else
		{
			if ($isPasswordCorrect) {
                $_SESSION['mail'] = htmlspecialchars($_POST['mail']);
                $cont = new Controller;
                $adminSection = $cont->adminView();
				return;
			}
			else 
			{
				$error = true;
				$errorPassword = true;
                echo "error2";
			}
		}
    }
    public function signOut()
        {
            $signOut = new Connection();
            $signOut->Destroy();
            $controller = new Controller;
			$controller->index();
        }
    public function signUpView()
    {
        $signUp = new Connection();
        include('view/signUpView.html.php');
    }
    public function signUp()
    {
        $manager = new Connection();
        $admin = new Admin([
        'username' => $_POST['username'],
        'mail' => $_POST['mail'],
		'password' =>  $_POST['password'],
        ]);
        $manager->signUp($admin);
        include 'view/signInView.html.php';
    }

    
    //CONTACT FORM

    public function contactView()
    {
        include('view/contactFormView.html.php');
    }
    public function contactSend()
    {
        $mail = new Mail();
        $contactform = new Contact([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'message' => $_POST['message']
        ]);
        $mail->send($contactform);
        echo 'ok';
    }
}
