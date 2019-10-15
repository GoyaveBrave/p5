<?php namespace App\controller; 

class ContactFormController
{

    //DB connexion
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
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
