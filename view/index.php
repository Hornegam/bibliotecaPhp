<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../model/Conexao.php';
        include_once '../model/UsuarioModel.php';
        //TO INSERINDO UM TESTE AQUI DO DANIEL
//        $conexao= Conexao::getInstance();
//        $conexao->set("192.168.9.108", "biblioteca", "biblioteca", "biblioteca");
//        $conexao->conectar();
//        $conexao->executar("insert into autor(nome)values('nelson')");
        $usuario = new UsuarioModel();
        //$usuario->setProntuario(9003);
        $usuario->setNome('Beltrano');
        $usuario->setCpf('18346188912');
        $usuario->setRg('11434677');
        $usuario->setSenha('abcuuhhu');
        $usuario->setEmissor('SP');
        $usuario->criar();
        //$usuario->listar();
        ?>
    </body>
</html>
