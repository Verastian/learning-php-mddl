<?php

include '../functions/mssql.php';
include 'class/Users.php';

$mssql = MSSQLConnect();

$allUsers = User::getAllUsers($mssql);

foreach ($allUsers as $user) {
    echo "Nombre: " . $user->getName() . ", Email: " . $user->getEmail() . "<br>";
}

include 'index.view.php';

// cerrar conexión
MSSQLDisconnect($mssql)
    ?>