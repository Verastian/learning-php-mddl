<?php
// Incluir el archivo con las funciones y definiciones
include '../functions/mssql.php';
include 'class/Users.php';

try {
    // Establecer una conexión a la base de datos
    $mssql = MSSQLConnect();

    // Nombre de la tabla que deseas leer
    $tableName = 'Users';

    // Verificar si la tabla existe utilizando la función
    if (tableExists($mssql, $tableName)) {



        // Crear un array de usuarios
        $usersArray = [
            new User("Nombre3", "correo3@ejemplo.com", "contraseña3"),
            new User("Nombre4", "correo4@ejemplo.com", "contraseña4"),
            // Agregar más objetos de usuario según sea necesario
        ];
        // Insertar el arreglo de usuarios en la base de datos y verificar el estado de la inserción
        $success = User::insertUsersArray($mssql, $usersArray);

        if ($success) {
            echo "Todos los usuarios fueron insertados correctamente.";
        } else {
            echo "Se produjo un error durante la inserción de usuarios.";
        }

    } else {
        echo "La tabla '$tableName' no existe en la base de datos.";
    }

} catch (Exception $e) {
    echo "Error en la conexión a la base de datos:" . $e->getMessage();
}



// Cerrar la conexión a la base de datos
MSSQLDisconnect($mssql);

// Función para verificar si una tabla existe
function tableExists($mssql, $tableName)
{
    $checkTableSql = "IF OBJECT_ID('$tableName', 'U') IS NOT NULL SELECT 1 ELSE SELECT 0";
    $result = mssqlQ($mssql, $checkTableSql);

    if ($result) {
        $tableExists = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC);

        return $tableExists && $tableExists[0] == 1;
    }

    return false;
}


?>