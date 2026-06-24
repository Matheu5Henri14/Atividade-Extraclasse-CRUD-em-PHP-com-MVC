<?php
class Evento {
    private $conn;
    private $table_name = "eventos";

    public $id;
    public $nome;
    public $data_evento;
    public $local;
    public $preco_ingresso;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function cadastrar() {
        $query = "INSERT INTO " . $this->table_name . " (nome, data_evento, local, preco_ingresso) VALUES (:nome, :data_evento, :local, :preco_ingresso)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":data_evento", $this->data_evento);
        $stmt->bindParam(":local", $this->local);
        $stmt->bindParam(":preco_ingresso", $this->preco_ingresso);

        return $stmt->execute();
    }

    // READ (Listar todos)
    public function listar() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY data_evento ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // READ (Buscar um único evento por ID)
    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            $this->data_evento = $row['data_evento'];
            $this->local = $row['local'];
            $this->preco_ingresso = $row['preco_ingresso'];
            return true;
        }
        return false;
    }

    // UPDATE
    public function editar() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, data_evento = :data_evento, local = :local, preco_ingresso = :preco_ingresso WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":data_evento", $this->data_evento);
        $stmt->bindParam(":local", $this->local);
        $stmt->bindParam(":preco_ingresso", $this->preco_ingresso);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // DELETE
    public function excluir($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}