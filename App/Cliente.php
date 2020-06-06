<?php
namespace App;

require_once "autoload.php";

class Cliente{
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $cpf;
    private $cep;
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;
    private $pais;
    private $telefone;

    public function __construct($id=0 , $nome = '', $sobrenome = '', $email = '', $cpf = '', $cep = '', $endereco = '', $bairro = '', $cidade = '', $estado = '', $pais = '', $telefone = '')
    {
        $this->setId($id);
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);
        $this->setEmail($email);
        $this->setCpf($cpf);
        $this->setCep($cep);
        $this->setEndereco($endereco);
        $this->setBairro($bairro);
        $this->setCidade($cidade);
        $this->setEstado($estado);
        $this->setPais($pais);
        $this->setTelefone($telefone);
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function setId( $value )
    {
        $this->id = $value;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome( $value )
    {
        $this->nome = $value;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome( $value )
    {
        $this->sobrenome = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail( $value )
    {
        $this->email = $value;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf( $value )
    {
        $this->cpf = $value;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep( $value )
    {
        $this->cep = $value;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco( $value )
    {
        $this->endereco = $value;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro( $value )
    {
        $this->bairro = $value;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade( $value )
    {
        $this->cidade = $value;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado( $value )
    {
        $this->estado = $value;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais( $value )
    {
        $this->pais = $value;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone( $value )
    {
        $this->telefone = $value;
    }
}