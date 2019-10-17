<?php

namespace App\controller;
use App\entity\Database;
use App\entity\Admin;
use App\manager\Connection;
use App\manager\ArticleManager;

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
        $articleMana = new ArticleManager();
        $articles = $articleMana->findFour();
        require('view/homepage.view.html.php');
    }

    public function adminView()
    {
        if (isset($_SESSION['mail'])) {
            $adminV = new ArticleManager();
            $articles = $adminV->findAll();
            $comments = $adminV->commentView();
            $comments_verify = $adminV->commentVerifyView();
            require('view/adminView.html.php');
        } else {
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
        if (!$result) {
            echo "error1";
        } else {
            if ($isPasswordCorrect) {
                $_SESSION['mail'] = htmlspecialchars($_POST['mail']);
                $cont = new AdminController;
                $adminSection = $cont->adminView();
                return;
            } else {
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
        $controller = new AdminController;
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
}
