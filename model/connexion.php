<?php
require_once 'DatabaseConnexion.php';
require_once 'Admin.php';
$pdo = getPdo();

//var_dump($_POST); die;

$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

$req = $pdo->prepare('INSERT INTO admin(username, mail, password) VALUES(:username, :mail, :password)');
$req->execute(array(
    'username' => $username,
    'mail' => $mail,
    'password' => $pass_hache));

?>