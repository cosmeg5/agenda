<?php
    require 'partes/header.php';
    $activeMenu = 'Perfil';
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projeto de agenda com PHP, Bootstrap, MySQL">
    <meta name="author" content="Cosme Barbosa">
    <title>Perfil</title>


    <!-- Bootstrap core CSS -->
    <link href="<?=$base;?>/_src/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=$base;?>/_src/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form method="POST" enctype="multipart/form-data" action="<?=$base;?>/perfil_action.php">
           
            <h1 class="h3 mb-3 fw-normal">Faça Atualização dos seus dados</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="perfilNome" name="perfilNome" placeholder="Nome Completo" value="<?=$userInfo->nome;?>"/>
                <label for="perfilNome">Nome</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="perfilEmail" name="perfilEmail" placeholder="name@example.com" value="<?=$userInfo->email;?>"/>
                <label for="perfilEmail">Email</label>
            </div>
            <hr>
            <div class="form-floating">
                <input type="password" class="form-control" id="perfilSenha" name="perfilSenha" placeholder="Senha"/>
                <label for="perfilSenha">Senha</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="perfilSenhaConfirma" name="perfilSenhaConfirma" placeholder="Senha">
                <label for="perfilSenhaConfirma">Senha</label>
            </div>
            <div class="aviso">
                <?php if(!empty($_SESSION['flash'])): ?>
                    <?= $_SESSION['flash']; ?>
                    <?php $_SESSION['flash'] = ''; ?>
                <?php endif; ?>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Atualizar</button>
            <p class="mt-5 mb-3 text-muted">&copy; Cosme Barbosa - 2021</p>
        </form>
    </main>



</body>

</html>