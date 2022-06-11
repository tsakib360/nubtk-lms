<?php
$categories = $authenticated->categoryList();
$user = $authenticated->authDetail();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css style sheet  -->
    <link rel="stylesheet" href="<?php base_url('assets/css/index.css'); ?>">
    <link rel="stylesheet" href="<?php base_url('assets/css/perBook.css'); ?>">
    <link rel="stylesheet" href="<?php base_url('assets/css/allBooks.css'); ?>">
    <link rel="stylesheet" href="<?php base_url('assets/css/cart.css'); ?>">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>NUBTK</title>
</head>
<body>
<!-- header part with navbar  -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid mx-4">
            <a class="navbar-brand" href="<?= base_url('index.php') ?>"><span class='text-warning'>E-</span>NUBTK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('index.php') ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Books
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach($categories as $cat) : ?>
                            <li><a class="dropdown-item" href="<?php base_url('category-book.php?catid='.$cat['id']); ?>"><?php echo $cat['name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php base_url('cart.php'); ?>">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="contactUs.html">Contact Us</a>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href=""><i class="fas fa-bell fs-4"></i></a>
                    </li><li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php base_url('user.php'); ?>"><i class="fas fa-user-circle fs-4"></i><?php echo $user['name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <form action="" method="post">
                            <button type="submit" name="logout_btn" class="btn btn-warning" aria-current="page">Logout</button>
                        </form>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Home Part -->