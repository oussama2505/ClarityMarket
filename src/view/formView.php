<?php

  require_once __DIR__ . '../../../vendor/autoload.php';
  require_once __DIR__ . '../../../components/session_check.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <link href="../../resources/base.css" rel="stylesheet">
    <link href="../../resources/form.css" rel="stylesheet">
</head>
<body>
<?php require "../../components/header.php" ?>
<main class="customMain">
    <div class="containerForm">
        <h1>Sign in</h1>
        <form action="../../index.php?action=login" method="post">
            <label for="username">Username:</label><br>
            <input class="inputAnswer" type="text" id="username" name="username" required><br><br>
            <label class=textForm for="password">Password:</label><br>
            <input class="inputAnswer" type="password" id="password" name="password" required><br><br>

            <input class="bottomForm" type="submit" value="Log in">
        </form>
    </div>

</main>
<?php require "../../components/footer.php" ?>
</body>
</html>
