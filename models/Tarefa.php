<?php

class Tarefa {
    public $id;
    public $id_usuario;
    public $data;
    public $titulo;
    public $descricao;
}

interface TarefaDAO {
    public function insert(Tarefa $t);
    public function inserirTarefa($id_user);
    public function delete($id, $id_user);
    public function update($id, $data, $titulo, $local, $descricao, $id_user);
    public function pegarTarefa($id, $id_user);
    public function pesquisa($pesquisa, $id_user);
}