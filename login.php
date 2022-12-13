<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Find Reality - Find your Dream Home Here</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/79996d6ed3.js" crossorigin="anonymous"></script>

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold px-3 mr-1"><img src="img/logo.png"></span></h1>
                </a>
            </div>
        </div>
    </div>



<?php 
include('function/config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM userinfo WHERE username = '$myusername' and password = '$mypassword'";

      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         $_SESSION['userid'] = $row['ID'];
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>




<form action = "" method = "post">
<div class="" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold border-secondary">Sign in</h4>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control py-4" placeholder="" required="required" name = "username" />
            <label>Password</label>
            <input type="Password" class="form-control py-4" placeholder="" required="required" name = "password" />
            <?php 
            if(isset($error)){
                echo $error;
            } ?>
          </div>
        </div>
        <div>
          <div class="form-group text-center">
            <p> <a href="" class="nav-link">Forgot Password?</a></p>
            <p class="mb-md-0"><a href="" class="nav-link" data-toggle="modal" data-target="#modalRegisterForm"><span style="color:black;">Not a member? </span> Sign Up</a></p>
            
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center bg-secondary ">
        <button class="btn btn-default" style="color:white;" value = " Submit " type = "submit" >Login</button>
      </div>
    </div>
  </div>
</div>
</form>



























 <!-- Footer Start -->
    <?php include('footer.php')?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn back-to-top" style="color:white; border-color:white;"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>