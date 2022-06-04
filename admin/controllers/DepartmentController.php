<?php

class DepartmentController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function allDepartments() {
        $data = [];
        $getData = "SELECT * FROM departments";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function fetchDepartment($id) {
        $getData = "SELECT * FROM departments WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($getData);
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        }else {
            redirect("Something went wrong!", "manage-department.php");
        }
    }

    public function updateDepartment($id, $name, $short_name)
    {
        $updateData = "UPDATE departments SET name = '$name', short_name = '$short_name' WHERE id = '$id'";
        $result = $this->conn->query($updateData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }

    public function addDepartment($name, $short_name) {
        $addData = "INSERT INTO departments (name, short_name) VALUES ('$name', '$short_name')";
        $result = $this->conn->query($addData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }

    public function deleteDepartment($id) {
        $deleteData = "DELETE FROM departments WHERE id = '$id'";
        $result = $this->conn->query($deleteData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }
}