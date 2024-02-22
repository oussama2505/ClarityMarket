<?php

require_once __DIR__ . '../../vendor/autoload.php';

use Controller\BookController;

$controller = new BookController;


if (isset($_GET['id'])) {

    $bookId = $_GET['id'];
    $books = $controller->getBooks();

    $book = null;

    foreach ($books as $book) {
        if ($book['id'] == $bookId) {
            break;
        }
    }

    if ($book) {

?>
        <main>
        <div class="bookDetailsMain">
            
                <section class="bookDetailsContainer">
                    <img src="<?= $_ENV['DOMAIN'] . $book['book_image'] ?>" alt="Book's cover" class="bookDetailsImage">
                    <aside class="infoContainer">
                        <h2 class="bookDetailsTitle">
                            <?= $book['title'] ?>
                        </h2>
                        <h3 class="bookDetailsAuthor">
                            <?= $book['author'] ?>
                        </h3>
                        <h6 class="bookDetailsTextTitle">
                            ISBN
                        </h6>
                        <p class="bookDetailsText">
                            <?= $book['ISBN'] ?>
                        </p>
                        <h6 class="bookDetailsTextTitle">
                            Description
                        </h6>
                        <p class="bookDetailsText">
                            <?= $book['description'] ?>
                        </p>
                    </aside>
                </section>
                <a class="buttonDetails" href="../../index.php">
                    Back
                </a>
    </div>
    </main>
          
        <?php

    } else {
        echo "No se encontró el libro.";
    }
} else {

    echo "ID de libro no proporcionado.";
}
        ?>