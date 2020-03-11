<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../model/Conexao.php';
        include_once '../model/LivroModel.php';
        
//        $conexao= Conexao::getInstance();
//        $conexao->set("192.168.9.108", "biblioteca", "biblioteca", "biblioteca");
//        $conexao->conectar();
//        $conexao->executar("insert into autor(nome)values('nelson')");
        //$usuario = new UsuarioModel();
        //$usuario->setProntuario(9003);
       // $usuario->setNome('Belta515arano');
       // $usuario->setCpf('12345678913');
       // $usuario->setRg('123456173');
       // $usuario->setSenha('abaa23');
        //$usuario->setEmissor('SP');
        //$usuario->criar();
        //$usuario->listar();
        $usuario = new LivroModel();
        
        //$usuario->setTitulo('asda');
        //$usuario->setAutor('cuzaoXico');
      // $usuario->setPublicacao('2000-02-20');
        //$usuario->setGenero('gay');
        //$usuario->criar();
        //$usuario->listar();
        //$usuario->update('titulo', 'lucas', '12');
        $usuario->delete('12');
        ?>
    </body>
</html>
