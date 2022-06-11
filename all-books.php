<?php
include('controllers/AuthenticationController.php');
include('controllers/HomeController.php');
include('includes/header.php');
$c = new HomeController();
$datas = $c->allBooks();
?>

<!-- all book section  -->
<section class="container my-5 pt-5">
    <h1 class='heading text-center '>
        All  <span class='span'>Books</span> 
      </h1> 
      <p class='text-center mb-5'>There are many variations of passages of Lorem Ipsum available, but the majority have <br /> suffered lebmid alteration in some ledmid form</p>
      <form class="d-flex my-5" method="GET" action="<?php base_url('search-book.php'); ?>">
        <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
        <?php foreach ($datas as $data): ?>
        <div class="col">
          <div class="card p-3 h-100">
            <a href="<?php base_url('book.php?id='.$data['id']); ?>">
              <img height="300px" src="<?php base_url('admin/uploads/'.$data['thumb']); ?>" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['name'] ?></h5>
               
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      
</section>

<?php include('includes/footer.php') ?>