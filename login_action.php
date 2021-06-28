<?php

require 'config.php';
require 'models/Auth.php';

$email = filter_input(INPUT_POST, 'floatingInput', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'floatingPassword');

if($email && $senha) {

    $auth = new Auth($pdo, $base);

    if($auth->validateLogin($email, $senha)) {
        header("Location: ".$base);
        exit;
    }
}

$_SESSION['flash'] = "E-mail ou senha errados.";
header("Location: ".$base);
exit;