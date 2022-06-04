<?php

include('controllers/AuthenticationController.php');
include('controllers/CategoryController.php');
$id = $_GET['id'];
$c = new CategoryController();
$delete = $c->deleteCategory($id);
if($delete) {
    redirect("Delete successful", "manage-category.php", "success");
}else {
    redirect("Delete failed", "manage-category.php", "error");
}