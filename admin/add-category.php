<?php
include('controllers/AuthenticationController.php');
include('controllers/CategoryController.php');
include('includes/header.php');
include('includes/menu.php');
$c = new CategoryController();
if(isset($_POST['add_btn'])) {
    $name = validateInput($db->conn, $_POST['name']);
    $add = $c->addCategory($name);
    if($add) {
        redirect("Add successful", "manage-category.php", "success");
    }else {
        redirect("Add failed", "manage-category.php", "error");
    }
}
?>

<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <!-- Form inputs -->
        <div class="card-body" >
            <h2 style="text-shadow: 2px 2px 2px purple">Add Category</h2>
            <form action="" method="POST">
                <fieldset class="mb-3">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Enter your name..." required>
                        </div>
                    </div>
                    <button type="submit" class="btn mb-5 text-white" style="background-color: purple" name="add_btn"> Add </button>
                </fieldset>
            </form>
        </div>

    </div>
    <!-- /content area -->
    <?php include('includes/scripts.php');?>
</div>
