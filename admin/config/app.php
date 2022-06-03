<?php

session_start();
mysqli_report(MYSQLI_REPORT_OFF);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'lms_nubtk_new');
define('SITE_URL', 'http://localhost/nubtk-lms/admin/');

include_once("DatabaseConnection.php");
$db = new DatabaseConnection();

function base_url($slug) {
    echo SITE_URL.$slug;
}

function validateInput($dbcon, $input) {
    return mysqli_real_escape_string($dbcon, $input);
}

function redirect($message, $page, $type = null) {
    $redirectTo = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0);
}