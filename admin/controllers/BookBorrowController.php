<?php

class BookBorrowController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function allBookBorrow() {
        $data = [];
        $getData = "SELECT *, book_borrows.id AS id, books.name AS book_name, users.name AS user_name, book_borrows.status AS status FROM book_borrows LEFT JOIN books ON books.id = book_borrows.book_id LEFT JOIN users ON users.id = book_borrows.user_id";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function deliveryRequest($id) {
        $updateData = "UPDATE book_borrows SET status = 1 WHERE id = '$id'";
        $result = $this->conn->query($updateData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }

    public function deleteRequest($id) {
        $deleteData = "DELETE FROM book_borrows WHERE id = '$id'";
        $result = $this->conn->query($deleteData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }
}