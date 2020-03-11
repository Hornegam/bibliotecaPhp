<<<<<<< HEAD
=======

>>>>>>> 6437b6703b8cd93af04210a6025012a4434bfc7a
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

    public function criar() {
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
    
    public function listar(){
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

    public function update($campo, $valor, $id){
        $sql = "UPDATE usuario SET $campo='$valor' WHERE prontuario='$id'";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id){
        $sql= "DELETE FROM usuario WHERE prontuario='$id'";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
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
<<<<<<< HEAD
=======
 
>>>>>>> 6437b6703b8cd93af04210a6025012a4434bfc7a
