<?php


include_once('controllers/LoginController.php');

$auth = new LoginController();

if(isset($_POST['admin_login_btn'])) {
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);

    $checkLogin = $auth->adminLogin($email, $password);
    if($checkLogin) {
        redirect("Login Successful", "index.php", 'success');
    }else {
        redirect("Invalid email or password", "login.php", 'error');
    }
}