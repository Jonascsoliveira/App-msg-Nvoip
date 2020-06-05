<?php
namespace App;

require_once "autoload.php";

class Log{
    private $id;
    private $id_cliente;
    private $dataHora;
    private $acao;
    private $dados;

    public function __construct($id , $id_cliente, $dataHora, $acao, $dados)
    {
        $this->setId($id);
        $this->setIdCliente($id_cliente);
        $this->setDataHora($dataHora);
        $this->setAcao($acao);
        $this->setDados($dados);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId( $value )
    {
        $this->id = $value;
    }

    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function setIdCliente( $value )
    {
        $this->id_cliente = $value;
    }

    public function getDataHora()
    {
        return $this->dataHora;
    }

    public function setDataHora( $value )
    {
        $this->dataHora = $value;
    }

    public function getAcao()
    {
        return $this->acao;
    }

    public function setAcao( $value )
    {
        $this->acao = $value;
    }

    public function getDados()
    {
        return $this->dados;
    }

    public function setDados( $value )
    {
        $this->dados = $value;
    }
}