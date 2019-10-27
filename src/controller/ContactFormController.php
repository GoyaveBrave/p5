<?php namespace App\controller;

use App\entity\Database;
use App\entity\Mail;
use App\entity\Contact;
use App\entity\Form;

class ContactFormController
{

    //DB connexion
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    //CONTACT FORM
    
    public function contactView()
    {
        $form = new Form($_POST);
        $titlee = 'Contact Form';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->contactSend();
        }
        include('view/contactFormView.html.php');
    }
    public function contactSend()
    {
        $mail = new Mail();
        $contactform = new Contact([
            'name' => htmlentities($_POST['name']),
            'email' => htmlentities($_POST['email']),
            'subject' => htmlentities($_POST['subject']),
            'message' => htmlentities($_POST['message'])
        ]);
        $mail->send($contactform);
        $controller = new AdminController;
        $home = $controller->index();
    }
}
