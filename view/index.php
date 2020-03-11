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
        
//        $conexao= Conexao::getInstance();
//        $conexao->set("192.168.9.108", "biblioteca", "biblioteca", "biblioteca");
//        $conexao->conectar();
//        $conexao->executar("insert into autor(nome)values('nelson')");
        $usuario = new UsuarioModel();
        //$usuario->setProntuario(9003);
        $usuario->setNome('Beltrano');
        $usuario->setCpf('82345688932');
        $usuario->setRg('42345632');
        $usuario->setSenha('abc');
        $usuario->setEmissor('SP');
        $usuario->insert();
        //$usuario->listar();
        ?>
    </body>
</html>
