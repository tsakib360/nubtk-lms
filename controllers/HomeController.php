<?php

class HomeController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function latestHomeBook() {
        $data = [];
        $getData = "SELECT * FROM books ORDER BY id DESC LIMIT 4";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function allBooks() {
        $data = [];
        $getData = "SELECT * FROM books ORDER BY id DESC";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function singleBook($id) {
        $getData = "SELECT *, books.id AS id, books.name AS name, categories.name AS category_name, departments.short_name AS department_short_name FROM books LEFT JOIN categories ON categories.id = books.category_id LEFT JOIN departments ON categories.id = books.department_id WHERE books.id = '$id' LIMIT 1";
        $result = $this->conn->query($getData);
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        }else {
            redirect("Something went wrong!", "index.php");
        }
    }

    public function categoryBook($category_id) {
        $getData = "SELECT *, books.id AS id, books.name AS name, categories.name AS category_name, departments.short_name AS department_short_name FROM books LEFT JOIN categories ON categories.id = books.category_id LEFT JOIN departments ON categories.id = books.department_id WHERE books.category_id = '$category_id'";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}