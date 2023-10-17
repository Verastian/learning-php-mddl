<?php

class UserRepository
{
    private $mssql;

    public function __construct($mssql)
    {
        $this->mssql = $mssql;
    }

    public function getAllUsers()
    {
        $users = array();
        try {
            $query = "SELECT * FROM Users";
            $result = mssqlQ($this->mssql, $query);
            if ($result) {
                while ($row = mssqlF($result)) {
                    $user = new User($row['ID'], $row['Name'], $row['Email'], $row['Password']);
                    $users[] = $user;
                }
            }
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
        return $users;
    }

    public function getUserById($id)
    {
        try {
            $query = "SELECT * FROM Users WHERE id = " . $id;
            $result = mssqlQ($this->mssql, $query);
            $row = mssqlF($result);
            if ($row) {
                return new User($row['ID'], $row['Name'], $row['Email'], $row['Password']);
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function insertUser(User $user)
    {
        try {
            $name = $user->getName();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $query = "INSERT INTO Users (name, email, password) VALUES ('$name', '$email', '$password')";
            return mssqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function updateUser(User $user)
    {
        try {
            $id = $user->getId();
            $name = $user->getName();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $query = "UPDATE Users SET name='$name', email='$email', password='$password' WHERE id=$id";
            return mssqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }

    public function deleteUser($id)
    {
        try {
            $query = "DELETE FROM Users WHERE id=$id";
            return mssqlQ($this->mssql, $query);
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos:" . $e->getMessage();
        }
    }
}