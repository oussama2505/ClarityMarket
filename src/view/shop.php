<?php

use Controller\BookController;


require_once __DIR__ . '../../../vendor/autoload.php';

$controller = new BookController;

// Get the current page from the URL, default to 1 if not provided
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Ensure page is at least 1
$page = max($page, 1);

// Get books by page
$books = $controller->getBooksByPage($page);

$totalBooks = $controller->getTotalBooksCount();

$totalPages = ceil($totalBooks / 10);

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/resources/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../resources/css/style.css" rel="stylesheet">
</head>

<body>
    <?php require "../view/components/header.html" ?>


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Our Organic Products</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-dark rounded-pill border" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-white" style="width: 130px;">Categoria</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 px-4 m-2 bg-white rounded-pill border" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: auto;">Tiempo de lectura</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-white rounded-pill border" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 130px;">Enfoque</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-white rounded-pill border" data-bs-toggle="pill" href="#tab-4">
                                    <span class="text-dark" style="width: 130px;">Localización</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div>
                        <div >
                            <div class="shopContainers">
                                <?php
                                if (is_array($books)) :
                                    foreach ($books as $book) :
                                ?>
                                        <div>
                                            <div class="cardProduct border border-secondary rounded">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <img src="data:image/jpeg; base64,<?= base64_encode($book['imagen_libro']) ?>" class="rounded-3 card-img-top py-3 px-5 imageBook" alt="Book Image">
                                                    </div>
                                                    <div class="p-4">
                                                         <h4><?= $book['titulo'] ?></h4> 
                                                         <p><?= $book['autor'] ?></p> 
                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                            <p class="text-dark fs-5 fw-bold mb-0"><?= $book['precio'] ?>€</p>
                                                            <a href="#" class="btn border border-secondary rounded-pill px-3"><img src="http://localhost/marketplace/assets/img/icon _bag 2_.svg"></img> Comprar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                endforeach;
                                                    ?>
                                                <?php
                                            endif;
                                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->

    <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <a href="?page=<?= $i ?>&<?= session_name() ?>=<?= session_id() ?>" class="pagination-btn"><?= $i ?></a>
                <?php endfor; ?>
            </div>


    <!-- Banner Section Start-->
    <div class="container-fluid banner bg-secondary my-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-3 text-white">Fresh Exotic Fruits</h1>
                        <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                        <p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                        <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="../assets/img/cesta-libros.jpg" class="img-fluid w-100 rounded" alt="">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                            <h1 style="font-size: 100px;">1</h1>
                            <div class="d-flex flex-column">
                                <span class="h2 mb-0">50$</span>
                                <span class="h4 text-muted mb-0">kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->






    <?php require "../view/components/footer.html" ?>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>