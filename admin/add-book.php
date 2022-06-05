<?php
include('controllers/AuthenticationController.php');
include('controllers/BookController.php');
include('controllers/CategoryController.php');
include('controllers/DepartmentController.php');
include('includes/header.php');
include('includes/menu.php');
$c = new BookController();
$cat = new CategoryController();
$categories = $cat->allCategories();
$dep = new DepartmentController();
$departments = $dep->allDepartments();
if(isset($_POST['add_btn'])) {
    $name = validateInput($db->conn, $_POST['name']);
    $accession_number = validateInput($db->conn, $_POST['accession_number']);
    $author = validateInput($db->conn, $_POST['author']);
    $edition = validateInput($db->conn, $_POST['edition']);
    $category_id = $_POST['category_id'];
    $department_id = $_POST['department_id'];
    $thumb = $_FILES['thumb'];
    $file = $_FILES['file'];
    $add = $c->addBook($name, $author, $category_id, $department_id, $edition, $accession_number, $thumb, $file);
    if($add) {
        redirect("Add successful", "manage-book.php", "success");
    }else {
        redirect("Add failed", "manage-book.php", "error");
    }
}
?>

<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <!-- Form inputs -->
        <div class="card-body" >
            <h2 style="text-shadow: 2px 2px 2px purple">Add Book</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset class="mb-3">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Enter your name..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Accession Number</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="accession_number" placeholder="Enter accession number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Author</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author" placeholder="Enter author name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Category</label>
                        <div class="col-lg-10">
                            <select name="category_id" class="form-control">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Department</label>
                        <div class="col-lg-10">
                            <select name="department_id" class="form-control">
                                <?php foreach ($departments as $department) : ?>
                                    <option value="<?php echo $department['id'] ?>"><?php echo $department['name'].' ('.$department['short_name'].')' ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">Edition</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="edition" placeholder="Enter edition" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload PDF</label>
                        <input type="file" name="file" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Thumb</label>
                        <input type="file" name="thumb" required>
                    </div>
                    <button type="submit" class="btn mb-5 text-white" style="background-color: purple" name="add_btn"> Add </button>
                </fieldset>
            </form>
        </div>

    </div>
    <!-- /content area -->
    <?php include('includes/scripts.php');?>
</div>
