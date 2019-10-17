<?php namespace App\controller; 
use App\entity\{Database, Mail, Contact};
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
