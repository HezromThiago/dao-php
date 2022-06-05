<?php
    require_once 'config.php';
    require_once 'dao/UsuarioDAOMysql.php';

    $usuarioDAO = new UsuarioDAOMYsql($pdo);
    $lista = $usuarioDAO->findAll();


?>
    <a href="adicionar.php">ADICIONAR USUARIO</a>
    <table border="1" width="600px">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </tr>
        <?php foreach($lista as $user): ?>

            <tr>
                <td><?= $user->getId(); ?></td>
                <td><?= $user->getNome(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <td>
                    <a href="editar.php?id=<?= $user->getId(); ?>">[ Editar ]</a>
                    <a href="excluir.php?id=<?= $user->getId(); ?>" onclick="return confirm('tem certeza?')">[ Excluir ]</a>
                </td>
            </tr>

        <?php endforeach ?>
    </table>