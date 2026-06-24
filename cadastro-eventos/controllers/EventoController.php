<?php
require_once "config/Database.php";
require_once "models/Evento.php";

class EventoController {
    private $db;
    private $evento;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->evento = new Evento($this->db);
    }

    public function listar() {
        $stmt = $this->evento->listar();
        $eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "views/listar.php";
    }

    public function cadastrar() {
        if ($_POST) {
            $this->evento->nome = $_POST['nome'];
            $this->evento->data_evento = $_POST['data_evento'];
            $this->evento->local = $_POST['local'];
            $this->evento->preco_ingresso = $_POST['preco_ingresso'];

            if ($this->evento->cadastrar()) {
                $mensagem = "Evento cadastrado com sucesso!";
                $tipo = "success";
            } else {
                $mensagem = "Erro ao cadastrar evento.";
                $tipo = "danger";
            }
            include "views/mensagem.php";
        } else {
            include "views/cadastrar.php";
        }
    }

    public function editar($id) {
        if ($_POST) {
            $this->evento->id = $id;
            $this->evento->nome = $_POST['nome'];
            $this->evento->data_evento = $_POST['data_evento'];
            $this->evento->local = $_POST['local'];
            $this->evento->preco_ingresso = $_POST['preco_ingresso'];

            if ($this->evento->editar()) {
                $mensagem = "Evento atualizado com sucesso!";
                $tipo = "success";
            } else {
                $mensagem = "Erro ao atualizar evento.";
                $tipo = "danger";
            }
            include "views/mensagem.php";
        } else {
            if ($this->evento->buscarPorId($id)) {
                $evento = $this->evento;
                include "views/editar.php";
            } else {
                $mensagem = "Evento não encontrado.";
                $tipo = "danger";
                include "views/mensagem.php";
            }
        }
    }

    public function excluir($id) {
        if ($this->evento->excluir($id)) {
            $mensagem = "Evento excluído com sucesso!";
            $tipo = "success";
        } else {
            $mensagem = "Erro ao excluir evento.";
            $tipo = "danger";
        }
        include "views/mensagem.php";
    }
}