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
        if(!isset($_SESSION['admin_authenticated'])) {
            redirect("Login to access", "login.php", "success");
            return false;
        }else {
            return true;
        }
    }
}
$authenticated = new AuthenticationController();