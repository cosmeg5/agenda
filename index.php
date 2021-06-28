<?php
    require 'partes/header.php';
    require 'dao/tarefaDaoDb.php';

    $tarefaDao = new TarefaDaoDb($pdo);
    $tarefa = $tarefaDao->inserirTarefa($userInfo->id);

    $activeMenu = 'home';
?>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
  <div class="aviso" style="color:green; font-size: 1.5rem; width:0 auto">
          <?php if(!empty($_SESSION['flash'])): ?>
              <?= $_SESSION['flash']; ?>
              <?php $_SESSION['flash'] = ''; ?>
          <?php endif; ?>
      </div>
    <h6 class="border-bottom pb-2 mb-0">Tarefas agendadas</h6>

  <?php foreach($tarefa as $item): ?>
    <div class="d-flex text-muted justify-content-sm-between pt-3">
      <div>
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
        <p class="pb-3 mb-0 small lh-sm border-bottom">
          <strong class="d-block text-gray-dark"><?=date('d/m/Y', strtotime($item->data));?></strong>
          <strong class="d-block text-gray-dark"><?=$item->titulo;?></strong>
          <?=$item->descricao;?>
        </p>   
      </div>
      <div>
        <a class="btn btn-warning"  href="<?=$base;?>/modificar_tarefa.php?id=<?=$item->id;?>">Modificar</a>
        <a class="btn btn-danger" href="<?=$base;?>/excluir_tarefa_action.php?id=<?=$item->id;?>">Deletar</a>
      </div>    
    </div>
    <div class="d-grid gap-2 d-md-block">
     
    </div>
  <?php endforeach; ?>
</main>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="<?=$base;?>/_src/js/offcanvas.js"></script>
  </body>
</html>




