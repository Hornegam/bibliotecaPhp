<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       // include_once '../model/AgendarModel.php';
       // include_once '../model/comentarModel.php';
       // include_once '../model/EmprestarModel.php';
        include_once '../model/LivroModel.php';
        include_once '../model/StatusModel.php';
       // include_once '../model/SugerirModel.php';
       // include_once '../model/UsuarioModel.php';
       
       //$status = new StatusModel();
       //$status->criar(4,"Teste");
       //$status->update("tipoStatus", "Disponível", 0);
     $livro = new LivroModel();
     $livros = $livro->listar();
    // echo $livro->getTitulo();
     

       
       //$livro = new LivroModel();
       //var_dump($livro->listarLivro(1));
       
      // $sugerir = new SugerirModel();


       ?>


</body>
</html>