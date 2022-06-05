<?php
    require_once 'config.php';
    require_once 'dao/UsuarioDAOMysql.php';

    $usuarioDAO = new UsuarioDAOMYsql($pdo);

    $user = false;
    $id = filter_input(INPUT_GET, 'id');

    if($id) {
        $user = $usuarioDAO->findById($id);
    }

    if($user == false) {
        header("Location: index.php");
        exit;
    }
?>

    <h1>Editar Usuario</h1>

    <form method="POST" action="editar_action.php">
        <input type="hidden" name="id" value="<?= $user->getId();?>">

        <label>Nome: <br /></label>
        <input type="text" name="name" id="name" value="<?= $user->getNome(); ?>"><br /><br />

        <label>E-mail: </label><br />
        <input type="email" name="email" id="email" value="<?= $user->getEmail(); ?>"><br /> <br />

        <input type="submit" value="Editar">
    </form>