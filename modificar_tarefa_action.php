<?php

require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/tarefaDaoDb.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$id_user = $userInfo->id;

$id = filter_input(INPUT_POST, 'tarefaId');
$data = filter_input(INPUT_POST, 'tarefaData');
$titulo = filter_input(INPUT_POST, 'tarefaTitulo');
$local = filter_input(INPUT_POST, 'tarefaLocal');
$descricao = filter_input(INPUT_POST, 'tarefaDescicao');

if ($id  && $data && $titulo && $local && $descricao) {

    $tarefaDao = new TarefaDaoDb($pdo);

    $tarefaDao->update($id, $data, $titulo, $local, $descricao, $id_user);
} 

header("Location: ".$base."/index.php");
exit;