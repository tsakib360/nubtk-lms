<?php
include('controllers/AuthenticationController.php');
include('controllers/BookBorrowController.php');
include('includes/header.php');
include('includes/menu.php');
$c = new BookBorrowController();
$datas = $c->allBookBorrow();
if(isset($_POST['delivery-btn'])) {
    $update = $c->deliveryRequest($_POST['id']);
    if($update) {
        redirect("Update successful", "manage-request.php", "success");
    }else {
        redirect("Update failed", "manage-request.php", "error");
    }
}
?>



<body>



<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Manage Requests</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>


        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?= base_url('index.php') ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Manage Requests</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <!-- /page header -->
    <div class="m-3">
        <?php include('message.php') ?>
    </div>

    <!-- Content area -->
    <div class="content">

        <!-- Dashboard content -->
        <div class="row " >
            <div class="card w-100">


                <table class="table datatable-basic" style="width: 100%; ">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Book Name</th>
                        <th>User Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datas as $i => $data) : ?>
                        <tr>
                            <th scope="row"><?php echo $i+1 ?></th>
                            <td><?php echo $data['book_name'] ?></td>
                            <td><?php echo $data['user_name'] ?></td>
                            <td><?php echo $data['from_date'] ?></td>
                            <td><?php echo $data['to_date'] ?></td>
                            <td><?php echo $data['status'] == 1 ? 'Delivered' : 'Pending' ?></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <?php if($data['status'] == 0) : ?>
                                                <form method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                                    <button type="submit" class="btn btn-success mb-1 ml-4" name="delivery-btn"><i class="icon-pencil5 mr-2"></i>Delivery</button>
                                                </form>
                                            <?php endif; ?>
                                            <a href="<?php base_url('delete-request.php?id='.$data['id']); ?>"><button type='button' class='btn btn-danger ml-4'><i class='icon-cancel-circle2 mr-2'></i>Delete</button></a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>

                    <tbody>





                    </tbody>
                </table>
            </div>
            <!-- /basic datatable -->

        </div>



    </div>
    <!-- /content area -->

    <?php include('includes/scripts.php') ;  ?>
</body>
</html>
