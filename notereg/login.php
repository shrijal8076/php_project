<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
  rel="stylesheet"
/>
    <title>Login</title>
</head>
<body class="bg-warning">
    <?php
    $con = mysqli_connect("localhost","root","","signup");
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email_search ="select * from registration where email = '$email'";
        $query = mysqli_query($con,$email_search);
        $email_count = mysqli_num_rows($query);
        if($email_count){
          $email_pass = mysqli_fetch_assoc($query);
          $db_pass = $email_pass['password'];
          $_SESSION["username"]= $email_pass['username'];
          $pass_decode = password_verify($password,$db_pass);
          if($pass_decode){
            ?>
            <script>alert("login successfully");
            location.replace("index.php");
            </script>
            <?php
          }else{
            ?>
            <script>
              alert("enter correct password");
            </script><?php
          }
        }else{
          ?>
          <script>alert("Invalid email");</script><?php
        }


        

    }
    ?>
    <div class="container w-50 bg-light text-center my-5 p-5">
        <h2 class="text-warning text-center">Log In Here</h2>
        <form action="/php_practice/notereg/login.php" method ="POST">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" name="email" required  />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" name="password" required  />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
        <label class="form-check-label" for="form2Example34"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-warning btn-block mb-4" name="submit">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p class="text-warning" >Not a member? <a href="signup.php" >Register</a></p>
    <p>or sign up with:</p>
    <button type="button" class="btn btn-warning btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-warning btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-warning btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-warning btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
    </div>
    
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
></script>
</body>
</html>