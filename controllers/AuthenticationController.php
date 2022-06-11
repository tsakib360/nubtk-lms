<?php

include('config/app.php');

class AuthenticationController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
        $this->checkIsLoggedIn();
    }

    private function checkIsLoggedIn() {
        if(!isset($_SESSION['authenticated'])) {
            redirect("Login to access", "login.php");
            return false;
        }else {
            return true;
        }
    }

    public function authDetail() {
        $checkAuth = $this->checkIsLoggedIn();
        if($checkAuth) {
            $user_id = $_SESSION['auth_user']['id'];
            $getUserData = "SELECT *, users.id AS id, users.name AS name, departments.name AS department_name FROM users LEFT JOIN departments ON departments.id = users.department_id WHERE users.id = '$user_id' LIMIT 1";
            $result = $this->conn->query($getUserData);
            if($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                return $data;
            }else {
                echo $this->conn->error;
//                redirect("Something went wrong!", "login.php");
            }
        }else {
            return false;
        }
    }

    public function categoryList() {
        $data = [];
        $getData = "SELECT * FROM categories";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function departmentList() {
        $data = [];
        $getData = "SELECT * FROM departments";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}

$authenticated = new AuthenticationController();