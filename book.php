<?php
include('controllers/AuthenticationController.php');
include('controllers/HomeController.php');
include('controllers/BookController.php');
include('includes/header.php');
$id = $_GET['id'];
$c = new HomeController();
$data = $c->singleBook($id);
$b = new BookController();
$user = $authenticated->authDetail();
if(isset($_POST['add_cart'])) {
    $from_date = validateInput($db->conn, $_POST['from_date']);
    $to_date = validateInput($db->conn, $_POST['to_date']);
    $b->bookBorrow($_POST['book_id'], $from_date, $to_date, $_POST['user_id']);
}
?>
<!-- per book section  -->
<section class="my-5 py-5 container">
  <div class="row g-5">
    <div class="col-12 col-md-5">
      <img class="img-fluid w-100"  src="<?php base_url('admin/uploads/'.$data['thumb']); ?>"/>
    </div>
    <div class="col-12 col-md-7">
        <?php include('message.php') ?>
      <h1><?php echo $data['name'] ?></h1>
      <h6 class='mb-3'><span class='fw-bold'>Accession Number:</span> <?php echo $data['accession_number'] ?></h6>
      <h6 class='mb-3'><span class='fw-bold'>Author:</span> <?php echo $data['author'] ?></h6>
      <h6 class='mb-3'><span class='fw-bold'>Book Catagory : </span><?php echo $data['category_name'] ?></h6>
      <h6 class='mb-3'><span class='fw-bold'>Depertment : </span> <?php echo $data['short_name'] ?></h6>
      <h6 class='mb-3'><span class='fw-bold'>Edition :</span> <?php echo $data['edition'] ?></h6>
      <hr />
  <!-- <p>Lorem ipsum dolor sit amet consectetu adipisicing elit. Optio, at amet voluptates officiis veritatis similique numquam eos earum vero expedita? Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, quas?</p> -->
  <h6 class='mb-3'><span class='fw-bold'>Choose Your Date</h6>
        <form method="POST">
           <!-- date picker -->
           <input type="date" name="from_date" required /> - <input type="date" name="to_date" required />
            <input type="hidden" name="book_id" value="<?php echo $data['id'] ?>">
            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
            <br>
            <button class="btn mt-3 mb-3" type="submit" name="add_cart">Submit</button>
        </form>
     <p>Share: <i class="fab fa-facebook mx-3 detail"></i>
          <i class="fab fa-twitter me-3 detail"></i>
          <i class="fab fa-youtube me-3 detail"></i>
          <i class="fab fa-instagram detail"></i></p>

    </div>
  </div>

</section>
<?php include('includes/footer.php') ?>