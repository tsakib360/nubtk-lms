<?php
include('config/app.php');
include('admin/controllers/DepartmentController.php');
$auth->isLoggedIn();
$d = new DepartmentController();
$departments = $d->allDepartments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- css style sheet  -->
       <link rel="stylesheet" href="./assets/css/login.css">
            <!-- google font  -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
            
       <!-- bootstrap css -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
      
        <!-- register section  -->
        <section>
    
        <div class='register py-5 '>
            <div class="shadow-lg w-75 mx-auto py-2 bg-white">
               <div class="text-center mt-5"> <img class="img-fluid "  width="100px" src="./assets/images/home/nub.jpg" alt=""></div>
              <h1 class="mb-5 mt-3 font text-center"> Register</h1>
                <?php include('message.php') ?>
                <form action="" method="post" enctype="multipart/form-data" class="w-75 mx-auto">
                  <fieldset class="my-3">
                      <div class="form-group">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control  mx-auto d-block mb-5 border-bottom border-0 rounded-0" placeholder="Enter name" name="name" required>
                      </div>
                      <div class="form-group">
                          <label for="father name">Father's Name:</label>
                          <input type="text" class="form-control  mx-auto d-block   mb-5 border-bottom border-0 rounded-0" placeholder="Enter father's name" name="father_name" required>
                      </div>
                      <div class="form-group">
                          <label for="mother name">Mother's Name:</label>
                          <input type="text" class="form-control  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" placeholder="Enter mother's name" name="mother_name" required>
                      </div>
                      <div class="row">
                          <div class="col">
                              <label for="department" class="mr-sm-2">Department:</label>
                              <select name="department_id" class="form-control">
                                  <?php foreach ($departments as $department): ?>
                                      <option value="<?php echo $department['id'] ?>"><?php echo $department['name'] ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="col">
                              <label for="dob" class="mr-sm-2">DOB:</label>
                              <input type="date" class="form-control mr-sm-2  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" placeholder="Date of Birth" name="dob" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="mail">Mail:</label>
                          <input type="email" class="form-control  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" placeholder="eg- john@gmail.com" name="email" required>
                      </div>
                      <div class="row">
                          <div class="col-12 col-md-6">
                              <label for="status" class="mr-sm-2 ">Status:
                                  <select class="form-select form-control mb-2 mr-sm-2  mx-auto d-block   mb-5 border-bottom border-0 rounded-0" aria-label="Default select example" name="status" required>
                                      <option value="Student">Student</option>
                                      <option value="Core Faculty">Core Faculty</option>
                                      <option value="Visiting Faculty">Visiting Faculty</option>
                                      <option value="Adjunct Faculty">Adjunct Faculty</option>
                                      <option value="Trust Member">Trust Member</option>
                                      <option value="Officer">Officer</option>
                                      <option value="Teaching Assistant">Teaching Assistant</option>
                                      <option value="Research Assistant">Research Assistant</option>
                                      <option value="Apprentice">Apprentice</option>
                                  </select>
                              </label>
                          </div>
                          <div class="col-12 col-md-6">
                              <label for="contact" class="mr-sm-2">Contact no.:</label>
                              <input type="text" class="form-control  mr-sm-2  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" placeholder="Enter valid contact Number" name="contact" required>
                          </div>
                      </div>
                      <div>
                          <label for="formFile" class="form-label">Upload Passport Size Photo</label>
                          <input class="form-control  mx-auto d-block   mb-3 border-bottom border-0 rounded-0" type="file" id="formFile" name="image">
                          <br>
                          <br>
                          <div id="outputwrap">
                              <img id="output" src="" height="100" style="height: 100px; width: auto;">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" class="form-control  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" placeholder="Create a Password" name="password" required>
                      </div> 
                       <div class="form-group">
                          <label for="password">Confirm Password:</label>
                          <input type="password" class="form-control  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" placeholder="Re type Password" name="c_password" required>
                      </div>
                      
                      <div class="mb-5 text-center">
                          <button type="submit" class="btn text-white" style="background-color: purple" name="done">SUBMIT</button>
                      </div>
                  </fieldset>
                  <p class="mb-5 text-center">Already Registered ? <a href="login.php" class="text-decoration-none">Login</a></p>
            </div>
             </div>
    
        </section>


     
     <!-- bootstrap js  -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     <!-- font awesome -->
     <script src="https://kit.fontawesome.com/81f4bd2587.js" crossorigin="anonymous"></script>
</body>
</html>