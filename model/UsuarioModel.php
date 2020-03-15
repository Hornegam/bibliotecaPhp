<?php

include_once 'Conexao.php';
include_once 'AgendarModel.php';
include_once 'EmprestarModel.php';
include_once 'ComentarModel.php';

class UsuarioModel {

    private $prontuario;
    private $rg;
    private $cpf;
    private $nome;
    private $senha;
    private $emissor;
    private $conexao;
    public $agendar;
    
    //Classe Agendar
    public function agendar($livroCod){
        if(getProntuario() != null){
            try{
                //Pega hora do sistema
                date_default_timezone_set('America/Sao_Paulo');
                $date = date('Y/m/d h:i:s a', time());

                //Chama a classe agendar
                $agendar = new AgendarModel();
                $agendar->setProntuarioUserAge(getProntuario());
                $agendar->setPublLivroAge($date);
                $agendar->setCodLivroAge($livroCod);

                //Coloca no banco com as dependencias certas
                $agendar->criar();
            }catch(Exception $e){
                echo($e);
            }
        }
    }

    //Precisa Terminar a classe sugerir
    public function sugerir(){
        if(getProntuario() != null){
            try{
                //Pega hora do sistema
                date_default_timezone_set('America/Sao_Paulo');
                $date = date('d/m/Y h:i:s a', time());

                //Chama a classe agendar
                $agendar = new AgendarModel();
                $agendar->setProntuarioUserAge(getProntuario());
                $agendar->setPublLivroAge($date);
                $agendar->setCodLivroAge($livroCod);

                //Coloca no banco com as dependencias certas
                $agendar->criar();
            }catch(Exception $e){
                echo($e);
            }
        }
    }

    //Classe Emprestar - Falta atualizar a funcao criar da classe emprestar
    public function emprestar($livroCod){
        if(getProntuario() != null){
            try{
                //Pega hora do sistema para data que o usuario retirou o livro
                date_default_timezone_set('America/Sao_Paulo');
                $dateRetirada = date('d/m/Y h:i:s a', time());
                //Calcula quando o usuario tem que retornar o livro
                $dateEntrega = strtotime("+7 day", $start_date);
                //Chama a classe emprestar
                $emprestar = new EmprestarModel();
                $emprestar->setProntuarioUser(getProntuario());
                $emprestar->setCodLivro($livroCod);
                $emprestar->setDataRet($dateRetirada);
                $emprestar->setDataDev($dateEntrega);

                //Coloca no banco com as dependencias certas
                $emprestar->criar();
            }catch(Exception $e){
                echo($e);
            }
        }
    }

    //Classe Comentar
    public function comentar($livroCod){
        if(getProntuario() != null){
            try{
                //Pega hora do sistema para data que o usuario retirou o livro
                date_default_timezone_set('America/Sao_Paulo');
                $datePubl = date('d/m/Y h:i:s a', time());
                //Chama a classe comentar
                $comentar = new ComentarModel();
                $comentar->setProntuarioUser(getProntuario());
                $comentar->setCodLivroCom($livroCod);
                $comentar->setpublCom($datePubl);

                //Coloca no banco com as dependencias certas
                $comentar->criar();
            }catch(Exception $e){
                echo($e);
            }
        }
    }
    



    
 //-------------------------------------Lidar com o Banco de DADOS--------------------------------
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

    public function listarItem($prontuario){
        $sql = "SELECT * FROM usuario where prontuario = $prontuario;";             
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
