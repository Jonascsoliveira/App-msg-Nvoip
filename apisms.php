<?php
require_once "autoload.php";

use \Dao\LogDao;

if (isset($_POST)) {
    $msg = $_POST['msg'];
    $numTelefoneCelular = $_POST['telefone'];
    $id = $_POST['id'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.nvoip.com.br/v1/sms");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, TRUE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
    \"celular\": \"{$numTelefoneCelular}\",
    \"msg\": \"{$msg}\"
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "token_auth: 211718131b8d420b13943298bbfb09b71ddd1"
));

$response = curl_exec($ch);
curl_close($ch);

$acao = "Envio de SMS";
$dados = "{$msg}";
$log = new LogDao();
$log->create($id, $acao, $dados);

header("Location: index.php");

}else{
    echo "Dados incorretos, tente novamente!";
}