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
       // include_once '../model/LivroModel.php';
        include_once '../model/StatusModel.php';
       // include_once '../model/SugerirModel.php';
       // include_once '../model/UsuarioModel.php';
       $status = new StatusModel();
       //$status->criar(4,"Teste");
       //$status->listar();
       $status->update("tipoStatus", "TESTE", 0);
       ?>


</body>
</html>