<?php



session_start();
include 'conexoesphp/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar'])) {
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];

    $sql = "INSERT INTO extrato (data, descricao, tipo, valor) VALUES ('$data', '$descricao', '$tipo', $valor)";
    $conn->query($sql);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM extrato WHERE id=$id");
}
$result = $conn->query("SELECT * FROM extrato");


$totalEntrada = $conn->query("SELECT SUM(valor) AS total FROM extrato WHERE tipo='Entrada'")->fetch_assoc()['total'] ?? 0;
$totalSaida = $conn->query("SELECT SUM(valor) AS total FROM extrato WHERE tipo='Saída'")->fetch_assoc()['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style/paginainicio.css">
    <title>Extrato | Nexus</title>

</head>
<body>
<script>
    alert("🌟 Olá! Seja bem-vindo(a) à Nexus! 🚀\nA ponte para alcançar suas metas financeiras.");
</script>

<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand">
            <img src="img/logo.png" alt="Nexus Logo">
        </a>
        <a href="index.php" class="btn btn-outline-danger">Sair</a>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-center">Olá, <strong>Usuário</strong>! </h2>
    <div class="titulo">
        <h3>Seus Extratos</h3>
    </div>

    <div class="botoes">
        <a href="adicionar.php">
            <button type="button" class="btn btn-primary" id="adicionar">
                <i class="bi bi-plus-circle"></i> Adicionar
            </button>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Valor Total (R$)</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
        
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['data']; ?></td>
    <td><?php echo $row['descricao']; ?></td>
    <td>R$ <?php echo number_format($row['valor'], 2, ',', '.'); ?></td>
    <td><?php echo $row['tipo']; ?></td>
    <td>
        <!-- Botão Editar -->
        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-pencil-square"></i> Editar
        </a>
        <!-- Botão Excluir -->
        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Deseja excluir este registro?')" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-trash"></i> Excluir
        </a>
    </td>
</tr>
<?php endwhile; ?>

            </tbody>
        </table>
    </div>
    <h2>Totais</h2>
    <p class = 'entrada'>Total de Entradas: R$ <?php echo number_format($totalEntrada, 2, ',', '.'); ?></p>
    <p class = 'saida'>Total de Saídas: R$ <?php echo number_format($totalSaida, 2, ',', '.'); ?></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

