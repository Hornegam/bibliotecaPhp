<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../model/Conexao.php';
        include_once '../model/comentarModel.php';
        //TO INSERINDO UM TESTE AQUI DO DANIEL
//        $conexao= Conexao::getInstance();
//        $conexao->set("192.168.9.108", "biblioteca", "biblioteca", "biblioteca");
//        $conexao->conectar();
//        $conexao->executar("insert into autor(nome)values('nelson')");
        $comentar = new comentarModel();
        //$usuario->setProntuario(9003);

      
       $comentar->setComentario('Esse livro é muito bom');
        $comentar->setPublCom('2020-03-10');
        
     

      
        ?>
    </body>
</html>
