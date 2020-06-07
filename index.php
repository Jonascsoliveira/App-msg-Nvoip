<?php
require_once "autoload.php";

use \Dao\ClienteDao;
use \App\Cliente;

//Variáveis para uso de filtro
$filtroCpf = filter_input(INPUT_POST, "filtroCpf");
$filtroEmail = filter_input(INPUT_POST, "filtroEmail");
$filtroTelefone = filter_input(INPUT_POST, "filtroTelefone");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>Index</title>
    </head>
    <body>
    <!--NAV BAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="cadastro.php">Cadastro</a>
                    </li>
                </ul>
                <form class="form-inline" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input class="form-control mr-sm-2" type="search" name="filtroCpf" placeholder="CPF" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Fitrar</button>
                </form>
                &nbsp;
                &nbsp;
                <form class="form-inline" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input class="form-control mr-sm-2" type="search" name="filtroEmail" placeholder="Email" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Fitrar</button>
                </form>
                &nbsp;
                &nbsp;
                <form class="form-inline" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input class="form-control mr-sm-2" type="search" name="filtroTelefone" placeholder="Telefone" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Fitrar</button>
                </form>
            </div>
        </nav>
    <!--Conteúdo-->
        <div class = "text-center">
            <h1 class="text-muted ">Clientes cadastrados</h1>
        </div>
        <div class = "offset-md-2">
            <?php 
            //Área de validação dos filtros
            $daoCliente = new ClienteDao();
                
            if(isset($filtroEmail)){
                $clientes = $daoCliente->listByEmail($filtroEmail);
            }
            elseif(isset($filtroTelefone)){
                $clientes = $daoCliente->listByTelefone($filtroTelefone);
            }
            elseif(isset($filtroCpf)){
                $clientes = $daoCliente->listByCpf($filtroCpf);
            }
            else{
                $clientes = $daoCliente->listAll();
            }
            //foreach para preencher grid com dados dos clientes    
            foreach($clientes as $cliente): ?>
                <div class="mb-3 col-md-10">
                    <div class="row">
                        <div class="col-md-1 border">Nome: <?=$cliente->getNome()?></div>
                        <div class="col-md-2 border">Sobrenome: <?=$cliente->getSobrenome()?></div>
                        <div class="col-md-3 border">Email: <?=$cliente->getEmail()?></div>
                        <div class="col-md-2 border">CPF: <?=$cliente->getCpf()?></div>
                        <div class="col-md-2 border">Telefone: <?=$cliente->getTelefone()?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 border">Cep: <?=$cliente->getCep()?></div>
                        <div class="col-md-4 border">Endereço: <?=$cliente->getEndereco()?></div>
                        <div class="col-md-3 border">Bairro: <?=$cliente->getBairro()?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 border">Cidade: <?=$cliente->getCidade()?></div>
                        <div class="col-md-3 border">Estado: <?=$cliente->getEstado()?></div>
                        <div class="col-md-2 border">Pais: <?=$cliente->getPais()?></div>
                        <div class="col-md-1"><a class="btn btn-warning" href="cadastro.php?alterar=<?=$cliente->getId()?>">Alterar</a></div>
                        <div class="col-md-1"><a class="btn btn-danger" href="index.php?excluir=<?=$cliente->getId()?>">Excluir</a></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="apisms.php" method="post" class="form-inline">
                                <input type="text" name="msg" id="msg" class="form-control" placeholder="Texto, sem acentuacao!" required>
                                <input type="hidden" name="telefone" value="<?=$cliente->getTelefone()?>">
                                <input type="hidden" name="id" value="<?=$cliente->getId()?>">
                                &nbsp;
                                &nbsp;
                                <input type="submit" value="Enviar SMS" class="btn btn-info form-control">
                            </form>
                        </div>
                        <div class="col-md-2">
                            <form action="apivoicesms.php" method="post">
                                <input type="hidden" name="telefone" value="<?=$cliente->getTelefone()?>">
                                <input type="hidden" name="id" value="<?=$cliente->getId()?>">
                                <input type="submit" value="Enviar mensagem de voz" class="btn btn-info">
                            </form>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach; 
                //ação de exclusão, chamada de método passando id via GET
                if(isset($_GET['excluir'])){
                    $daoCliente->delete($_GET['excluir']);
                }
            ?>
    </body>
</html>
