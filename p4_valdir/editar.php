<?php
session_start();
require_once('conexoesphp/conexao.php');

// Inicializa a variável para o extrato
$row = [];

// Verifica se o ID do extrato foi passado na URL
if (!isset($_GET['id'])) {
    header('Location: pagina_inicial.php');
    exit();
} else {
    $extratoId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM extrato WHERE id = '{$extratoId}'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Extrato Financeiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Editar Extrato Financeiro <i class="bi bi-pencil-square"></i></h4>
                        <a href="pagina_inicial.php" class="btn btn-danger">Voltar</a>
                    </div>
                    <div class="card-body">
                    <?php
                        if ($row) :
                        ?>
                        <form action="pagina_inicial.php" method="POST">
                            <!-- Campo oculto com o ID do extrato -->
                            <input type="hidden" name="id" value="<?=$row['id'];?>">

                            <div class="mb-3">
                                <label for="valor" class="form-label">Valor (R$)</label>
                                <input type="number" name="valor" id="valor" class="form-control" step="0.01" 
                                    value="<?=$row['valor']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea class="form-control" rows="4" id="descricao" name="descricao" required><?=$row['descricao']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" name="data" id="data" class="form-control" 
                                    value="<?=$row['data']; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Tipo</label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="tipo" id="entrada" value="Entrada" class="form-check-input" 
                                        <?php echo ($row['tipo'] === 'Entrada') ? 'checked' : ''; ?> required>
                                    <label for="entrada" class="form-check-label">Entrada</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="tipo" id="saida" value="Saída" class="form-check-input" 
                                        <?php echo ($row['tipo'] === 'Saída') ? 'checked' : ''; ?> required>
                                    <label for="saida" class="form-check-label">Saída</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="adicionar" id="adicionar" class="btn btn-primary float-end">Salvar Alterações</button>
                            </div>
                        </form>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
