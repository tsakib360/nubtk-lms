<?php

include('config/app.php');
include('codes/authentication.php');

$checkedLoggedOut = $auth->logout();
if($checkedLoggedOut) {
    redirect("Logout successfully done", "login.php", 'success');
}else {
    echo "NO ACTION";
}