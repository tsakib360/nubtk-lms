<?php

class AdminController
{
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }
    public function allAdmins() {
        $data = [];
        $getAdminData = "SELECT * FROM admins";
        $result = $this->conn->query($getAdminData);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function fetchAdmin($id) {
        $getUserData = "SELECT * FROM admins WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($getUserData);
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        }else {
            redirect("Something went wrong!", "manage-admin.php");
        }
    }

    public function updateAdmin($id, $name, $username, $email, $job)
    {
        $updateAdminData = "UPDATE admins SET name = '$name', username = '$username', email = '$email', job = '$job' WHERE id = '$id'";
        $result = $this->conn->query($updateAdminData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }

    public function addAdmin($name, $password, $username, $email, $job) {
        $addAdminData = "INSERT INTO admins (name, password, username, email, job) VALUES ('$name', '$password', '$username', '$email', '$job')";
        $result = $this->conn->query($addAdminData);
        if($result) {
            return true;
        }else{
            return false;
        }
    }

    public function deleteAdmin($id) {
        $deleteAdmin = "DELETE FROM admins WHERE id = '$id'";
        $result = $this->conn->query($deleteAdmin);
        if($result) {
            return true;
        }else{
            return false;
        }
    }


}