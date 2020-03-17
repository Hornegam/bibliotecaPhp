<?php

include_once 'Conexao.php';

class comentarModel {

    private $codLivroCom;
    private $prontuarioUser;
    private $publCom;
    private $comentario;
   

    public function criar() {
        $sql = "INSERT INTO comentar
                        (
                            
                            codLivroCom
                            publCom,
                            comentario
                            
                        )
                        VALUES
                        (
                            '$this->codLivroCom'
                            '$this->publCom',
                            '$this->comentario'
                               
                        );";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function listar(){
        $sql = 'SELECT * FROM comentar;';             
        $usuarios = array();
        try
        {
            $rs = $this->conexao->carregar($sql); //recebe a tabela bruta RESULTSET
            while($tmp = $rs->fetchObject())            {
                $comentar = new comentarModel();
                $comentar->setProntuarioUser($tmp->prontuarioUser);
                $comentar->setCodLivroCom($tmp->codLivroCom);
                $comentar->setPublCom($tmp->publCom);
                $comentar->setComentario($tmp->comentario);
                array_push($usuarioss, $comentar);
            }
        }
        catch(PDOException $e)
        {
            
        }    
        print_r($usuarioss);
        return $usuarioss;
    }

    public function update($campo, $valor, $id, $idlivro){
        $sql = "UPDATE comentar SET $campo='$valor' WHERE prontuarioUser='$id' and codLivroCom='$idlivro";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id, $idlivro){
        $sql= "DELETE FROM comentario WHERE prontuarioUser='$id' and codLivroCom='$idlivro'";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



//------------- GETTERS and SETTERS --------------------------------------------    

    




    function getCodLivroCom() {
        return $this->codLivroCom;
    }

    function getProntuarioUser() {
        return $this->prontuarioUser;
    }

    function getPublCom() {
        return $this->publCom;
    }

    function getComentario() {
        return $this->comentario;
    }

    function setCodLivroCom($codLivroCom) {
        $this->codLivroCom = $codLivroCom;
    }

    function setProntuarioUser($prontuarioUser) {
        $this->prontuarioUser = $prontuarioUser;
    }

    function setPublCom($publCom) {
        $this->publCom = $publCom;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    
    

    function __construct() {
        $this->conexao = Conexao::getInstance();
    }
}
