<?php
namespace App\entity;

class Database
{
    public static function getPdo()
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=blog_p5;charset=utf8', 'root', '', [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    
        return $pdo;
    }
}
