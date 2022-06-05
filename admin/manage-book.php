<?php
include('controllers/AuthenticationController.php');
include('controllers/BookController.php');
include('includes/header.php');
include('includes/menu.php');
$c = new BookController();
$datas = $c->allBooks();
?>



<body>



<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Manage Book</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>


        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?= base_url('index.php') ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Manage Book</span>
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


        <a href="<?= base_url('add-book.php') ?>">
            <button type="button" class="btn btn-primary mb-5"><i class="icon-plus3 mr-2"></i> Add Book</button>

        </a>




        <!-- Dashboard content -->
        <div class="row " >
            <div class="card w-100">


                <table class="table datatable-basic" style="width: 100%; ">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Accession Number</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Department</th>
                        <th>Edition</th>
                        <th>Thumb</th>
                        <th>File</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datas as $i => $data) : ?>
                        <tr>
                            <th scope="row"><?php echo $i+1 ?></th>
                            <td><?php echo $data['accession_number'] ?></td>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['author'] ?></td>
                            <td><?php echo $data['category_name'] ?></td>
                            <td><?php echo $data['department_short_name'] ?></td>
                            <td><?php echo $data['edition'] ?></td>
                            <td><img src="<?php base_url('uploads/'.$data['thumb']); ?>" alt="<?php echo $data['name'] ?>" width="50"></td>
                            <td><a href="<?php base_url('uploads/'.$data['file']); ?>" download><?php echo $data['file'] ?></a></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="<?php base_url('update-book.php?id='.$data['id']); ?>"><button type="button" class="btn btn-success mb-1 ml-4"><i class="icon-pencil5 mr-2"></i>Update</button></a>
                                            <a href="<?php base_url('delete-book.php?id='.$data['id']); ?>"><button type='button' class='btn btn-danger ml-4'><i class='icon-cancel-circle2 mr-2'></i>Delete</button></a>
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
