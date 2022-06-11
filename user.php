<?php
include('controllers/AuthenticationController.php');
include('controllers/UserController.php');
$data = $authenticated->authDetail();
$departments = $authenticated->departmentList();
$c = new UserController();
if(isset($_POST['update_btn'])) {
    $name = validateInput($db->conn, $_POST['name']);
    $father_name = validateInput($db->conn, $_POST['father_name']);
    $mother_name = validateInput($db->conn, $_POST['mother_name']);
    $email = validateInput($db->conn, $_POST['email']);
    $dob = validateInput($db->conn, $_POST['dob']);
    $password = validateInput($db->conn, $_POST['password']);
    $hash_pass = sha1($password);
    $update = $c->updateUser($_POST['id'], $name, $email,  $father_name, $mother_name, $dob, $hash_pass);
    if($update) {
        redirect("Update successful", "user.php", "success");
    }else {
        redirect("Update failed", "user.php", "error");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- css style sheet  -->
     <link rel="stylesheet" href="./assets/css/user.css">
     <!-- google font  -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
     
<!-- bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>User</title>
</head>
<body>
 <section>
  
        <div class='login py-5'>
            <div class=" shadow-lg w-50 mx-auto py-5 bg-white">
                <?php include('message.php') ?>
              <form class="w-75 mx-auto" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control  mx-auto d-block mb-5 border-bottom border-0 rounded-0" value="<?= $data['name'] ?>" name="name" required>
                </div> 
                <div class="form-group">
                    <label for="id ">Email</label>
                    <input type="text" class="form-control  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" value="<?= $data['email'] ?>" name="email" required>
                </div>
                <div class="form-group">
                    <label for="id ">Father's Name</label>
                    <input type="text" class="form-control  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" value="<?= $data['father_name'] ?>" name="father_name" required>
                </div>
                <div class="form-group">
                    <label for="id ">Mother's Name</label>
                    <input type="text" class="form-control  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" value="<?= $data['mother_name'] ?>" name="mother_name" required>
                </div>
                <div class="form-group">
                    <label for="id ">DOB</label>
                    <input type="date" class="form-control  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" value="<?= $data['dob'] ?>" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="id ">Password</label>
                    <input type="password" class="form-control  mx-auto d-block  mb-5 border-bottom border-0 rounded-0" name="password" autocomplete="off" required>
                </div>
                 <div class="form-group">
                    <label for="department" class="mr-sm-2">Department:</label>
                     <select name="department_id" class="form-control">
                         <?php foreach($departments as $department) : ?>
                             <option value="<?php echo $department['id'] ?>" <?php echo $department['id'] == $data['department_id'] ? 'selected' : '' ?>><?php echo $department['name'] ?></option>
                         <?php endforeach; ?>
                     </select>
                </div>
                  <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <button type="submit" class="btn btn-outline-primary mt-5 mb-5" name="update_btn">Update</Button>
      
              </form>
            </div>
            
             </div>
   
        </section>
     <!-- bootstrap js  -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     <!-- font awesome -->
     <script src="https://kit.fontawesome.com/81f4bd2587.js" crossorigin="anonymous"></script>
</body>
</html>