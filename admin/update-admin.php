<?php
include('controllers/AuthenticationController.php');
include('controllers/AdminController.php');
include('includes/header.php');
include('includes/menu.php');
$id = $_GET['id'];
$admin = new AdminController();
$data = $admin->fetchAdmin($id);
if(isset($_POST['update_admin_btn'])) {
    $name = validateInput($db->conn, $_POST['name']);
    $username = validateInput($db->conn, $_POST['username']);
    $email = validateInput($db->conn, $_POST['email']);
    $job = validateInput($db->conn, $_POST['job']);
    $update = $admin->updateAdmin($id, $name, $username, $email, $job);
    if($update) {
        redirect("Update successful", "manage-admin.php", "success");
    }else {
        redirect("Update failed", "manage-admin.php", "error");
    }
}
?>

<div class="content-wrapper">



    <!-- Content area -->
    <div class="content">




        <!-- Form inputs -->
        <div class="card-body">
            <h2 class="mb-4">Update Admin</h2>
            <?php include('message.php') ?>
            <form action="" method="POST">
                <fieldset class="mb-3">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Full Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Enter your name..." value="<?php echo $data['name'] ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">User Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="username" placeholder="Enter your username..." value="<?php echo $data['username'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email..." value="<?php echo $data['email'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Job Title</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="job" placeholder="Enter your job title..." value="<?php echo $data['job'] ?>" required>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id;  ?>">
                    <button type="submit" class="btn btn-primary mb-5" name="update_admin_btn"> Update </button>
                </fieldset>
            </form>
        </div>

    </div>
    <!-- /content area -->
    <?php include('includes/scripts.php') ;  ?>
</div>
