<?php

require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/tarefaDaoDb.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$id_user = $userInfo->id;

$id = filter_input(INPUT_GET, 'id');

if ($id) {

    $tarefaDao = new TarefaDaoDb($pdo);

    $tarefaDao->delete($id, $id_user);
} 

header("Location: ".$base."/index.php");
exit;