<?php

class UserController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function updateUser($id, $name, $email, $father_name, $mother_name, $dob, $password)
    {
        $updateAdminData = "
             UPDATE users SET 
                  name = '$name', 
                  email = '$email', 
                  father_name = '$father_name',
                  mother_name = '$mother_name',
                  password = '$password',
                  dob = '$dob'
              WHERE id = '$id'";
        $result = $this->conn->query($updateAdminData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }
}