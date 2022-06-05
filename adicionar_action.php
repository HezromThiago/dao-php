<?php

    require_once 'config.php';
    require_once 'dao/UsuarioDAOMysql.php';

    $usuarioDAO = new UsuarioDAOMYsql($pdo);

    $name = filter_input(INPUT_POST, 'name');   
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    if($name && $email) {

        if($usuarioDAO->findByEmail($email) === false) {
            $newUser = new Usuario();
            $newUser->setNome($name);
            $newUser->setEmail($email);

            $usuarioDAO->add($newUser);

            header("Location: index.php");
            exit;
        }else {
            header("Location: adicionar.php");
            exit;
        }

    } else {
        header("Location: adicionar.php");
        exit;
    }