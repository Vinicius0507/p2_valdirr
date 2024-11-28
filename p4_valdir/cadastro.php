<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <nav class="navbar navbar-light">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="Nexus Logo">
          </a>
        </div>
    </nav>

    <div class="container">
        <div class="register-container">
            <h3 class="text-center">Cadastro</h3>
            <p class="text-center">Já tem uma conta? <a href="index.php" class="text-primary">Faça login aqui</a></p>
            <form action="conexoesphp/cadastrar.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome completo" required>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite seu CPF" maxlength="14" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato esperado: XXX.XXX.XXX-XX" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Gmail</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email do Gmail" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="Crie sua senha" required>
                </div>
                <button type="submit" class="btn btn-primary" name="cadastro" id="cadastro">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>