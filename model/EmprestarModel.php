<?php

include_once 'Conexao.php';

class EmprestarModel {

    private $prontuarioUser;
    private $codLivro;
    private $codEmpr;
    private $dataRet;
    private $dataDev;

    public function criar() {
        $sql = "INSERT INTO emprestar
                        (
                            dataRet,
                            dataDev,
                        )
                        VALUES
                        (
                            '$this->dataRet',
                            '$this->dataDev',   
                        );";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function listar(){
        $sql = 'SELECT * FROM emprestar;';             
        $usuarios = array();
        try
        {
            $rs = $this->conexao->carregar($sql); //recebe a tabela bruta RESULTSET
            while($tmp = $rs->fetchObject())            {
                $emprestar = new EmprestarModel();
                $emprestar->setProntuarioUser($tmp->prontuarioUser);
                $emprestar->setCodLivro($tmp->codLivro);
                $emprestar->setCodEmpr($tmp->codEmpr);
                $emprestar->setDataRet($tmp->dataRet);
                $emprestar->setDataDev($tmp->dataDev);
                array_push($emprestimos, $emprestar);
            }
        }
        catch(PDOException $e)
        {
            
        }    
        print_r($emprestimos);
        return $emprestimos;
    }

    public function update($campo, $valor, $id){
        $sql = "UPDATE emprestar SET $campo='$valor' WHERE codEmpr='$id'";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id){
        $sql= "DELETE FROM emprestar WHERE codEmpr='$id'";
        try {
            $this->conexao->executar($sql);            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


//------------- GETTERS and SETTERS --------------------------------------------    
function getProntuarioUser() {
    return $this->prontuarioUser;
}

function getCodLivro() {
    return $this->codLivro;
}

function getCodEmpr() {
    return $this->codEmpr;
}

function getDataRet() {
    return $this->dataRet;
}

function getDataDev() {
    return $this->dataDev;
}

function setProntuarioUser($prontuarioUser) {
    $this->prontuarioUser = $prontuarioUser;
}

function setCodLivro($codLivro) {
    $this->codLivro = $codLivro;
}

function setCodEmpr($codEmpr) {
    $this->codEmpr = $codEmpr;
}

function setDataRet($dataRet) {
    $this->dataRet = $dataRet;
}

function setDataDev($dataDev) {
    $this->dataDev = $dataDev;
}

function __construct() {
    $this->conexao = Conexao::getInstance();
}

}