<?php
class User
{
    private $name;
    private $email;
    private $password;


    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    // *INSERT USER
    public function insertUser($mssql, $tableName)
    {
        // Crear la consulta SQL para insertar un nuevo usuario en la tabla
        $insertSql = "INSERT INTO $tableName (Name, Email, Password) VALUES ('" . $this->name . "', '" . $this->email . "', '" . $this->password . "')";

        $query = mssqlQ($mssql, $insertSql);

        // Comprobar si la inserción fue exitosa
        if ($query) {
            return true; // Inserción exitosa
        } else {
            return false; // Error en la inserción
        }
    }
    // *INSERT MANY USERS
    public static function insertUsersArray($mssql, $usersArray)
    {
        $success = true; // Suponemos que la inserción es exitosa inicialmente

        foreach ($usersArray as $user) {
            // Verificar si el usuario ya existe en la base de datos
            $checkQuery = "SELECT * FROM Users WHERE name = '" . $user->name . "' AND email = '" . $user->email . "'";
            $checkResult = mssqlQ($mssql, $checkQuery);
            if (mssqlF($checkResult)) {
                $success = false;

            } else {
                // Si el usuario no existe, realizar la inserción
                $insertQuery = "INSERT INTO Users (name, email, password) VALUES ('" . $user->name . "', '" . $user->email . "', '" . $user->password . "')";
                $result = mssqlQ($mssql, $insertQuery);
                if (!$result) {
                    $success = false;
                } else {
                    $success = true;
                }


            }
        }

        return $success;
    }

    public static function getAllUsers($mssql)
    {
        $users = array();

        try {
            $query = "SELECT * FROM Users;";
            $result = mssqlQ($mssql, $query);

            if ($result) {
                // recuperar y almacenar los datos de todos los usuarios
                while ($row = mssqlF($result)) {
                    $user = new User($row['Name'], $row['Email'], $row['Password']);
                    array_push($users, $user);
                }
            }

        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }

        return $users;
    }

}