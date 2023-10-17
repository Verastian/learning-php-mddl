<?php
include '../functions/mssql.php';

try {
    // Conexión a la base de datos
    $mssql = MSSQLConnect();

    // Nombre de la tabla que deseas crear
    $tableName = 'Users';

    // Consulta SQL para verificar si la tabla ya existe
    $checkTableSql = "IF OBJECT_ID('$tableName', 'U') IS NOT NULL SELECT 1 ELSE SELECT 0";

    $result = mssqlQ($mssql, $checkTableSql);

    if ($result) {
        $tableExists = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC);

        if ($tableExists && $tableExists[0] == 1) {
            echo "La tabla '$tableName' ya existe. No se ha creado nuevamente.";
        } else {
            // Consulta SQL para crear la tabla
            $createTableSql = "CREATE TABLE $tableName (
                ID INT IDENTITY(1,1) PRIMARY KEY,
                Name NVARCHAR(50),
                Email NVARCHAR(100),
                Password NVARCHAR(50)
            )";

            // Ejecutar la consulta SQL para crear la tabla
            $createResult = mssqlQ($mssql, $createTableSql);

            if ($createResult) {
                echo "La tabla '$tableName' se ha creado con éxito.";
            } else {
                echo "Hubo un error al crear la tabla '$tableName'.";
            }
        }
    }

    // Cerrar la conexión a la base de datos
    MSSQLDisconnect($mssql);
} catch (Exception $e) {
    echo "Error en la conexión a la base de datos: " . $e->getMessage();
}