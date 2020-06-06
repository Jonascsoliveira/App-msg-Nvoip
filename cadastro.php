<?php
require_once "autoload.php";

use \Dao\ClienteDao;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Cadastro</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Cadastro</a>
                    </li>
                </ul>
            </div>
    </nav>
    <!--FORM-->
    <form method="post" action="cadastro.php">
        <div class = "offset-md-3">
            <div class="form-row">
                <div class="col-md-2 mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?= $cliente->nome??'' ?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome" value="<?= $cliente->sobrenome??'' ?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email@email.com" value="<?= $cliente->email??'' ?>" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 mb-3">
                    <label for="cpf">Cpf</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Somente números" value="<?= $cliente->cpf??'' ?>"required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="cep">Cep</label>
                    <input type="text" class="form-control" name="cep" id="cep" placeholder="Somente números" value="<?= $cliente->cep??'' ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua ... numero ..." value="<?= $cliente->endereco??'' ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Ex: Jardim Boa Vista" value="<?= $cliente->bairro??'' ?>"required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Ex: Juiz de Fora" value="<?= $cliente->cidade??'' ?>" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" name="estado" id="estado" placeholder="Ex: Minas Gerais" value="<?= $cliente->estado??'' ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="pais">Pais</label>
                    <input type="text" class="form-control" name="pais" id="pais" placeholder="Brasil" value="<?= $cliente->pais??'' ?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Somente numeros" value="<?= $cliente->telefone??'' ?>" required>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $cliente->id??'' ?>">
            <input class="btn btn-primary" type="submit" name="enviado"
                value="<?=isset($cliente)?'Alterar':'Cadastrar'?>">
        </div>
    </form>
<?php
    if($_POST['enviado']):
        $daoCliente = new ClienteDao();
        
        $daoCliente->create($_POST['nome'], $_POST['sobrenome'], $_POST['email'], 
            $_POST['cpf'],  $_POST['cep'],  $_POST['endereco'], 
            $_POST['bairro'], $_POST['cidade'], $_POST['estado'],
            $_POST['pais'], $_POST['telefone']);
            var_dump($daoCliente);
    endif;
?>
</body>
</html>
