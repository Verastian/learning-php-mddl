<?php

class UserController
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // *Methods

    //* Form route 
    public function form()
    {
        include('../templates/user.form.php');
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        include('../templates/user.list.php');
    }

    // * Get User
    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        include('../templates/user.details.php');
    }

    // * create User
    public function create($name, $email, $password)
    {
        $this->userService->createUser($name, $email, $password);
        // Redirect
        header('Location: index.php?route=user-list');
    }
    // * Update User
    public function update($id, $name, $email, $password)
    {
        $this->userService->updateUser($id, $name, $email, $password);
        // include('../templates/user.details.php');
    }
    // * Delete User
    public function delete($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
            $userId = $_POST['user_id'];
            $success = $this->userService->deleteUser($userId);
            if ($success) {
                // Redirigir a la lista de usuarios después de eliminar exitosamente
                // header('Location: user.list.php');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                // Manejar el caso de fallo de eliminación
                echo "Error al eliminar el usuario.";
            }
        }
    }
}