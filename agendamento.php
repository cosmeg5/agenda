<?php
    require 'partes/header.php';
    $activeMenu = 'Agendar';
?>

<section class="text-center">

    <main class="form-signin">
        <form method="POST" action="<?=$base;?>/agendamento_action.php">
           
            <h1 class="h3 mb-3 fw-normal ">Agende sua tarefa</h1>
            <div class="form-floating espaco">
                <input type="date" class="form-control" id="tarefaData" name="tarefaData" placeholder="Data">
                <label for="tarefaData">Data</label>
            </div>
            <div class="form-floating espaco">
                <input type="text" class="form-control" id="tarefaTitulo" name="tarefaTitulo" placeholder="Titulo">
                <label for="tarefaTitulo">Título</label>
            </div>
            <div class="form-floating espaco">
                <input type="text" class="form-control" id="tarefaLocal" name="tarefaLocal" placeholder="Local">
                <label for="tarefaLocal">Local</label>
            </div>
            <div class="form-floating espaco">
                <input type="textarea" class="form-control" id="tarefaDescicao" name="tarefaDescicao" placeholder="Descrição">
                <label for="tarefaDescicao">Descrição</label>
            </div>
            <div class="aviso">
                <?php if(!empty($_SESSION['flash'])): ?>
                    <?= $_SESSION['flash']; ?>
                    <?php $_SESSION['flash'] = ''; ?>
                <?php endif; ?>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Colocar na agenda</button>
            <p class="mt-5 mb-3 text-muted">&copy; Cosme Barbosa - 2021</p>
        </form>
    </main>
</section>