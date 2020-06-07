<?php
require_once "autoload.php";

use \Dao\LogDao;
/*Declarando variável com conteúdo da mensagem*/
$texto = "Ola isso e um teste";
/*Verificando se a requisição POST possui conteúdo*/
if (isset($_POST)) {
    $numTelefoneCelular = $_POST['telefone'];
    $id = $_POST['id'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.nvoip.com.br/v1/torpedovoz");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, TRUE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
    \"caller\": \"33523001\",
    \"called\": \"{$numTelefoneCelular}\",
    \"audio\": \"{$texto}\"
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "token_auth: 211718131b8d420b13943298bbfb09b71ddd1"
));

$response = curl_exec($ch);
curl_close($ch);
/*Após envio de mensagem é persistido no log que houve o envio*/
$acao = "Envio de Voice SMS";
$dados = "{$texto}";
$log = new LogDao();
$log->create($id, $acao, $dados);

header("Location: index.php");
}else{
/*Caso haja falha, é persistido no log que não houve o envio*/
    $acao = "Falha no envio de Voice SMS";
    $dados = "{$texto}";
    $log = new LogDao();
    $log->create($id, $acao, $dados);
    echo "Mensagem não envida, tente novamente!";
    var_dump($response);
    }