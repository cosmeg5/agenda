<?php 
require_once 'models/Tarefa.php';

class TarefaDaoDb implements TarefaDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function insert(Tarefa $t) {
        $sql = $this->pdo->prepare("INSERT INTO tarefas (
            id_usuario, data, titulo, local, descricao
        ) VALUES (
            :id_usuario, :data, :titulo, :local, :descricao
        )");

        $sql->bindValue(':id_usuario', $t->id_usuario);
        $sql->bindValue(':data', $t->data);
        $sql->bindValue(':titulo', $t->titulo);
        $sql->bindValue(':local', $t->local);
        $sql->bindValue(':descricao', $t->descricao);
        $sql->execute();

        return true;
    }

    public function delete($id, $id_user) {
        $sql = $this->pdo->prepare("DELETE FROM tarefas WHERE id = :id AND id_usuario = :id_usuario");

        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_usuario', $id_user);
        $sql->execute();
    }


    public function update($id, $data, $titulo, $local, $descricao, $id_user) {
        $sql = $this->pdo->prepare("UPDATE tarefas SET
            data = :data,
            titulo = :titulo,
            local = :local,
            descricao = :descricao
            WHERE id = :id AND id_usuario = :id_usuario
        ");

        $sql->bindValue(':id', $id);
        $sql->bindValue(':data', $data);
        $sql->bindValue(':titulo', $titulo);
        $sql->bindValue(':local', $local);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(':id_usuario', $id_user);
        $sql->execute();
    }

    public function pegarId($id) {
        $usuario = [$id];

        $sql = $this->pdo->prepare("SELECT id_usuario FROM tarefas WHERE id_usuario = :id_usuario");
        $alter = $this->pdo->prepare("ALTER TABLE tarefas AUTO_INCREMENT = 1");

        $sql->bindValue(':id_usuario', $id);
        $sql->execute();
        $alter->execute();

        if($sql->rowCount() > 1) {
            $data = $sql->fetchAll();
            foreach($data as $item) {
                $usuario[] = $item['id_usuario'];
            }
        }

        return $usuario;
    }

    public function inserirTarefa($id_user) {
        $array = [];

        $tafDao = new TarefaDaoDb($this->pdo);
        $usuarioTarefas = $tafDao->pegarId($id_user);
    
        $sql = $this->pdo->query("SELECT * FROM tarefas WHERE id_usuario
        IN (".implode(',', $usuarioTarefas).") ORDER BY data DESC");

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            $tarefa = [];

            foreach($data as $item) {
                $novaTarefa = new Tarefa();
                $novaTarefa->id = $item['id'];
                $novaTarefa->id_usuario = $item['id_usuario'];
                $novaTarefa->data = $item['data'];
                $novaTarefa->titulo = $item['titulo'];
                $novaTarefa->descricao= $item['descricao'];

                $tarefa[] = $novaTarefa;
            }

            return $tarefa;
        }

        return $array;
    }

    public function pegarTarefa($id, $id_user) {
        $sql = $this->pdo->prepare("SELECT * FROM tarefas WHERE id = :id AND id_usuario = :id_usuario");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_usuario', $id_user);
        $sql->execute();
    
        if($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
    
            return $data;
        }
    }

    public function pesquisa($pesquisa, $id_user) {
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM tarefas 
        WHERE data  LIKE :pesquisa  
        AND titulo  LIKE :pesquisa 
        AND local LIKE :pesquisa
        AND data LIKE :pesquisa 
        AND descricao LIKE :pesquisa
        AND id_usuario = :id_usuario");
        $sql->bindValue(':id_usuario', $id_user);
        $sql->bindValue(':pesquisa', '%'.$pesquisa.'%');
        $sql->execute();
    
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
           
            foreach($data as $item) {
                $array = $this->inserirTarefa($id_user);
                print_r($array);
            }
    
        }     
        
        return $array;
    }
}
