<?php

namespace Model;

use PDO;

class UserModel 
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function login($last_name, $password)
    {
        // Verificar si la sesión está activa
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $query = $this->db->prepare("SELECT * FROM users WHERE last_name = :last_name AND password = :password");
        $query->bindParam(":last_name", $last_name);
        $query->bindParam(":password", $password);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['last_name'] = $last_name;
            return true; 
        } else {
            echo "<script>alert('Incorrect username or password. Please try again.');</script>";
            echo "<script>window.location = '" . $_ENV['DOMAIN'] . "The-Library-book/src/view/formView.php';</script>";
            exit();
        }
    }

    public function isAdmin($last_name)
    {
        $query = $this->db->prepare("SELECT role FROM users WHERE last_name = :last_name");
        $query->bindParam(":last_name", $last_name);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        return ($user && $user['role'] === 'Administrator');
    }
    
}
?>
