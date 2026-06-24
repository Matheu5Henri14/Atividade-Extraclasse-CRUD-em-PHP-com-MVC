<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Cadastrar Novo Evento</h2>
    <form action="index.php?acao=cadastrar" method="POST" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Nome do Evento:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Data:</label>
            <input type="date" name="data_evento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Local:</label>
            <input type="text" name="local" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Preço do Ingresso (Ex: 50.00):</label>
            <input type="number" step="0.01" name="preco_ingresso" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>