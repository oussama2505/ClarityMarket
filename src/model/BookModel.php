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
        $books = $this->pdo->prepare("SELECT * FROM clarity_market.books");
        return ($books->execute()) ? $books->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function getBooksByPage($offset, $limit) {
    $statement = $this->pdo->prepare("SELECT * FROM clarity_market.books LIMIT :limit OFFSET :offset");
    $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
    $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalBooksCount() {
        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM clarity_market.books");
        $statement->execute();
        return $statement->fetchColumn();
    }

    public function searchBooks($keyword, $offset, $limit) {
        $keyword = "%$keyword%";
        $statement = $this->pdo->prepare("SELECT * FROM clarity_market.books WHERE title LIKE :keyword OR author LIKE :keyword LIMIT :limit OFFSET :offset");
        $statement->bindValue(':keyword', $keyword, PDO::PARAM_STR);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalBooksSearched($keyword) {
        $keyword = "%$keyword%";
        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM clarity_market.books WHERE title LIKE :keyword OR author LIKE :keyword");
        $statement->bindValue(':keyword', $keyword, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchColumn();
    }

}
