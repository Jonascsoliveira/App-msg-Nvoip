<?php

namespace Dao;

use \App\Conexao;
//use \App\Cliente;
use PDO;

class ClienteDao{

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }
    
    public function create($nome, $sobrenome, $email, $cpf, $cep, $endereco, $bairro, $cidade, $estado, $pais, $telefone){
        
        $sql = "INSERT INTO `app-msg-nvoip`.`cliente`
        (`nome`, `sobrenome`, `email`, `cpf`, `cep`, `endereco`, `bairro`, `cidade`, `estado`, `pais`, `telefone`)
        VALUES(:nome, :sobrenome, :email, :cpf, :cep, :endereco, :bairro, :cidade, :estado, :pais, :telefone);";

        $nomeTrimed      = trim($nome);
        $sobrenomeTrimed = trim($sobrenome);
        $emailTrimed     = trim($email);
        $cpfTrimed       = trim($cpf);
        $cepTrimed       = trim($cep);
        $enderecoTrimed  = trim($endereco);
        $bairroTrimed    = trim($bairro);
        $cidadeTrimed    = trim($cidade);
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
        $stmt->bindParam(':cidade',    $cidadeTrimed);
        $stmt->bindParam(':estado',    $estadoTrimed);
        $stmt->bindParam(':pais',      $paisTrimed);
        $stmt->bindParam(':telefone',  $telefoneTrimed);

        if ($stmt->execute()){
            echo "Cliente cadastrado";
        }else{
            echo "Cliente não cadastrado, houve algum erro!";
        }
    }

    public function edit($id, $nome, $sobrenome, $email, $cpf, $cep, $endereco, $bairro, $cidade, $estado, $pais, $telefone){
        $sql = "UPDATE `app-msg-nvoip`.`cliente`
        SET `nome`= :nome, `sobrenome`= :sobrenome, `email`=:email, `cpf`=:cpf, `cep`=:cep, 
        `endereco`=:endereco, `bairro`=:bairro, `cidade`=:cidade, `estado`=:estado, `pais`=:pais, `telefone`=:telefone
        WHERE `id`=:id;";

        $nomeTrimed      = trim($nome);
        $sobrenomeTrimed = trim($sobrenome);
        $emailTrimed     = trim($email);
        $cpfTrimed       = trim($cpf);
        $cepTrimed       = trim($cep);
        $enderecoTrimed  = trim($endereco);
        $bairroTrimed    = trim($bairro);
        $cidadeTrimed    = trim($cidade);
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
        $stmt->bindParam(':cidade',    $cidadeTrimed);
        $stmt->bindParam(':estado',    $estadoTrimed);
        $stmt->bindParam(':pais',      $paisTrimed);
        $stmt->bindParam(':telefone',  $telefoneTrimed);
        $stmt->bindParam(':id',        $id);

        if ($stmt->execute()){
            echo "Alterado com sucesso";
        }else{
            echo "Cliente não cadastrado, houve algum erro!";
        }
    }

    public function listAll(){
        $sql = "SELECT * FROM `app-msg-nvoip`.`cliente`;";

        $stmt = $this->conexao->query($sql);
        $clientes = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\App\Cliente');

        return $clientes;
    }

    public function getById($id){
        $sql = "SELECT * FROM `app-msg-nvoip`.`cliente` WHERE `id`= :id;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\App\Cliente');

        $cliente = $stmt->fetch();
        return $cliente;
    }

    public function delete($id){
        $sql = "DELETE FROM `app-msg-nvoip`.`cliente` WHERE `id`=:id;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id',$id);

    if (!$stmt->execute()):
        echo "Ocorreu um erro!";
    else:
        header('location:index.php');
    endif;
    }

    public function listByCpf($cpf){
        $sql = "SELECT * FROM `app-msg-nvoip`.`cliente` WHERE `cpf` LIKE :cpf;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':cpf',"%{$cpf}%");
        $stmt->execute();

        $cliente = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\App\Cliente');

        return $cliente;
    }

    public function listByEmail($email){
        $sql = "SELECT * FROM `app-msg-nvoip`.`cliente` WHERE `email` LIKE :email;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':email',"%{$email}%");
        $stmt->execute();

        $cliente = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\App\Cliente');

        return $cliente;
    }

    public function listByTelefone($telefone){
        $sql = "SELECT * FROM `app-msg-nvoip`.`cliente` WHERE `telefone` LIKE :telefone;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':telefone',"%{$telefone}%");
        $stmt->execute();

        $cliente = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\App\Cliente');

        return $cliente;
    }
}