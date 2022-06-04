<?php
include('controllers/AuthenticationController.php');
include('controllers/CategoryController.php');
include('includes/header.php');
include('includes/menu.php');
$id = $_GET['id'];
$c = new CategoryController();
$data = $c->fetchCategory($id);
if(isset($_POST['update_btn'])) {
    $name = validateInput($db->conn, $_POST['name']);
    $update = $c->updateCategory($id, $name);
    if($update) {
        redirect("Update successful", "manage-category.php", "success");
    }else {
        redirect("Update failed", "manage-category.php", "error");
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
                    <input type="hidden" name="id" value="<?php echo $id;  ?>">
                    <button type="submit" class="btn btn-primary mb-5" name="update_btn"> Update </button>
                </fieldset>
            </form>
        </div>

    </div>
    <!-- /content area -->
    <?php include('includes/scripts.php') ;  ?>
</div>
