<?php

class BookController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function bookBorrow($book_id, $from_date, $to_date, $user_id) {
        $count_borrow_books = $this->borrowCount($user_id);
        if($count_borrow_books > 3) {
            redirect("You can not take book greater than 3!", 'book.php?id='.$book_id, "error");
        }
        $is_borrow_exist = $this->isBorrowExists($book_id, $user_id);
        if($is_borrow_exist) {
            redirect("Book is already borrowed!", 'book.php?id='.$book_id, "error");
        }
        $from_str_date = strtotime(date('Y-m-d', strtotime($from_date) ) );
        $to_str_date = strtotime(date('Y-m-d', strtotime($to_date) ) );
        $curr_str_date = strtotime(date('Y-m-d'));
        if($from_str_date < $curr_str_date) {
            redirect("You can not borrow a book with past date. You have to borrow it by current date or future date", 'book.php?id='.$book_id, "error");
        }
        if($from_str_date > $to_str_date) {
            redirect("From date is greater than To date!", 'book.php?id='.$book_id, "error");
        }

        $register_query = "INSERT INTO book_borrows (book_id, from_date, to_date, user_id) VALUES ('$book_id', '$from_date', '$to_date', '$user_id')";
        $result = $this->conn->query($register_query);
        redirect("A pending request is go to admin for borrow this book.", 'book.php?id='.$book_id, "success");

    }

    public function isBorrowExists($book_id, $user_id) {
        $checkData = "SELECT book_id FROM book_borrows WHERE book_id = '$book_id' AND to_date >= DATE(NOW()) AND user_id = '$user_id' LIMIT 1";
        $result = $this->conn->query($checkData);
        if($result->num_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function borrowCount($user_id) {
        $checkData = "SELECT COUNT(*) as total FROM book_borrows WHERE to_date >= DATE(NOW()) AND user_id = '$user_id'";
        $result = $this->conn->query($checkData);
        $data = mysqli_fetch_assoc($result);
        return  $data['total'];
    }

    public function borrowList($user_id) {
        $data = [];
        $getData = "SELECT *, book_borrows.id AS id, books.name AS name FROM book_borrows LEFT JOIN books ON books.id = book_borrows.book_id WHERE user_id = '$user_id'";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function deleteBook($id) {
        $deleteData = "DELETE FROM book_borrows WHERE id = '$id'";
        $result = $this->conn->query($deleteData);
        if($result) {
            redirect("Successfully Deleted", "cart.php", "success");
        }else{
            redirect("Something went wrong!", "cart.php", "error");
        }
    }

    public function searchBook($keyword) {
        $data = [];
        $getData = "SELECT * FROM books WHERE name LIKE '%$keyword%'";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}