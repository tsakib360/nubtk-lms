<?php
if(isset($_SESSION['message']) && isset($_SESSION['msg_type'])) {
    if($_SESSION['msg_type'] == 'success') {
        echo "<div class='alert alert-success alert-dismissible fade show mx-auto d-block  w-75 mb-4' role='alert'>".$_SESSION['message']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
    elseif($_SESSION['msg_type'] == 'error') {
        echo "<div class='alert alert-danger alert-dismissible fade show mx-auto d-block  w-75 mb-4' role='alert'>".$_SESSION['message']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
    elseif($_SESSION['msg_type'] == 'warning') {
        echo "<div class='alert alert-warning alert-dismissible fade show mx-auto d-block  w-75 mb-4' role='alert'>".$_SESSION['message']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
    unset($_SESSION['message']);
    unset($_SESSION['msg_type']);
}