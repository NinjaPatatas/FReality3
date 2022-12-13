<?php include('function/config.php') ?>
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
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold px-3 mr-1"><img src="img/logo.png"></span></h1>
                </a>
            </div>
            
    </div>
    <!-- Top-->



<?php
if(isset($_SESSION['login_user'])){
$query="select * from userinfo where ID = '".$_SESSION['userid']."'";
$res=mysqli_query($con,$query);
$row = mysqli_fetch_array($res);
}
?>

<?php
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"]; 
    $password = $_POST["password1"]; 
    $npassword = $_POST["password2"];
    $cpassword = $_POST["cpassword"];
    $lname = $_POST["lname"];
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $mnum = $_POST["mnum"];

            
    
    $sql = "Select * from userinfo where username='$username'";
    
    $result = mysqli_query($con, $sql);
    
    $num = mysqli_num_rows($result); 
    $row = mysqli_fetch_array($result);
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
        if(($password == $row['password'])) {
            $sql = "UPDATE userinfo SET Email='" .$email. "',LastName='" .$lname. "',FirstName='" .$fname. "',MobileNumber='" .$mnum. "' where ID='" .$_SESSION['userid']. "'";
            $result = mysqli_query($con, $sql);
            if(!empty($npassword)){
                if($npassword==$cpassword){
                     $sql2 = "UPDATE userinfo SET password='" .$npassword. "' WHERE ID = '" .$_SESSION['userid']. "'";
                    $result = mysqli_query($con, $sql2);
                }else{
                    $showError = "Passwords do not match";
                }
            }
            if ($result) {
                $showAlert = true; 
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    // end if 
    
//end if   
}   
?>






<?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now updated, Re-login your account. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 

        </div> '; 
        header( "refresh:1;url=logout.php" );
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>


<form action="profile.php" method="POST">
<div class=""  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold border-secondary">Profile</h4>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <div class="mb-4">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John" id="fname" name="fname" value="<?php echo $row['FirstName'] ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe" id="lname" name="lname" value="<?php echo $row['LastName']; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" id="email" name="email" value="<?php echo $row['Email'] ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" id="mnum" name="mnum" value="<?php echo $row['MobileNumber']?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" placeholder="ABCDEF" id="username" name="username" value=<?php echo $row['username']?> readonly>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Password</label>
                            <input class="form-control" type="Password" placeholder="" id="password" name="password1">
                        </div>

                        <div class="col-md-12 form-group">
                            <label>New Password</label>
                            <input class="form-control" type="Password" placeholder="" id="password" name="password2">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="Password" placeholder=""  id="cpassword" name="cpassword">
                            <small id="emailHelp" class="form-text text-muted">
                            Make sure to type the same password
                            </small> 
                        </div>

                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center bg-secondary ">
            <button class="btn btn-default" style="color:white;" type="submit">Update</button>
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







    <!-- LOGIN -->
<!-- LOGIN -->
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