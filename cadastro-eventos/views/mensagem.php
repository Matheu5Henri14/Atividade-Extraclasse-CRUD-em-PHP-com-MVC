<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5 text-center">
    <div class="alert alert-<?= $tipo ?>" role="alert">
        <h4><?= $mensagem ?></h4>
    </div>
    <a href="index.php" class="btn btn-primary mt-3">Voltar para a Listagem</a>
</body>
</html>