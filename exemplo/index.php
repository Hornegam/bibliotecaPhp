<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'Conexao.php';
        include_once 'models/UsuarioModel.php';
        
//        $conexao= Conexao::getInstance();
//        $conexao->set("192.168.9.108", "biblioteca", "biblioteca", "biblioteca");
//        $conexao->conectar();
//        $conexao->executar("insert into autor(nome)values('nelson')");
        $usuario = new UsuarioModel();
        $usuario->setProntuario(9003);
        $usuario->setNome('Ciclano');
        $usuario->setCpf('123456');
        $usuario->setRg('123654');
        $usuario->setSenha('abc');
        $usuario->criar();
        $usuario->listar();
        ?>
    </body>
</html>
