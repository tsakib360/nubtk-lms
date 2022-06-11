<?php
include('controllers/AuthenticationController.php');
include('controllers/UserController.php');
include('includes/header.php');
include('includes/menu.php');
$id = $_GET['id'];
$c = new UserController();
$data = $c->fetchUser($id);
if(isset($_POST['update_btn'])) {
    $is_active = validateInput($db->conn, $_POST['is_active']);
    $update = $c->updateUserActivity($id, $is_active);
    if($update) {
        redirect("Update successful", "manage-user.php", "success");
    }else {
        redirect("Update failed", "manage-user.php", "error");
    }
}
?>

<div class="content-wrapper">



    <!-- Content area -->
    <div class="content">

        <!-- Form inputs -->
        <div class="card-body">
            <h2 class="mb-4">Update User</h2>
            <?php include('message.php') ?>
            <form action="" method="POST">
                <fieldset class="mb-3">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Active</label>
                        <div class="col-lg-10">
                            <select name="is_active" class="form-control">
                                <option value="1" <?php echo $data['is_active'] == 1 ? 'selected' : '' ?>>Yes</option>
                                <option value="0" <?php echo $data['is_active'] == 0 ? 'selected' : '' ?>>No</option>
                            </select>
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
