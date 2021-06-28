<?php
    require 'partes/header.php';
    $activeMenu = 'Agendar';
    require_once 'dao/tarefaDaoDb.php';

    $id_user = $userInfo->id;
    $id = filter_input(INPUT_GET, 'id');

    $tarefaDao = new TarefaDaoDb($pdo);
    $tarefa = $tarefaDao->pegarTarefa($id, $id_user);
?>

<section class="text-center">

    <main class="form-signin">
        <form method="POST" enctype="multipart/form-data" action="<?=$base;?>/modificar_tarefa_action.php">
           
            <h1 class="h3 mb-3 fw-normal ">Atualize sua tarefa</h1>
            <div class="form-floating espaco" style="display: none;">
                <input type="text" class="form-control" id="tarefaId" name="tarefaId" placeholder="Data" value="<?=$id?>">
                <label for="tarefaId">id</label>
            </div>
            <div class="form-floating espaco">
                <input type="date" class="form-control" id="tarefaData" name="tarefaData" placeholder="Data" value="<?=$tarefa['data']?>">
                <label for="tarefaData">Data</label>
            </div>
            <div class="form-floating espaco">
                <input type="text" class="form-control" id="tarefaTitulo" name="tarefaTitulo" placeholder="Titulo" value="<?=$tarefa['titulo']?>">
                <label for="tarefaTitulo">Título</label>
            </div>
            <div class="form-floating espaco">
                <input type="text" class="form-control" id="tarefaLocal" name="tarefaLocal" placeholder="Local" value="<?=$tarefa['local']?>">
                <label for="tarefaLocal">Local</label>
            </div>
            <div class="form-floating espaco">
                <input type="textarea" class="form-control" id="tarefaDescicao" name="tarefaDescicao" placeholder="Descrição" value="<?=$tarefa['descricao']?>">
                <label for="tarefaDescicao">Descrição</label>
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
</section>