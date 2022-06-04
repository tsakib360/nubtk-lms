<?php
include('controllers/AuthenticationController.php');
include('controllers/DepartmentController.php');
include('includes/header.php');
include('includes/menu.php');
$c = new DepartmentController();
$datas = $c->allDepartments();
?>



<body>



<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Manage Department</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>


        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?= base_url('index.php') ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Manage Department</span>
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


        <a href="<?= base_url('add-department.php') ?>">
            <button type="button" class="btn btn-primary mb-5"><i class="icon-plus3 mr-2"></i> Add Department</button>

        </a>




        <!-- Dashboard content -->
        <div class="row " >
            <div class="card w-100">


                <table class="table datatable-basic" style="width: 100%; ">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>Short Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datas as $i => $data) : ?>
                        <tr>
                            <th scope="row"><?php echo $i+1 ?></th>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['short_name'] ?></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="<?php base_url('update-department.php?id='.$data['id']); ?>"><button type="button" class="btn btn-success mb-1 ml-4"><i class="icon-pencil5 mr-2"></i>Update</button></a>
                                            <a href="<?php base_url('delete-department.php?id='.$data['id']); ?>"><button type='button' class='btn btn-danger ml-4'><i class='icon-cancel-circle2 mr-2'></i>Delete</button></a>
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
