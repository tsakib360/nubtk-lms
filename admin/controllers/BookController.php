<?php

class BookController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function allBooks() {
        $data = [];
        $getData = "SELECT *, books.id AS id, books.name AS name, categories.name AS category_name, departments.short_name AS department_short_name FROM books LEFT JOIN categories ON categories.id = books.category_id LEFT JOIN departments ON departments.id = books.department_id";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function fetchBook($id) {
        $getData = "SELECT *, books.id AS id, categories.name AS category_name, departments.short_name AS department_short_name FROM books LEFT JOIN categories ON categories.id = books.category_id LEFT JOIN departments ON departments.id = books.department_id WHERE books.id = '$id' LIMIT 1";
        $result = $this->conn->query($getData);
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        }else {
            redirect("Something went wrong!", "manage-book.php");
        }
    }

    public function addBook($name, $author, $category_id, $department_id, $edition, $accession_number, $thumb, $file) {
        $allow = array('jpg', 'jpeg', 'png');
        $exntension = explode('.', $thumb['name']);
        $fileActExt = strtolower(end($exntension));
        $fileNew = time() . rand() . "." . $fileActExt;  // rand function create the rand number
        $filePath = 'uploads/'.$fileNew;
        if (in_array($fileActExt, $allow)) {
            if ($thumb['size'] > 0 && $thumb['error'] == 0) {
                if (move_uploaded_file($thumb['tmp_name'], $filePath)) {
                    $allow_file = array('pdf');
                    $exntension_f = explode('.', $file['name']);
                    $fileActExt_f = strtolower(end($exntension_f));
                    $fileNew_f = time() . rand() .  "." . $fileActExt_f;  // rand function create the rand number
                    $filePath_f = 'uploads/'.$fileNew_f;
                    if (in_array($fileActExt_f, $allow_file)) {
                        if ($file['size'] > 0 && $file['error'] == 0) {
                            if (move_uploaded_file($file['tmp_name'], $filePath_f)) {
                                $addData = "INSERT INTO books (name, author, category_id, department_id, edition, accession_number, thumb, file) VALUES ('$name', '$author', '$category_id', '$department_id', '$edition', '$accession_number', '$fileNew', '$fileNew_f')";
                                $result = $this->conn->query($addData);
                                if($result) {
                                    return true;
                                }else{
                                    return false;
                                }
                            }
                        }
                    }
                }
            }
        }


    }

    public function updateBook($id, $name, $author, $category_id, $department_id, $edition, $accession_number, $thumb, $file) {
        $getBookData = "SELECT * FROM books WHERE id = '$id' LIMIT 1";
        $result_book = $this->conn->query($getBookData);
        if($result_book->num_rows > 0) {
            $book = $result_book->fetch_assoc();
            if(!is_null($thumb)) {
                $allow = array('jpg', 'jpeg', 'png');
                $exntension = explode('.', $thumb['name']);
                $fileActExt = strtolower(end($exntension));
                $fileNew = time(). rand() . "." . $fileActExt;  // rand function create the rand number
                $filePath = 'uploads/'.$fileNew;
                if (in_array($fileActExt, $allow)) {
                    if ($thumb['size'] > 0 && $thumb['error'] == 0) {
                        if (move_uploaded_file($thumb['tmp_name'], $filePath)) {
                            $t_file = $fileNew;
                        }
                    }
                }
            }else {
                $t_file = $book['thumb'];
            }
            if(!is_null($file)) {
                $allow_f = array('pdf');
                $exntension_f = explode('.', $file['name']);
                $fileActExt_f = strtolower(end($exntension_f));
                $fileNew_f = time(). rand() . "." . $fileActExt_f;  // rand function create the rand number
                $filePath_f = 'uploads/'.$fileNew_f;
                if (in_array($fileActExt_f, $allow_f)) {
                    if ($file['size'] > 0 && $file['error'] == 0) {
                        if (move_uploaded_file($file['tmp_name'], $filePath_f)) {
                            $f_file = $fileNew_f;
                        }
                    }
                }
            }else {
                $f_file = $book['file'];
            }

            $updateData = "UPDATE books SET name = '$name', author = '$author', category_id = '$category_id', department_id = '$department_id', edition = '$edition', accession_number = '$accession_number', thumb = '$t_file', file = '$f_file' WHERE id = '$id'";
            $result = $this->conn->query($updateData);
            if($result) {
                return true;
            }else{
                return false;
            }
        }else {
            redirect("No book found", "manage-book.php");
        }
    }

    public function deleteBook($id) {
        $getData = "SELECT * FROM books WHERE id = '$id' LIMIT 1";
        $result_book = $this->conn->query($getData);
        if($result_book->num_rows > 0) {
            $book = $result_book->fetch_assoc();
            $deleteData = "DELETE FROM books WHERE id = '$id'";
            $result = $this->conn->query($deleteData);
            if($result) {
                unlink('uploads/'.$book['thumb']);
                unlink('uploads/'.$book['file']);
                return true;
            }else{
                return false;
            }

        }else {
            redirect("No data found!", "manage-book.php");
        }
    }
}