<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="titulo">Lista de Usuarios</h1>
        </div>
        <ul class="lista-tareas">
            <li>Nombre Email </li>
            <?php

            foreach ($allUsers as $user) {
                echo "<li>" . $user->getName() . $user->getEmail() . "</li>";
            }
            ?>
        </ul>

    </div>
    <script src="main.js"></script>
</body>

</html>