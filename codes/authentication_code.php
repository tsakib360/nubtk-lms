<?php

include_once('controllers/RegisterController.php');
include_once('controllers/LoginController.php');

$auth = new LoginController();
if(isset($_POST['logout_btn'])) {
    $checkedLoggedOut = $auth->logout();
    if($checkedLoggedOut) {
        redirect("Logout successfully done", "login.php", "success");
    }
}
if(isset($_POST['login_btn'])) {
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);
    $hash_pass = sha1($password);

    $checkLogin = $auth->userLogin($email, $hash_pass);
    if($checkLogin) {
        redirect("Login Successful", "index.php", "success");
    }else {
        redirect("Invalid email or password", "login.php", "error");
    }
}

if(isset($_POST['done'])) {
    $name = validateInput($db->conn, $_POST['name']);
    $father_name = validateInput($db->conn, $_POST['father_name']);
    $mother_name = validateInput($db->conn, $_POST['mother_name']);
    $department = validateInput($db->conn, $_POST['department_id']);
    $dob = validateInput($db->conn, $_POST['dob']);
    $email = validateInput($db->conn, $_POST['email']);
    $status = validateInput($db->conn, $_POST['status']);
    $contact = validateInput($db->conn, $_POST['contact']);
    $password = validateInput($db->conn, $_POST['password']);
    $c_password = validateInput($db->conn, $_POST['c_password']);

    $register = new RegisterController();
    $result_password = $register->confirmPassword($password, $c_password);
    if($result_password) {
        $result_user = $register->isUserExists($email);
        if($result_user) {
            redirect("User already exsit in database!", 'register.php', "error");
        }else {
            $hash_pass = sha1($password);
            $register_query = $register->registration($name, $father_name, $mother_name, $department, $dob, $email, $status, $contact, $hash_pass, $_FILES['image']);
            if($register_query) {
                redirect('Successfully registered!', 'login.php', 'success');
            }else {
                redirect("Something went wrong!", 'register.php', 'error');
            }
        }
    }else {
        redirect("Password and confirm password not matched!", 'register.php', 'error');
    }
}