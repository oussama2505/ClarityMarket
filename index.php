<?php
// index.php

// Iniciar la sesión
// session_start();

use Config\Database;
// use Controller\UserController;
// use Model\UserModel;

require_once __DIR__ . '/vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// $action = $_GET['action'] ?? '';

$con = new Database;
// $db = $con->connection();
var_dump($con->connection());
// $loginModel = new UserModel($db);
// $loginController = new UserController($loginModel);

// // Verificar si el usuario está logueado
// $isLoggedIn = isset($_SESSION['last_name']);

// if ($action === 'login') {
//     // Si el usuario está logueado y trata de acceder a la página de login, redirigirlo a otra página
//     if ($isLoggedIn) {
//         header("Location: " . $_ENV['DOMAIN'] . "The-Library-book/index.php?action=logout");
//         exit();
//     }
//     $loginController->processLogin();
// } elseif ($action === 'logout') {
//     // Si el usuario intenta hacer logout, destruir la sesión y redirigirlo a la página de login
//     session_destroy();
//     header("Location: " . $_ENV['DOMAIN'] . "The-Library-book/index.php?action=login");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>Clarity Market</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/resources/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/resources/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="resources/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="resources/css/style.css" rel="stylesheet">
    </head>

<body>
  <?php require "./src/view/components/header.php" ?>
  <!-- <?php require "./src/view/components/homeMain.php" ?>
  <?php require "./src/view/components/footer.php" ?> 

</body>

</html>
