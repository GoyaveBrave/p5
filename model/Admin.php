<?php
require_once 'DatabaseConnexion.php';
$pdo = getPdo();
class Admin 
{
    
    private $username, $mail, $password;

    public      $donnees = [];
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
    
    public function setUsername($username){
        $this->username = $username; 
    }

    public function setMail($mail){
        $this->mail = $mail; 
    }

    public function setPassword($password){
        $this->password = $password; 
    }

    //Getter/

    public function getUsername(){
        return $this->username;
    }
    
    public function getMail(){
        return $this->mail;
    }

    public function getPassword(){
        return $this->password;
    }

}
