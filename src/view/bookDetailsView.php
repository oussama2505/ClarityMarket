<?php

  require_once __DIR__ . '../../../vendor/autoload.php';

  require_once __DIR__ . '../../../components/session_check.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../resources/base.css" rel="stylesheet">
  <title>The Library Book</title>
</head>

<body>
  <?php require "../../components/header.php"; ?>
  <?php require "../../components/bookDetails.php"; ?>
  <?php require "../../components/footer.php"; ?>
</body>

</html>