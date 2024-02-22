<?php

require_once __DIR__ . '../../vendor/autoload.php';

use Controller\BookController;

$controller = new BookController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $isbn = $_POST["isbn"];
    $description = $_POST["description"];
    $image_path = '';

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/../assets/images/books/';
        $file_name = basename($_FILES['photo']['name']);
        $target_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
            $image_path = 'The-Library-book/assets/images/books/' . $file_name;
        } else {
            echo "<script>alert('Error al subir la imagen.');</script>";
        }
    }

   
    $result = $controller->addBook($title, $author, $isbn, $description, $image_path);
    if ($result) {
        echo "<script>alert('Libro agregado correctamente.'); window.location.href = '../../';</script>";
    } else {
        echo "<script>alert('Error al agregar el libro.');</script>";
    }
}

?>




<main class="bookFormMain">
    <form id="bookform" method="post" enctype="multipart/form-data">
        <div class="bookFormContainer">
            <!-- <fieldset> -->
            <legend>Add a new book</legend>
            <div class="formInput">
                <section class="inputLeftSide">
                    <p>
                        <label for="title">Title*</label>
                        <input class="input" type="text" name="title" value="" id="title" placeholder="Title" required />
                    </p>
                    <p>
                        <label for="author">Author*</label>
                        <input class="input" type="text" name="author" value="" id="author" placeholder="Author" required />
                    </p>
                    <p>
                        <label for="isbn">ISBN*</label>
                        <input class="input" type="text" name="isbn" value="" id="isbn" placeholder="ISBN" required />
                    </p>
                    <p>
                        <label for="uploadPhoto">Image*</label><br />
                        <input type="file" name="photo" id="uploadPhoto"/>
                    </p>
                </section>

                <aside class="inputRightSide">
                    <p>
                        <label for="description">Description*</label><br />
                        <textarea name="description" id="description" cols="40" rows="10" placeholder="Add a description" required></textarea>
                    </p>
                    <div class="buttonSection">
                        <button class="formButton" type="submit">Send</button>
                        <button class="formButton" type="button" onclick="window.location.href = '../../index.php';">Back</button>
                    </div>
                </aside>
            </div>
            <!-- </fieldset> -->
        </div>
    </form>
</main>