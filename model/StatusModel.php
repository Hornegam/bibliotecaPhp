<?php

include_once 'Conexao.php';

class StatusModel {

    private $codStatus;
    private $status;


    public function criar($codStatus, $status) {
        $sql = "INSERT INTO status(codEmprStatus, tipoStatus) VALUES ('$codStatus', '$status');";
        $this->conexao->executar($sql);            
    }

    public function listar(){
        $sql = "SELECT * FROM status";
        $Allstatus = array();
        try
        {
            $rs = $this->conexao->carregar($sql); //recebe a tabela bruta RESULTSET
            $Allstatus = $rs->fetchObject();
        }
        catch(PDOException $e)
        {
            
        }    
        return $Allstatus;
        
    }

    public function listarItem($id){
        $sql = "SELECT * FROM status where CodEmprStatus=$id";
        try
        {
            $rs = $this->conexao->carregar($sql); //recebe a tabela bruta RESULTSET
            while($tmp = $rs->fetchObject())            {
                 StatusModel::setCodStatus($tmp->codEmprStatus);
                 StatusModel::setTipoStatus($tmp->tipoStatus);
                
                }
        }
        catch(PDOException $e)
        {
     echo "Deu ruim ai viado";       
        }    
        
    }





    public function update($campo, $valor, $id){
        $sql = "UPDATE status SET $campo='$valor' WHERE codEmprStatus='$id'";
        $this->conexao->executar($sql);            
    }

    public function delete($id){
   $sql= "DELETE FROM status WHERE codEmprStatus='$id'";
    }


//GETS e SETS do Código do Status
    function setCodStatus($codStatus){
    $this->codStatus = $codStatus;
    }
    function getCodStatus(){
        return $this->codStatus;
    }
//GETS e SETS do Tipo do Status
    function setTipoStatus($status){
        $this->status = $status;
    }
    function getTipoStatus(){
            return $this->status;
    }
    

function __construct() {
    $this->conexao = Conexao::getInstance();
}

}