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
    <title>Agenda PHP</title>


    <!-- Bootstrap core CSS -->
    <link href="<?=$base;?>/_src/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=$base;?>/_src/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form method="POST" action="<?=$base;?>/login_action.php">
            <img class="mb-4" src="<?=$base;?>/_src/img/pngegg.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Faça seu login</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="floatingPassword" placeholder="Senha">
                <label for="floatingPassword">Senha</label>
            </div>
            <div class="aviso">
                <?php if(!empty($_SESSION['flash'])): ?>
                    <?= $_SESSION['flash']; ?>
                    <?php $_SESSION['flash'] = ''; ?>
                <?php endif; ?>
            </div>

            <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Lembrar-me
                </label>            
            </div>
            <div class="mb-3">
                <a href="<?=$base;?>/cadastro.php" class="btn_cadastro">Cadastre-se AQUI</a>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; Cosme Barbosa - 2021</p>
        </form>
    </main>



</body>

</html>