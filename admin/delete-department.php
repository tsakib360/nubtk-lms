<?php

include('controllers/AuthenticationController.php');
include('controllers/DepartmentController.php');
$id = $_GET['id'];
$c = new DepartmentController();
$delete = $c->deleteDepartment($id);
if($delete) {
    redirect("Delete successful", "manage-department.php", "success");
}else {
    redirect("Delete failed", "manage-department.php", "error");
}