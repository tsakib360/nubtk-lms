<?php
include('controllers/AuthenticationController.php');
include('controllers/AdminController.php');
include('includes/header.php');
include('includes/menu.php');
$admin = new AdminController();
if(isset($_POST['add_admin_btn'])) {
    $name = validateInput($db->conn, $_POST['name']);
    $username = validateInput($db->conn, $_POST['username']);
    $email = validateInput($db->conn, $_POST['email']);
    $job = validateInput($db->conn, $_POST['job']);
    $pass = sha1($_POST['password']);
    $password = validateInput($db->conn, $pass);
    $update = $admin->addAdmin($name, $password, $username, $email, $job);
    if($update) {
        redirect("Add successful", "manage-admin.php", "success");
    }else {
        redirect("Add failed", "manage-admin.php", "error");
    }
}
?>

<div class="content-wrapper">



    <!-- Content area -->
    <div class="content">




        <!-- Form inputs -->
        <div class="card-body" >
            <h2 style="text-shadow: 2px 2px 2px purple">Add Admin</h2>
            <form action="" method="POST">
                <fieldset class="mb-3">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Full Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Enter your name..." required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">User Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="username" placeholder="Enter your username..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Job Title</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="job" placeholder="Enter your job title..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password" placeholder="Enter your password..." required>
                        </div>
                    </div>
                    <button type="submit" class="btn mb-5 text-white" style="background-color: purple" name="add_admin_btn"> Add </button>
                </fieldset>
            </form>
        </div>

    </div>
    <!-- /content area -->
    <?php include('includes/scripts.php');?>
</div>
