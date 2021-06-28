<?php

require 'config.php';
require 'models/Auth.php';
require 'dao/tarefaDaoDb.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$data = filter_input(INPUT_POST, 'tarefaData');
$titulo = filter_input(INPUT_POST, 'tarefaTitulo');
$local = filter_input(INPUT_POST, 'tarefaLocal');
$descricao = filter_input(INPUT_POST, 'tarefaDescicao');


if ($data && $titulo) {

    $auth = new Auth($pdo, $base);

    $tafefaDao = new TarefaDaoDb($pdo);

    $novaTarefa = new Tarefa();
    $novaTarefa->id_usuario = $userInfo->id;
    $novaTarefa->data = $data;
    $novaTarefa->titulo = $titulo;
    $novaTarefa->local = $local;
    $novaTarefa->descricao = $descricao; 
    
    $tafefaDao->insert($novaTarefa);
    
    $_SESSION['flash'] = "Evento cadastrado";
    header("Location: ".$base."/index.php");
    exit;

} 

$_SESSION['flash'] = "Preencha a data e o título";
header("Location: ".$base."/agendamento.php");
exit;