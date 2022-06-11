<?php
include('controllers/AuthenticationController.php');
include('controllers/HomeController.php');
include('includes/header.php');
$c = new HomeController();
$books = $c->latestHomeBook();
?>

<section>

<!-- Banner -->
<!-- Slider -->
<div id="carouselExampleControls" class="carousel slide " data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  src="./assets/images/home/s2.jpg" class="d-block height w-100" alt="...">
      <!-- slider header   -->
      <!-- <div class='text'>
        <h1 class='heading'>
             Order <span class='span'>your</span> 
         </h1>
         <h1 class='heading'>
         favourite <span class='span'>Book</span>
         </h1>
         <h1 class='heading'> from <span class='span'>Here</span></h1>
         <button type="button" class="btn btn-outline-primary">SHOP NOW <i class="fas fa-arrow-right ms-2"></i></button>
        </div> -->`
    </div>
    <div class="carousel-item ">
      <img   src="./assets/images/home/s1.jpg" class="d-block w-100 height" alt="...">
    </div>
   
    <div class="carousel-item">
      <img src="./assets/images/home/s3.jpg" class="d-block w-100 height" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 


<!-- Categories -->
<div class="container my-5">
  <h1 class='heading text-center mt-5'>
    New  <span class='span'>Books</span> 
  </h1> 
  <p class='text-center mb-5'>There are many variations of passages of Lorem Ipsum available, but the majority have <br /> suffered lebmid alteration in some ledmid form</p>
  
  <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
   <?php foreach ($books as $book): ?>
      <div class="col">
          <div class="card p-3 h-100">
            <a href="<?php base_url('book.php?id='.$book['id']); ?>">
               <img height="300px" src="<?php base_url('admin/uploads/'.$book['thumb']); ?>" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $book['name'] ?></h5>
            </div>
          </div>
      </div>
   <?php endforeach; ?>
  </div>
</div>
<div class="text-center mb-5">
  <!-- <button type="button" herf="" class="">All Books </button> -->
  <a class="btn btn-outline-primary" href="all-books.php">All Books</a>
</div>

<!-- Contact  -->
<div  class="contact p-4">
  <div class="row ">
    <div class="col-sm-12 col-md-6" >
        <img class='img-fluid w-100' src="./assets/images/home/styleBook.png" alt="" />
    </div>
    <div class="text-center align-self-center col-sm-12 col-md-6 " >
         <h1 class='fw-bold mb-4'>STAY WITH US</h1>
         <p class='mb-5'>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</p>
         <div>
          <input type="email" class="form-control d-inline-block w-75 mb-3 email border-bottom border-dark border-0 rounded-0 "  placeholder="Email">
          <div class="form-group">
            
            <textarea class="form-control d-inline-block w-75 mb-3 email border-bottom border-dark border-0 rounded-0 " id="exampleFormControlTextarea1" rows="3"placeholder="your message"></textarea>
          </div>
          <button type="button" class="btn btn-outline-primary ">Contact Us</Button>
         </div>
    </div>
  </div>
</div>


    </section>

<?php include('includes/footer.php') ?>