<?php

namespace Dao;

use \App\Conexao;
use PDO;

class LogDao{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }
    /*Método para crição persistencia de logs*/
    public function create($id_cliente, $acao, $dados){
        /*Variável para guardar o timestamp do momento da ação */
        $dataAtual = date('d/m/y H:i:s');
        $sql = "INSERT INTO `app-msg-nvoip`.`log`
        (`id_cliente`, `dataHora`, `acao`, `dados`)
        VALUES(:id_cliente, :dataHora, :acao, :dados);";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':dataHora', $dataAtual);
        $stmt->bindParam(':acao', $acao);
        $stmt->bindParam(':dados', $dados);

        if (!$stmt->execute()){
            echo "erro ao cadastrar log, houve algum problema!";
        }
    }
}