<?php

namespace Controller;

use Model\UserModel;

class UserController 
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function processLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty($username) && !empty($password)) {
                if ($this->model->login($username, $password)) {
                    // Contraseña correcta
                    echo "<script>alert('You are now logged in. Welcome!');</script>";
                } 
            }
        }
    }
}

?>
