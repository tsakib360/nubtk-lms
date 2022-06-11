<?php
include('config/app.php');
$auth->isLoggedIn();
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
    <title>Login</title>
</head>
<body>
          
        <!-- Login section  -->
        <section>
        <div class='login py-4'>
            <div class="text-center shadow-lg w-50 mx-auto py-5 bg-white">
              <img class="img-fluid" width="100px" src="./assets/images/home/nub.jpg" alt="">
              <h1 class="mb-5 mt-3 font"> Login</h1>
                <?php include('message.php') ?>
              <form class='mx-auto' method="post">
             
              <input
              class="contact-input form-control mx-auto d-block  w-75 mb-4 border-bottom border-0 rounded-0"
                placeholder="Email" 
                name='email'
                type='email'/>
    
              <input 
              class="contact-input form-control mx-auto d-block w-75 mb-4 border-bottom border-0 rounded-0"
               placeholder="Password"
                type='password' 
                name='password'/>
               
         
                <button type="submit" name="login_btn" class="btn btn-outline-primary mb-5">Login</Button>
           
              
    
                <div class="d-flex justify-content-around flex-wrap mb-2">
                  <p class="mb-2">New User ? <a href="register.php" class="text-decoration-none">Please Register</a></p>
                <p ><a href="register.php" class="text-decoration-none">Forgotten Password?</a></p>
                </div>
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