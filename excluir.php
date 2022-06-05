<?php
    require_once 'config.php';
    require_once 'dao/UsuarioDAOMysql.php';
 
    $usuarioDAO = new UsuarioDAOMYsql($pdo);

    $id = filter_input(INPUT_GET, 'id');
    if($id) {

        $usuarioDAO->delete($id);

    }


    header("Location: index.php");
    exit;