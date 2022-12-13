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

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><img src="img/logo.png"></h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <?php 
             if(isset($_SESSION['login_user'])){
                if($_SESSION==''){

                }else{
                    $query="select * from userinfo where ID = '".$_SESSION['userid']."'";
                    $res=mysqli_query($con,$query);
                    $row = mysqli_fetch_array($res);

                    $qdream="select * from dreamlist where userID = '".$_SESSION['userid']."'";
                    $resdream=mysqli_query($con,$qdream);
                    $rowdream=mysqli_fetch_array($resdream);
                    if(!$resdream){
                        $dreamcount=0;
                    }else{
                        $dreamcount=mysqli_num_rows($resdream);
                    }

                    $qtran="select * from transaction where userid = '".$_SESSION['userid']."'";
                    $restran=mysqli_query($con,$qtran);
                    $rowtran=mysqli_fetch_array($restran);
                    if(!$restran){
                        $trancount=0;
                    }else{
                        $trancount=mysqli_num_rows($restran);
                    }

            echo " <div class='col-lg-3 col-6 text-right'>
                    <a href='dream.php' class='btn border'>
                    <i class='fas fa-heart text-primary'></i>
                    <span class='badge'>".$dreamcount."</span>
                    </a>
                    <a href='transactionlist.php' class='btn border'>
                    <i class='fas fa-home text-primary'></i>
                    <span class='badge'>".$trancount."</span>
                    </a>
                    </div>";
                }
            }
            ?>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 369px">
                        <div class="navbar-nav w-100 overflow-hidden" style="height: 369px">
                        <?php 
                            $query = "select * from categories";
                            $res = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($res)):
                        ?>                        
                        <a href="shop.php?id=<?php echo $row['Category']?>&search=categories&page=1" class="nav-item nav-link"><?php echo $row['Category'] ?></a>
                        <?php endwhile ?>
                    </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><img src="img/logo.png"></h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php?search=all&page=1" class="nav-item nav-link">Units</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php 
                            if(isset($_SESSION['login_user'])){

                                if($_SESSION==''){
                                    echo "<a href='login.php' class='nav-item nav-link'>Login</a>";
                                    echo "<a href='register.php' class='nav-item nav-link'>Register</a>";

                                }else{

                                    $query="select * from userinfo where ID = '".$_SESSION['userid']."'";
                                    $res=mysqli_query($con,$query);
                                    $row = mysqli_fetch_array($res);
                                    echo "<a href='profile.php' class='nav-item nav-link'>".$row['FirstName']." ".$row['LastName']."</a>";
                                    echo "<a href='logout.php' class='nav-item nav-link'>Logout</a>";
                                }   
                            }else{
                                echo "<a href='login.php' class='nav-item nav-link'>Login</a>";
                                echo "<a href='register.php' class='nav-item nav-link'>Register</a>";
                            }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3"><span class="bg-secondary px-2">TRANSACTION</span></h1>
            <div class="d-inline-flex">
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th></th>
                            <th>House Name</th>
                            <th>Price</th>
                            <th>Next Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php 
                        $sqlt="select * from transaction where userid = '".$_SESSION['userid']."'";
                        $rest=mysqli_query($con,$sqlt);
                        while($rowt = mysqli_fetch_array($rest)):
                        ?>
                        <tr>
                            <td><input type="radio" class="text-center" name="select1" value="<?php echo $rowt['ID'] ?>"></td>
                            <?php 
                            $sqlhouse="select * from houseinfo where ID = '".$rowt['houseid']."'";
                            $reshouse=mysqli_query($con,$sqlhouse);
                            $rowhouse=mysqli_fetch_array($reshouse);

                            ?>
                            <td><a class="text-dark mb-2" href="detail.php?id=<?php echo $rowhouse['ID'] ?>&search=house"><img src="img/<?php echo $rowhouse['Preview1']?>" alt="" style="width: 50px;"> <?php echo $rowhouse['HouseName']?></a></td>

                            <td class="align-middle">&#8369;<?php 
                            $price=$rowhouse['Price'];
                            $converted=number_format($price,2,'.',',');
                            echo $converted;?></td>
                            <td class="align-middle"><?php echo $rowt['NextPayment']?></td>
                            <td class="align-middle">
                                <form action="cart.php?id=<?php echo $rowhouse['ID']?>" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $rowhouse['ID'] ?>">
                                         <button class="btn btn-sm btn-primary" name="delcart">Manage</button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile ?>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <?php include('footer.php')?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn back-to-top" style="color:white; border-color:white;"><i class="fa fa-angle-double-up"></i></a>




  <!-- LOGIN -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold border-secondary">Sign in</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control py-4" placeholder="" required="required" />
                <label>Password</label>
                <input type="Password" class="form-control py-4" placeholder="" required="required" />
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
            <button class="btn btn-default" style="color:white;">Login</button>
          </div>
        </div>
      </div>
    </div>
<!-- LOGIN -->



 <!-- Register -->
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold border-secondary">Sign up</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <div class="mb-4">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" placeholder="ABCDEF">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Password</label>
                            <input class="form-control" type="Password" placeholder="">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="Password" placeholder="">
                        </div>

                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center bg-secondary ">
            <button class="btn btn-default" style="color:white;">Register</button>
          </div>
        </div>
      </div>
    </div>
<!-- regester -->




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