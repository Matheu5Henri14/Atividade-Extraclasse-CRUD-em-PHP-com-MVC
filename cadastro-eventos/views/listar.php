<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Eventos Cadastrados</h2>
        <a href="index.php?acao=cadastrar" class="btn btn-primary">Novo Evento</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Local</th>
                <th>Preço do Ingresso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($eventos) > 0): ?>
                <?php foreach ($eventos as $ev): ?>
                    <tr>
                        <td><?= $ev['id'] ?></td>
                        <td><?= htmlspecialchars($ev['nome']) ?></td>
                        <td><?= date('d/m/Y', strtotime($ev['data_evento'])) ?></td>
                        <td><?= htmlspecialchars($ev['local']) ?></td>
                        <td>R$ <?= number_format($ev['preco_ingresso'], 2, ',', '.') ?></td>
                        <td>
                            <a href="index.php?acao=editar&id=<?= $ev['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="index.php?acao=excluir&id=<?= $ev['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Nenhum evento cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>