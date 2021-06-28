<?php 
require_once 'models/User.php';

class UserDaoDb implements UserDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    private function generateUser($array) {
        $u = new User();
        $u->id = $array['id'] ?? 0;
        $u->email = $array['email'] ?? '';
        $u->nome = $array['nome'] ?? '';
        $u->senha = $array['senha'] ?? '';
        $u->token = $array['token'] ?? '';

        return $u;
    }

    public function findByToken($token) {
        if(!empty($token)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE token = :token");
            $sql->bindValue(':token', $token);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);

                $user = $this->generateUSer($data);

                return $user;
            }
        }

        return false;
    }

    public function findByEmail($email) {

        if(!empty($email)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);

                $user = $this->generateUser($data);

                return $user;
            }
        }

        return false;
    }

    public function update(User $u) {
        $sql = $this->pdo->prepare("UPDATE usuario SET
            email = :email,
            nome = :nome,
            senha = :senha,
            token = :token
            WHERE id = :id
        ");

        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':nome', $u->nome);
        $sql->bindValue(':senha', $u->senha);
        $sql->bindValue(':token', $u->token);
        $sql->bindValue(':id', $u->id);
        $sql->execute();

        return true;
    }

    public function insert(User $u) {
        $sql = $this->pdo->prepare("INSERT INTO usuario (
            nome, email, senha, token
        ) VALUES (
            :nome, :email, :senha, :token
        )");

        $sql->bindValue(':nome', $u->nome);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':senha', $u->senha);
        $sql->bindValue(':token', $u->token);
        $sql->execute();

        return true;
    }
}