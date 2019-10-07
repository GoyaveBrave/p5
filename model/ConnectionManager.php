<?php
require_once 'DatabaseConnexion.php';
require_once 'Article.php';
require_once 'Admin.php';


class Connection 
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }


    public function signUp(Admin $admin)
    {
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = $this->pdo->prepare('INSERT INTO admin(username, mail, password) VALUES(:username, :mail, :password)');
        $query->bindValue(':username', $admin->getUsername(), PDO::PARAM_STR);
        $query->bindValue(':mail', $admin->getMail(), PDO::PARAM_STR);
		$query->bindValue(':password', $pass_hache, PDO::PARAM_STR);
        $query->execute();
    }

    public function signIn()
    {
        $query = $this->pdo->prepare('SELECT mail, password FROM admin WHERE mail = :mail');
		$query->execute(array('mail' => $_POST['mail']));
		$result = $query->fetch();
		return $result;
    }

    public function destroy()
    {
    $status = session_status();
    if($status == PHP_SESSION_NONE){
//There is no active session
    session_start();
}

// Détruit toutes les variables de session
    $_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
    if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, on détruit la session.
    session_destroy();
    }
}