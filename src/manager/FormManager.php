<?php
namespace App\manager;
require 'class/Autoloader.php';
Autoloader::register();

class FormManager {
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }
    public function contactSend(Contact $contact)
    {
    $query = $this->pdo->prepare('INSERT INTO contact(name, email, subject, message) VALUES (:name, :email, :subject, :message)');
    $query->bindValue(':name', $contact->getName(), PDO::PARAM_STR);
    $query->bindValue(':email', $contact->getEmail(), PDO::PARAM_STR);
    $query->bindValue(':subject', $contact->getSubject(), PDO::PARAM_STR);
    $query->bindValue(':message', $contact->getMessage(), PDO::PARAM_STR);
    $query->execute();
    }
}