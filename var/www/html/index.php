<?php
	include "functions/mssql.php";
        $mssql=MSSQLConnect();
        $q=mssqlQ($mssql,"select * from test");
        while  ($row=mssqlF($q)) {
             echo "{$row['id']} {$row['nombre']} {$row['apellido']} <br>";
        }
	mssqlQ($mssql,"insert into test(nombre,apellido) values('diego','perez')");
        MSSQLDisconnect($mssql);

?>