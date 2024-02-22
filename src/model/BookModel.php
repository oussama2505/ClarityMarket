<?php

namespace Model;

use Config\Database;
use PDO;

class BookModel
{
    private $pdo;

    public function __construct()
    {
        $connection = New Database;
        $this->pdo = $connection->connection();
    }

    public function getBooks() {
        $books = $this->pdo->prepare("SELECT * FROM library.books");
        return ($books->execute()) ? $books->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function getBooksByPage($offset, $limit) {
    $statement = $this->pdo->prepare("SELECT * FROM library.books LIMIT :limit OFFSET :offset");
    $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
    $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalBooksCount() {
        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM library.books");
        $statement->execute();
        return $statement->fetchColumn();
    }

    public function searchBooks($keyword, $offset, $limit) {
        $keyword = "%$keyword%";
        $statement = $this->pdo->prepare("SELECT * FROM library.books WHERE title LIKE :keyword OR author LIKE :keyword LIMIT :limit OFFSET :offset");
        $statement->bindValue(':keyword', $keyword, PDO::PARAM_STR);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalBooksSearched($keyword) {
        $keyword = "%$keyword%";
        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM library.books WHERE title LIKE :keyword OR author LIKE :keyword");
        $statement->bindValue(':keyword', $keyword, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchColumn();
    }


    public function addBook($title, $author, $isbn, $description, $image_path) {
        $statement = $this->pdo->prepare("INSERT INTO library.books (title, author, isbn, description, book_image) VALUES (:title, :author, :isbn, :description, :image_path)");
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':author', $author, PDO::PARAM_STR);
        $statement->bindValue(':isbn', $isbn, PDO::PARAM_STR);
        $statement->bindValue(':description', $description, PDO::PARAM_STR);
        $statement->bindValue(':image_path', $image_path, PDO::PARAM_STR);
        return $statement->execute();
    }
}
