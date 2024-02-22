<?php


use Controller\BookController;
use Model\UserModel;

require_once __DIR__ . '../../../vendor/autoload.php';


$controller = new BookController;
$books = $controller->getBooks();

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$isAdmin = isset($_GET['isAdmin']) && $_GET['isAdmin'] === 'true';

if (isset($_SESSION['last_name'])) {
    $loginModel = new UserModel($db); 
    $last_name = $_SESSION['last_name'];
    $isAdmin = $loginModel->isAdmin($last_name);
}

if (isset($_GET['search']) && isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $books = $controller->searchBooks($keyword, $page);
    $totalBooks = $controller->getTotalBooksSearched($keyword);
} else {
    $books = $controller->getBooksByPage($page);
    $totalBooks = $controller->getTotalBooksCount();
}

$totalPages = ceil($totalBooks / 10);
?>



<main>
    <div class="wrapper">
        <div class="title-group">
            <h1>Find your next literary adventure</h1>
            <!-- Admin case:-->
            <?php if ($isAdmin) : ?> 
            <span class="add-button">
                <a href="src/view/bookform.php" class="add-link"><img src="<?= $_ENV['DOMAIN'] ?>The-Library-book/assets/images/add-icon.svg" alt="Add a new book">Add a new book</a>
            </span>
            <?php endif; ?>
            <!-- Aquí cerramos el if del Admin case-->
        </div>
        <div class="bookGrid">
            <?php
            if (is_array($books)) :
                foreach ($books as $book) :
            ?>
                    <div class="bookCard" href='#'>
                        <div class="bookCover">
                            <a href="src/view/bookDetailsView.php?id=<?= $book['id'] ?>" title='View Book' data-toggle='tooltip'>
                                <img src='<?= $_ENV['DOMAIN'] . $book['book_image'] ?>' alt='<?= $book['title'] ?> Cover'>
                            </a>

                        </div>
                        <div class="bookInfo">
                            <h3><?= $book['title'] ?></h3>
                            <p><?= $book['author'] ?></p>
                           <!-- Admin case:-->
                            <?php if ($isAdmin) : ?> 
                            <div class="icons-row">
                                <a href="src/view/bookform.php?id=<?= $book['id'] ?>"><img src="<?= $_ENV['DOMAIN'] ?>The-Library-book/assets/images/edit-icon.svg" alt="Edit"></a>

                                <a href="src/view/bookform.php?id=<?= $book['id'] ?>"><img src="<?= $_ENV['DOMAIN'] ?>The-Library-book/assets/images/delete-icon.svg" alt="Delete"></a>
                            </div>
                            <?php endif; ?>
                            <!-- Aquí cerramos el if del Admin case-->
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            <?php else : ?>
                <h3><?= $books ?></h3>
            <?php endif; ?>
        </div>

            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <a href="?page=<?= $i ?>&isAdmin=<?= isset($_SESSION['role']) && $_SESSION['role'] === 'Administrador' ? 'true' : 'false' ?>&<?= session_name() ?>=<?= session_id() ?>" class="pagination-btn"><?= $i ?></a>
                <?php endfor; ?>
            </div>
    </div>
</main>