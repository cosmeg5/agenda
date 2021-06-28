<?php

require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoDb.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$userDao = new UserDaoDb($pdo);

$nome = filter_input(INPUT_POST, 'perfilNome');
$email = filter_input(INPUT_POST, 'perfilEmail', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'perfilSenha');
$senhaConfirma = filter_input(INPUT_POST, 'perfilSenhaConfirma');
$auth = new Auth($pdo, $base);


if ($nome && $email) {
    $userInfo->nome = $nome;
    $userInfo->email = $email;


    if($userInfo->email != $email) {

        if($userDao->findByEmail($email) === false) {          
            $userInfo->email = $email;
        } else {
            $_SESSION['flash'] = "E-mail já cadastrado";
            header("Location: ".$base."/perfil.php");
            exit;
        }
      
    }

    if(!empty($senha)&& !empty($senhaConfirma)) {
        if($senha === $senhaConfirma) {

            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $userInfo->senha = $hash;

        } else {
            $_SESSION['flash'] = "Senhas não são idênticas";
            header("Location: ".$base."/perfil.php");
            exit;
        }
    }


    $userDao->update($userInfo);
    $_SESSION['flash'] = "Perfil atualizado";
    header("Location: ".$base."/index.php");
    exit;
} 

header("Location: ".$base."/perfil.php");
exit;