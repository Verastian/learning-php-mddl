<?php

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function createUser($name, $email, $password)
    {
        $user = new User(null, $name, $email, $password);
        return $this->userRepository->insertUser($user);
    }

    public function updateUser($id, $name, $email, $password)
    {
        $user = new User($id, $name, $email, $password);
        return $this->userRepository->updateUser($user);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }


}