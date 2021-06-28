<?php
require_once 'dao/UserDaoDb.php';


//Objeto especifico para autentificar o token.
class Auth {

    private $pdo;
    private $base;
    private $dao;

    public function __construct(PDO $pdo, $base) {
        $this->pdo = $pdo;
        $this->base = $base;
        $this->dao = new UserDaoDb($this->pdo);
    }

    public function checkToken() {
       
        if(!empty($_SESSION['token'])) {

            $token = $_SESSION['token'];

            $user = $this->dao->findByToken($token);

            if($user) {
                return $user;
            }
        }

        header("Location: ".$this->base."/login.php");
        exit;
    }

    public function validateLogin($email, $senha) {
       
        $user = $this->dao->findByEmail($email);

        if($user) {         
            if(password_verify($senha, $user->senha)) {
                $token = md5(time().rand(0, 9999));

                $_SESSION['token'] = $token;
                $user->token = $token;
                $this->dao->update($user);

                return true;
            }
        }
        
        return false;
    }

    public function verificaEmail($email) {
        if($this->dao->findByEmail($email)) {
            return true;
        } else {
            return false;
        }
    }

    public function registraUsuario($nome, $email, $senha){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $token = md5(time().rand(0, 9999));

        $newUser = new User();
        $newUser->nome = $nome;
        $newUser->email = $email;
        $newUser->senha = $hash;
        $newUser->token = $token;

        $this->dao->insert($newUser);

        $_SESSION['token'] = $token;
    }
    
}