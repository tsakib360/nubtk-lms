<?php

class CategoryController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function allCategories() {
        $data = [];
        $getData = "SELECT * FROM categories";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function fetchCategory($id) {
        $getData = "SELECT * FROM categories WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($getData);
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        }else {
            redirect("Something went wrong!", "manage-category.php");
        }
    }

    public function updateCategory($id, $name)
    {
        $updateData = "UPDATE categories SET name = '$name' WHERE id = '$id'";
        $result = $this->conn->query($updateData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }

    public function addCategory($name) {
        $addData = "INSERT INTO categories (name) VALUES ('$name')";
        $result = $this->conn->query($addData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }

    public function deleteCategory($id) {
        $deleteData = "DELETE FROM categories WHERE id = '$id'";
        $result = $this->conn->query($deleteData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }
}