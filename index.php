<?php
require 'vendor/autoload.php';
use App\entity\Database;
use App\controller\AdminController;
use App\controller\ArticleController;
use App\controller\ContactFormController;
use App\controller\CommentController;

Database::getPdo();

try {
    $controller0 = new AdminController;
    $controller1= new ArticleController;
    $controller2 = new ContactFormController;
    $controller3 = new CommentController;
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
        if (method_exists($controller0, $action)) {
            $controller0->$action();
        } elseif (method_exists($controller1, $action)) {
            $controller1->$action();
        } elseif (method_exists($controller2, $action)) {
            $controller2->$action();
        } elseif (method_exists($controller3, $action)) {
            $controller3->$action();
        }
    } else {
        $controller0->index();
    }
} catch (Exeption $e) {
    die('Erreur : '.$e->getMessage());
}
