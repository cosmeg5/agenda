<?php

require 'config.php';
require 'models/Auth.php';

$nome = filter_input(INPUT_POST, 'cadastroNome');
$email = filter_input(INPUT_POST, 'cadastroEmail', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'cadastroSenha');
$senhaConfirma = filter_input(INPUT_POST, 'cadastroSenhaConfirma');

if ($nome && $email && $senha && $senhaConfirma) {

    $auth = new Auth($pdo, $base);

    if($senha != $senhaConfirma){
        $_SESSION['flash'] = "Senhas não são idênticas";
        header("Location: ".$base."/cadastro.php");
        exit;
    }

    if($auth->verificaEmail($email) === false) {
        
        $auth->registraUsuario($nome, $email, $senha);
        header("Location: ".$base);
        exit;
    } else {
        $_SESSION['flash'] = "E-mail já cadastrado";
        header("Location: ".$base."/cadastro.php");
        exit;
    }

} 

$_SESSION['flash'] = "Campos em branco";
header("Location: ".$base."/cadastro.php");
exit;

