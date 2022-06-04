<?php

include('controllers/AuthenticationController.php');
include('controllers/AdminController.php');
$id = $_GET['id'];
$admin = new AdminController();
$delete = $admin->deleteAdmin($id);
if($delete) {
    redirect("Delete successful", "manage-admin.php", "success");
}else {
    redirect("Delete failed", "manage-admin.php", "error");
}