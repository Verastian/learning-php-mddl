<!-- user_list.php -->
<h2>Lista de Usuarios</h2>
<ul>
    <?php foreach ($users as $user): ?>
    <li>
        Nombre:
        <?php echo $user->getName(); ?>, Email:
        <?php echo $user->getEmail(); ?> -

        <a href="index.php?route=user-details&id=<?php echo $user->getId(); ?>">Ver detalles</a> -

        <form method="post" action="index.php?route=delete-user">
            <input type="hidden" name="user_id" value="<?php echo $user->getId(); ?>">
            <button type="submit">Eliminar</button>
        </form>

    </li>
    <?php endforeach; ?>
</ul>
<a href="index.php?route=form">Crear Usuario</a>