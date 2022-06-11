<?php

include('controllers/AuthenticationController.php');
include('controllers/BookBorrowController.php');
$id = $_GET['id'];
$c = new BookBorrowController();
$delete = $c->deleteRequest($id);
if($delete) {
    redirect("Delete successful", "manage-request.php", "success");
}else {
    redirect("Delete failed", "manage-request.php", "error");
}