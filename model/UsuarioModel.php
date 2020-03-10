<?php

include_once 'Conexao.php';

class UsuarioModel {

    private $prontuario;
    private $rg;
    private $cpf;
    private $nome;
    private $senha;
    private $emissor;
    private $conexao;

    public function insert() {
        $sql = "INSERT INTO usuario
                        (
                            rg,
                            cpf,
                            nome,
                            senha,
                            emissor
                        )
                        VALUES
                        (
                            '$this->rg',
                            '$this->cpf',
                            '$this->nome',
                            '$this->senha',
                            '$this->emissor'   
                        );";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function select(){
        $sql = 'SELECT * FROM usuario;';             
        $usuarios = array();
        try
        {
            $rs = $this->conexao->carregar($sql); //recebe a tabela bruta RESULTSET
            while($tmp = $rs->fetchObject())            {
                $usuario = new UsuarioModel();
                $usuario->setProntuario($tmp->prontuario);
                $usuario->setNome($tmp->nome);
                $usuario->setCpf($tmp->cpf);
                array_push($usuarios, $usuario);
            }
        }
        catch(PDOException $e)
        {
            
        }    
        print_r($usuarios);
        return $usuarios;
    }

   

//------------- GETTERS and SETTERS --------------------------------------------    
    function getProntuario() {
        return $this->prontuario;
    }

    function getRg() {
        return $this->rg;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }
    
    function getEmissor() {
        return $this->emissor;
    }

    function setEmissor($emissor) {
        $this->emissor = $emissor;
    }

    function setProntuario($prontuario) {
        $this->prontuario = $prontuario;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {        
        $this->senha = sha1($senha);
    }

    function __construct() {
        $this->conexao = Conexao::getInstance();
    }

}
