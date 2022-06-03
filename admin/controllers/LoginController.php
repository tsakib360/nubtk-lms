<?php

 class LoginController
{
     public function __construct() {
         $db = new DatabaseConnection();
         $this->conn = $db->conn;
     }

     public function adminLogin($email, $password) {
        $password = sha1($password);
         $checkLogin = "SELECT * FROM admins where email = '$email' AND password = '$password' LIMIT 1";
         $result = $this->conn->query($checkLogin);
         if($result->num_rows > 0) {
             $data = $result->fetch_assoc();
             $this->adminAuthentication($data);
             return true;
         }else {
             return false;
         }
     }

     private function adminAuthentication($data) {
         $_SESSION['admin_authenticated'] = true;
         $_SESSION['auth_admin'] = [
             'id' => $data['id'],
             'email' => $data['email'],
             'username' => $data['username']
         ];
     }

     public function isLoggedIn() {
         if(isset($_SESSION['admin_authenticated']) === TRUE) {
             redirect("You are already Logged In", "index.php");
         }else {
             return false;
         }
     }

     public function logout() {
         if(isset($_SESSION['admin_authenticated']) === TRUE) {
             unset($_SESSION['admin_authenticated']);
             unset($_SESSION['auth_admin']);
             return true;
         }else {
             return false;
         }
     }
}