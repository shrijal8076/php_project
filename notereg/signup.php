<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--mdb bootstrap-->
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
    <title>Sign up form</title>
</head>
<body class="bg-warning">
    <?php
    $con = mysqli_connect("localhost","root","","signup");
    if($con){?>
    <script>
        alert("connection successfull");
    </script>
    <?php      

    }
    if(isset($_POST['submit'])){
        $username= mysqli_real_escape_string($con,$_POST['username']);
        $email= mysqli_real_escape_string($con,$_POST['email']);
        $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);

        $pass = password_hash($password,PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword,PASSWORD_BCRYPT);

        $emailquery = "select * from registration where email = '$email'";
        $result = mysqli_query($con,$emailquery);
        $emailcount = mysqli_num_rows($result);
        if($emailcount>0){
            ?><script>
                alert("please enter new mail");
            </script>
            <?php
        }else{
            if($password === $cpassword){
                $insertquery = "insert into registration(username, email, mobile, password, cpassword) values('$username','$email','$mobile','$pass','$cpass')";
                $iquery = mysqli_query($con,$insertquery);
                if($iquery){
                    ?>
                    <script>
                    alert("thank you you have successfully submmited your data");
                </script> 
                <?php
                }
                
                
                
            }else{
                ?>
                
                <script>
                    alert("enter correct password");
                </script><?php
            }
        }
    }
    ?>
    <!-- signup form -->
    <div class="container bg-light my-5 p-5 w-50">
      <h2 class="text-warning text-center my-3 ">Create Your Account</h2>
        <form action="/php_practice/notereg/signup.php" method="POST">
            <!-- 2 column grid layout with text inputs for the user name -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control"
                  name="username" required />
                  <label class="form-label" for="form3Example1">User name</label>
                </div>
              </div>
            </div>
          
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control" name="email" required />
              <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- mobile input -->
            <div class="form-outline mb-4">
                <input type="number" id="form3Example3" class="form-control" name="mobile" required/>
                <label class="form-label" for="form3Example3">Mobile</label>
              </div>
          
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" name="password" required />
              <label class="form-label" for="form3Example4">Password</label>
            </div>
             <!-- rPassword input -->
             <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="cpassword" required />
                <label class="form-label" for="form3Example4">Repeat Password</label>
              </div>
          
            
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-warning btn-block mb-4" name="submit">Sign up</button>
          
            <!-- Register buttons -->
            <div class="text-center">
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
          <p class="text-center text-warning my-2 p-2 bg-light">Have You An Account <a href="login.php" target="_blank" rel="noopener noreferrer" class="fw-bold">Login</a></p>
    </div>
    <!-- sign up form end-->
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
></script>
</body>
</html>