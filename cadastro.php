<?php
require 'config.php';

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projeto de agenda com PHP, Bootstrap, MySQL">
    <meta name="author" content="Cosme Barbosa">
    <title>Página de cadastro</title>


    <!-- Bootstrap core CSS -->
    <link href="<?=$base;?>/_src/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=$base;?>/_src/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form method="POST" action="<?=$base;?>/cadastro_action.php">
            <img class="mb-4" src="<?=$base;?>/_src/img/pngegg.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Faça seu Cadastro</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="cadastroNome" name="cadastroNome" placeholder="Nome Completo">
                <label for="cadastroNome">Nome</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="cadastroEmail" name="cadastroEmail" placeholder="name@example.com">
                <label for="cadastroEmail">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="cadastroSenha" name="cadastroSenha" placeholder="Senha">
                <label for="cadastroSenha">Senha</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="cadastroSenhaConfirma" name="cadastroSenhaConfirma" placeholder="Senha">
                <label for="cadastroSenhaConfirma">Senha</label>
            </div>
            <div class="aviso">
                <?php if(!empty($_SESSION['flash'])): ?>
                    <?= $_SESSION['flash']; ?>
                    <?php $_SESSION['flash'] = ''; ?>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <a href="<?=$base;?>/login.php" class="btn_cadastro">Já tem login? Clique AQUI</a>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Cadastrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; Cosme Barbosa - 2021</p>
        </form>
    </main>



</body>

</html>