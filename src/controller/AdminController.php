<?php

namespace App\controller;
use App\entity\{Database, Admin, Form};
use App\manager\{Connection, CommentManager, ArticleManager};

session_start();

class AdminController
{

    //DB connexion
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }
    //HOME PAGE
    public function index()
    {
        $titlee = 'Accueil - PHP/Symfony developer';
        $articleMana = new ArticleManager();
        $articles = $articleMana->findFour();
        require('view/homepage.view.html.php');
    }

    public function adminView()
    {
        $titlee = 'Dashboard - Admin';
        if (isset($_SESSION['mail'])) {
            $adminV = new ArticleManager();
            $adminC = new CommentManager();
            $articles = $adminV->findAll();
            $comments = $adminC->commentView();
            $comments_verify = $adminC->commentVerifyView();
            require('view/adminView.html.php');
        } else {
            $cont = new AdminController;
            $adminSection = $cont->signInView();
            echo "<script> alert('ACCES LIMITE : CONNEXION REQUISE'); </script>";
        }
    }
    public function signInView()
    {
        $form = new Form($_POST);
        $titlee = 'Sign In';
        $signIn = new Connection();
        include('view/signInView.html.php');
    }
    public function signIn()
    {
        $signIn = new Connection();
        $admin = new Admin();
        $result = $signIn->signIn();
        $isPasswordCorrect = password_verify($_POST['password'], $result['password']);
        if (!$result) {
            $error1 = new AdminController;
            $error11 = $error1->signInView();
            echo "<script> alert('Aucun compte ne correspond à ces informations'); </script>";
        } else {
            if ($isPasswordCorrect) {
                $_SESSION['mail'] = htmlspecialchars($_POST['mail']);
                $cont = new AdminController;
                $adminSection = $cont->adminView();
                return;
            } else {
                $error = true;
                $errorPassword = true;
                $error1 = new AdminController;
                $error11 = $error1->signInView();
                echo "<script> alert('Mot de passe erroné'); </script>";
            }
        }
    }
    public function signOut()
    {
        $signOut = new Connection();
        $signOut->Destroy();
        $controller = new AdminController;
        $controller->index();
    }
    public function signUpView()
    {
        $form = new Form($_POST);
        $titlee = 'Register';
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
        $registered = new AdminController();
        $registered->signInView();
        
    }
}
