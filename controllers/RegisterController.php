<?php

class RegisterController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function registration($name, $father_name, $mother_name, $department, $dob, $email, $status, $contact, $password, $image) {
        $image = $this->uploadImage($image);
        $register_query = "INSERT INTO users (name, father_name, mother_name, department_id, dob, email, status, contact, password, image) VALUES ('$name', '$father_name', '$mother_name', '$department', '$dob', '$email', '$status', '$contact', '$password', '$image')";
        $result = $this->conn->query($register_query);
        return $result;
    }

    public function isUserExists($email) {
        $checkUser = "SELECT email from users where email = '$email' LIMIT 1";
        $result = $this->conn->query($checkUser);
        if($result->num_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function confirmPassword($password, $c_password) {
        if($password == $c_password) {
            return true;
        }else {
            return false;
        }
    }

    public function uploadImage($thumb) {
        $allow = array('jpg', 'jpeg', 'png');
        $exntension = explode('.', $thumb['name']);
        $fileActExt = strtolower(end($exntension));
        $fileNew = time(). rand() . "." . $fileActExt;  // rand function create the rand number
        $filePath = 'admin/uploads/'.$fileNew;
        if (in_array($fileActExt, $allow)) {
            if ($thumb['size'] > 0 && $thumb['error'] == 0) {
                if (move_uploaded_file($thumb['tmp_name'], $filePath)) {
                    return $fileNew;
                }
            }
        }
    }
}