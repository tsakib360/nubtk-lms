<?php

include('controllers/AuthenticationController.php');
include('controllers/BookController.php');
$id = $_GET['id'];
$c = new BookController();
$delete = $c->deleteBook($id);
if($delete) {
    redirect("Delete successful", "manage-book.php", "success");
}else {
    redirect("Delete failed", "manage-book.php", "error");
}