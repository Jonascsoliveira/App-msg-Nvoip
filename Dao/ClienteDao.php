<?php

namespace Dao;

use \App\Conexao;
use \App\Cliente;
use PDO;

class ClienteDao{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }
    
    public function create($nome, $sobrenome, $email, $cpf, $cep, $endereco, $bairro, $estado, $pais, $telefone){
        
        $sql = "INSERT INTO `app-msg-nvoip`.`cliente`
        (`nome`, `sobrenome`, `email`, `cpf`, `cep`, `endereco`, `bairro`, `estado`, `pais`, `telefone`)
        VALUES(:nome, :sobrenome, :email, :cpf, :cep, :endereco, :bairro, :estado, :pais, :telefone);";

        $nomeTrimed      = trim($nome);
        $sobrenomeTrimed = trim($sobrenome);
        $emailTrimed     = trim($email);
        $cpfTrimed       = trim($cpf);
        $cepTrimed       = trim($cep);
        $enderecoTrimed  = trim($endereco);
        $bairroTrimed    = trim($bairro);
        $estadoTrimed    = trim($estado);
        $paisTrimed      = trim($pais);
        $telefoneTrimed  = trim($telefone);

        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindParam(':nome',      $nomeTrimed);
        $stmt->bindParam(':sobrenome', $sobrenomeTrimed);
        $stmt->bindParam(':email',     $emailTrimed);
        $stmt->bindParam(':cpf',       $cpfTrimed);
        $stmt->bindParam(':cep',       $cepTrimed);
        $stmt->bindParam(':endereco',  $enderecoTrimed);
        $stmt->bindParam(':bairro',    $bairroTrimed);
        $stmt->bindParam(':estado',    $estadoTrimed);
        $stmt->bindParam(':pais',      $paisTrimed);
        $stmt->bindParam(':telefone',  $telefoneTrimed);

        if ($stmt->execute()){
            echo "Cliente cadastrado";
        }else{
            echo "Cliente não cadastrado, houve algum erro!";
        }
    }

    public function edit($id, $nome, $sobrenome, $email, $cpf, $cep, $endereco, $bairro, $estado, $pais, $telefone){
        $sql = "UPDATE `app-msg-nvoip`.`cliente`
        SET `nome`= :nome, `sobrenome`= :sobrenome, `email`=:email, `cpf`=:cpf, `cep`=:cep, 
        `endereco`=:endereco, `bairro`=:bairro, `estado`=:estado, `pais`=:pais, `telefone`=:telefone
        WHERE `id`=:id;";

        $nomeTrimed      = trim($nome);
        $sobrenomeTrimed = trim($sobrenome);
        $emailTrimed     = trim($email);
        $cpfTrimed       = trim($cpf);
        $cepTrimed       = trim($cep);
        $enderecoTrimed  = trim($endereco);
        $bairroTrimed    = trim($bairro);
        $estadoTrimed    = trim($estado);
        $paisTrimed      = trim($pais);
        $telefoneTrimed  = trim($telefone);

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':nome',      $nomeTrimed);
        $stmt->bindParam(':sobrenome', $sobrenomeTrimed);
        $stmt->bindParam(':email',     $emailTrimed);
        $stmt->bindParam(':cpf',       $cpfTrimed);
        $stmt->bindParam(':cep',       $cepTrimed);
        $stmt->bindParam(':endereco',  $enderecoTrimed);
        $stmt->bindParam(':bairro',    $bairroTrimed);
        $stmt->bindParam(':estado',    $estadoTrimed);
        $stmt->bindParam(':pais',      $paisTrimed);
        $stmt->bindParam(':telefone',  $telefoneTrimed);
        $stmt->bindParam(':id',        $id);

        if ($stmt->execute()){
            echo "Cliente cadastrado";
        }else{
            echo "Cliente não cadastrado, houve algum erro!";
        }
    }

    public function listAll(){
        $sql = "SELECT * FROM `app-msg-nvoip`.`cliente`;";

        $stmt = $this->conexao->query($sql);
        $clientes = $stmt->fetchAll(PDO::FETCH_CLASS, '\App\Cliente');

        return $clientes;
    }

    public function delete($id){
        $sql = "DELETE FROM `app-msg-nvoip`.`cliente` WHERE `id`=:id;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id',$id);

    if (!$stmt->execute()):
        echo "Ocorreu um erro!";
    endif;
    }

    public function listByCpf($cpf){
        $sql = "SELECT * FROM `app-msg-nvoip`.`cliente` WHERE `cpf` LIKE `%`:cpf`%`;";

        $stmt = $this->conexao->query($sql);
        $stmt->bindParam(':cpf',$cpf);

        $cliente = $stmt->fetchAll(PDO::FETCH_CLASS, '\App\Cliente');

        return $cliente;
    }

    public function listByEmail($email){
        $sql = "SELECT * FROM `app-msg-nvoip`.`cliente` WHERE `email` LIKE `%`:email`%`;";

        $stmt = $this->conexao->query($sql);
        $stmt->bindParam(':email',$email);

        $cliente = $stmt->fetchAll(PDO::FETCH_CLASS, '\App\Cliente');

        return $cliente;
    }

    public function listByTelefone($telefone){
        $sql = "SELECT * FROM `app-msg-nvoip`.`cliente` WHERE `telefone` LIKE `%`:telefone`%`;";

        $stmt = $this->conexao->query($sql);
        $stmt->bindParam(':telefone',$telefone);

        $cliente = $stmt->fetchAll(PDO::FETCH_CLASS, '\App\Cliente');

        return $cliente;
    }
}