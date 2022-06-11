<?php

class LoginController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function userLogin($email, $password) {
        $checkLogin = "SELECT * FROM users where email = '$email' AND password = '$password' AND is_active = 1 LIMIT 1";
        $result = $this->conn->query($checkLogin);
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $this->userAuthentication($data);
            return true;
        }else {
            return false;
        }
    }

    private function userAuthentication($data) {
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_user'] = [
            'id' => $data['id'],
            'name' => $data['name'],
            'father_name' => $data['father_name'],
            'mother_name' => $data['mother_name'],
            'department' => $data['department'],
            'dob' => $data['dob'],
            'mail' => $data['mail'],
            'status' => $data['status'],
            'contact' => $data['contact'],
        ];
    }

    public function isLoggedIn() {
        if(isset($_SESSION['authenticated']) === TRUE) {
            redirect("You are already Logged In", "index.php");
        }else {
            return false;
        }
    }

    public function logout() {
        if(isset($_SESSION['authenticated']) === TRUE) {
            unset($_SESSION['authenticated']);
            unset($_SESSION['auth_user']);
            return true;
        }else {
            return false;
        }

    }
}