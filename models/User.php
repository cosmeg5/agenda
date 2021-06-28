<?php

class User {
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $token;
}

interface UserDAO {
    public function findByToken($token);
    public function findByEmail($login);
    public function update(User $u);
    public function insert(User $u);
}