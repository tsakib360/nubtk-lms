<?php
include('controllers/AuthenticationController.php');
include('controllers/BookController.php');
include('includes/header.php');
$c = new BookController();
$user = $authenticated->authDetail();
$books = $c->borrowList($user['id']);
if(isset($_POST['rmv_btn'])) {
    $c->deleteBook($_POST['book_id']);
}
?>
    <!-- cart section  -->
    <section>
        <div class="my-5 " >
            <h1 class="text-white fw-bold cart p-5">Your Books</h1>
          
           

            <div class="row my-5 mx-4">
               <div class="col-12 col-md-12 col-lg-12">
                 <div class=" table-responsive border rounded-3 p-4  mb-4">
                     <?php include('message.php'); ?>
                      <table class="table  table-borderless">
                        <thead>
                          <tr class="mb-2">
                            <th scope="col" class="tableheading">Book name</th>
                            <th scope="col" class="tableheading">Starting Date</th>
                            <th scope="col" class="tableheading">Ending Date</th>
                            <th scope="col" class="tableheading">Status </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php if(count((array)$books) != 0): ?>
                            <?php foreach ($books as $book): ?>
                              <tr class="mb-2">
                                <td scope="row" class="d-flex flex-wrap col-md-12">
                                  <img class="mb-2 " width="70px" height="110px" src="<?php base_url('admin/uploads/'.$book['thumb']); ?>" alt="">
                                  <div class="ms-md-3">
                                    <h5><?= $book['name'] ?></h5>
                                  <p>by: <?= $book['author'] ?></p>
                                  </div>
                                </td>

                                <td class="col-md-3 fw-bold"> <?= $book['from_date'] ?></td>
                                <td  class="col-md-3 fw-bold"><?= $book['to_date'] ?></td>
                              <?php if($book['status'] == 0): ?>
                                  <td class="col-md-1"> <button type="button" class="btn btn-outline-danger mb-2">Pending</Button></td>
                                  <form method="POST">
                                      <input type="hidden" value="<?php echo $book['id'] ?>" name="book_id">
                                      <td class="col-md-1"> <button type="submit" name="rmv_btn" class="btn btn-outline-danger mb-2">Remove</Button></td>
                                  </form>

                              <?php elseif($book['status'] == 1): ?>
                                  <td class="col-md-1"> <button type="button" class="btn btn-outline-success mb-2">Delivered</Button></td>
                              <?php endif; ?>
                              </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center"><h1>No Data Found!</h1></td>
                            </tr>
                        <?php endif; ?>
                         
                        </tbody>
                      </table>
                    </div>
                    
                    
               </div>
              
            </div>
            </div>
        </div>
    </section>
<?php include('includes/footer.php') ?>