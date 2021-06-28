<?php
require 'config.php';
require 'models/Auth.php';


$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
?>
<!doctype html>


<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Cosme Barbosa">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Agendamento</title>
 
    <!-- Bootstrap core CSS -->
    <link href="<?=$base;?>/_src/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=$base;?>/_src/css/offcanvas.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container-fluid">
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?=$activeMenu =='home'?'active':''?>" aria-current="page" href="<?=$base;?>/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$activeMenu =='Agendar'?'active':''?>" href="<?=$base;?>/agendamento.php">Agendar Evento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$activeMenu =='Perfil'?'active':''?>" href="<?=$base;?>/perfil.php">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=$base;?>/logoout.php">Sair</a>
        </li>
      </ul>
      <form class="d-flex" method="GET" action="<?=$base;?>/pesquisar.php">
        <input class="form-control me-2" type="search" placeholder="Pesquisar" name="pesquisa" id="pesquisa" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
      </form>
    </div>
  </div>
</nav>

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <img class="me-3" src="<?=$base;?>/_src/img/pngegg.png" alt="" width="48" height="38">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1"><?=$userInfo->nome;?></h1>
      <small><?=$userInfo->email;?></small>
    </div>
  </div>
