<?php


use Controller\BookController;

require_once __DIR__ . '../../vendor/autoload.php';


$controller = new BookController;
$books = $controller->getBooks();


?>
<main>
    <div class="wrapper">
                <h1>Find your next literary adventure</h1>
                <div class="bookGrid">
                <?php
    if(is_array($books)) :
        foreach($books as $book) :
        ?>
                    <div class="bookCard" href='#'>
                            <div class="bookCover"> 
                                <a href="src/view/bookDetailsView.php?id=<?= $book['id']?>" title='View Book' data-toggle='tooltip'>
                                    <img src='<?= $_ENV['DOMAIN'].$book['book_image']?>' alt='<?= $book['title'] ?> Cover'>
                                </a>

                            </div>
                            <div class="bookInfo">
                                <h3><?= $book['title'] ?></h3>
                                <p><?= $book['author'] ?></p>
                            </div>
                            
                    </div>
        <?php
        endforeach;
        ?>
        <?php else: ?>
            <h3><?= $books ?></h3>
    <?php endif; ?>
                </div>
        <div class="pagination">
            <button class="pagination-btn">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <button class="pagination-btn">Next</button>
        </div>
    </div>
</main>