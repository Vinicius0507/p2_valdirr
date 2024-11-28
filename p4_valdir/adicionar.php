<?php
session_start();
include 'conexoesphp/conexao.php';
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar - Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h4>Adicionar ao Extrato <i class="bi bi-plus-circle-fill"></i></h4>
                    <a href="pagina_inicial.php" class="btn btn-light btn-sm">Voltar</a>
                </div>
                <div class="card-body">
                    <form action="pagina_inicial.php" method="POST">
                    <div class="mb-4">
                            <label for="valor" class="form-label fw-semibold">escolha uma data:</label>
                            <input type="date" id="data" name="data" class="form-control" step="0.01" placeholder="Digite o valor" required>
                        </div>
                        <div class="mb-4">
                            <label for="valor" class="form-label fw-semibold">Valor (R$):</label>
                            <input type="number" id="valor" name="valor" class="form-control" step="0.01" placeholder="Digite o valor" required>
                        </div>
                        <div class="mb-4">
                            <label for="descricao" class="form-label fw-semibold">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="4" placeholder="Descreva a entrada ou saída" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tipo:</label>
                            <select id="tipo" name="tipo" required>
                                 <option value="Entrada">Entrada</option>
                                 <option value="Saída">Saída</option>
                             </select>                         
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="adicionar"  id="adicionar"  class="btn btn-success">Salvar <i class="bi bi-save2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
