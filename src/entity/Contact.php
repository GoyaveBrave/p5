<?php

namespace App\entity;
$pdo = Database::getPdo();
class Contact 
{
    
    private $name, $email, $subject, $message;

    public $donnees = [];
    public function __construct($donnees = [])
    {
        if (!empty($donnees)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
        {
            $this->hydrate($donnees);
        }
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'. ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    //Setter /
    
    public function setName($name){
        $this->name = $name; 
    }
    public function setEmail($email){
        $this->email = $email; 
    }
    public function setSubject($subject){
        $this->subject = $subject; 
    }
    public function setMessage($message){
        $this->message = $message; 
    }
    //Getter
    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSubject(){
        return $this->subject;
    }
    public function getMessage(){
        return $this->message;
    }

}