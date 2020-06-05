<?php

namespace Dao;

use \App\Conexao;
use PDO;

class LogDao{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    public function create(){

        $dataAtual = new DateTime();
        $sql = "INSERT INTO `app-msg-nvoip`.`log`
        (`id_cliente`, `dataHora`, `acao`, `dados`)
        VALUES(:id_cliente, :dataHora, :acao, :dados);";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':dataHora', $dataAtual);
        $stmt->bindParam(':acao', $acao);
        $stmt->bindParam(':dados', $dados);

        if ($stmt->execute()){
            echo "Cliente cadastrado";
        }else{
            echo "Cliente não cadastrado, houve algum erro!";
        }
    }
}