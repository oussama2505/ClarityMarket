<?php

namespace Controller;
use Model\BookModel;

class BookController 
{
    private $model;

    public function __construct()
    {
        $this->model = new BookModel;
    }

    public function getBooks()
    {
        return ($this->model->getBooks()) ?
        $this->model->getBooks() : "No hay libros disponibles";
    }
    
    public function getBooksByPage($page, $limit = 10) {
    $offset = ($page - 1) * $limit;
        return $this->model->getBooksByPage($offset, $limit);
    }

    public function getTotalBooksCount() {
        return $this->model->getTotalBooksCount();
    }

    public function searchBooks($keyword, $page) {
        $limit = 10;
        $offset = ($page - 1) * $limit;
        return $this->model->searchBooks($keyword, $offset, $limit);
    }

    public function getTotalBooksSearched($keyword) {
        return $this->model->getTotalBooksSearched($keyword);
    }


    public function addBook($title, $author, $isbn, $description, $image_path) {
        return $this->model->addBook($title, $author, $isbn, $description, $image_path);
    }
}