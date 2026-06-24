<?php
require_once "controllers/EventoController.php";

$controller = new EventoController();

// Captura a ação da URL, se não houver, a padrão é 'listar'
$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($acao) {
    case 'cadastrar':
        $controller->cadastrar();
        break;
    case 'editar':
        if ($id) {
            $controller->editar($id);
        } else {
            echo "ID inválido para edição.";
        }
        break;
    case 'excluir':
        if ($id) {
            $controller->excluir($id);
        } else {
            echo "ID inválido para exclusão.";
        }
        break;
    case 'listar':
    default:
        $controller->listar();
        break;
}