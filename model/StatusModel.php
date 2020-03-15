<?php

include_once 'Conexao.php';

class StatusModel {

    private $codStatus;
    private $status;


    public function criar() {
 $sql = "INSERT INTO `status`(`codEmprStatus`, `tipoStatus`) VALUES ('$this->codStatus', '$this->status');";
try {
$this->conexao->executar($sql);            
} catch (Exception $e) {
echo $e->getMessage();
}
    
    }

    public function listar(){
    }

    public function update($campo, $valor, $id){
    }

    public function delete($id){
    }


function __construct() {
    $this->conexao = Conexao::getInstance();
}

}