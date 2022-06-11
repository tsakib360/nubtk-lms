<?php

class UserController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function allUsers() {
        $data = [];
        $getData = "SELECT * FROM users";
        $result = $this->conn->query($getData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function fetchUser($id) {
        $getData = "SELECT * FROM users WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($getData);
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        }else {
            redirect("Something went wrong!", "manage-user.php");
        }
    }

    public function updateUserActivity($id, $is_active)
    {
        $updateData = "UPDATE users SET is_active = '$is_active' WHERE id = '$id'";
        $result = $this->conn->query($updateData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }
}