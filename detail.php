<?php include('function/config.php')?>
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
                <a href="" class="text-decoration-none">
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
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <?php 
                            $query = "select * from categories";
                            $res = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($res)):
                        ?>                        
                        <a href="shop.php?id=<?php echo $row['Category']?>&search=categories&page=1" class="nav-item nav-link"><?php echo $row['Category'] ?></a>
                        <?php endwhile ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="index.php" class="text-decoration-none d-block d-lg-none">
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php"  style="color:white;">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <?php 
                        $sql="select * from houseinfo where ID =" .$_GET['id'];
                        $result=mysqli_query($con,$sql);
                        $row=mysqli_fetch_array($result);
                        $style1=$row['Style'];
                        ?>
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="img/<?php echo $row['Preview1']?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/<?php echo $row['Preview2']?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/<?php echo $row['Preview3']?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/<?php echo $row['Preview4']?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/<?php echo $row['Preview5']?>" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo $row['HouseName']?></h3>
                <div class="d-flex mb-3">
                    <?php 
                    if($row['Rating']=='0.5'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star-half-alt"></small>
                    </div>';
                    }elseif($row['Rating']=='1'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                    </div>';
                    }elseif($row['Rating']=='1.5'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                    </div>';
                    }elseif($row['Rating']=='2'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                    </div>';
                    }elseif($row['Rating']=='2.5'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                    </div>';
                    }elseif($row['Rating']=='3'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                    </div>';
                    }elseif($row['Rating']=='3.5'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                    </div>';
                    }elseif($row['Rating']=='4'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                    </div>';
                    }elseif($row['Rating']=='4.5'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                    </div>';
                    }elseif($row['Rating']=='5'){
                        echo '<div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                    </div>';
                    }
                    $sqlreview="SELECT * from reviews where HouseID =" .$_GET['id'];
                    $sqlresult=mysqli_query($con,$sqlreview);
                    $rowreview=mysqli_fetch_array($sqlresult);
                    ?>
                    <small class="pt-1">(<?php echo mysqli_num_rows($sqlresult)?> Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">&#8369;<?php 
                $price=$row['Price'];
                $converted=number_format($price,2,'.',',');
                echo $converted;?></h3>
                <p class="mb-4"><?php echo $row['ProductDetail']?></p>
                
                <div class="d-flex align-items-center mb-4 pt-2">
                    

                        <?php 
                       
                        if(isset($_SESSION['login_user'])){
                            
                            if($_SESSION==''){

                            }else{
                                $dreamsql="SELECT * from dreamlist where HouseID='".$_GET['id']."' and userid='".$_SESSION['userid']."'";
                                $dreamres=mysqli_query($con,$dreamsql);

                                $tsql="SELECT * from transaction where HouseID='".$_GET['id']."'";
                                $tres=mysqli_query($con,$tsql);
                                
                                if(mysqli_num_rows($tres)>0){
                                echo "<a href='' class='btn btn-secondary px-3'><i class='fas fa-home text-primary mr-1'></i><strong> Rented </strong></a>&nbsp;&nbsp;";
                                }else{
                                echo "<a href='checkout.php?id=" .$_GET['id']. "' class='btn btn-secondary px-3'><i class='fas fa-home text-primary mr-1'></i><strong> Rent Now </strong></a>&nbsp;&nbsp;";
                                }

                                if(mysqli_num_rows($dreamres)>0){
                                echo "<a href='dream.php' class='btn btn-secondary px-3'><i class='fas fa-heart text-primary mr-1'></i>I LOVE IT</a>";
                                }else{
                                echo "<a href='dreamfunction.php?id=" .$_GET['id']. "' class='btn btn-secondary px-3'><i class='far fa-heart text-primary mr-1'></i>Dream List</a>";
                                }
                            }
                        }else{
                            echo "<a href='login.php' class='btn btn-secondary px-3'><i class='fas fa-home text-primary mr-1'></i><strong> Rent Now </strong></a>&nbsp;&nbsp;";
                            echo "<a href='login.php' class='btn btn-secondary px-3'><i class='far fa-heart text-primary mr-1'></i>Dream List</a>";
                        }
                        ?>

                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Reviews (<?php echo mysqli_num_rows($sqlresult)?>)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p><?php echo $row['ProductDescription']?></p>
                    </div>
                    
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="media mb-4">
                                    <div class="media-body">
                                        <?php 
                                            $sqlreview="SELECT * from reviews where HouseID =" .$_GET['id'];
                                            $sqlresult=mysqli_query($con,$sqlreview);
                                            
                                            while($rowreview=mysqli_fetch_array($sqlresult)):
                                            ?>
                                        <h6><?php echo $rowreview['ReviewerName']?><small> - <i><?php echo $rowreview['Date']?></i></small></h6>
                                        <div class="text-primary mb-2">

                                            <?php 
                                                if($rowreview['Rating']=='0.5'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star-half-alt"></small>
                                                </div>';
                                                }elseif($rowreview['Rating']=='1'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star"></small>
                                                </div>';
                                                }elseif($rowreview['Rating']=='1.5'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star-half-alt"></small>
                                                </div>';
                                                }elseif($rowreview['Rating']=='2'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                </div>';
                                                }elseif($rowreview['Rating']=='2.5'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star-half-alt"></small>
                                                </div>';
                                                }elseif($rowreview['Rating']=='3'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                </div>';
                                                }elseif($rowreview['Rating']=='3.5'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star-half-alt"></small>
                                                </div>';
                                                }elseif($rowreview['Rating']=='4'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                </div>';
                                                }elseif($sqlreview['Rating']=='4.5'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star-half-alt"></small>
                                                </div>';
                                                }elseif($rowreview['Rating']=='5'){
                                                    echo '<div class="text-primary mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                </div>';
                                                }
                                            ?>
                                        </div>
                                        <p><?php echo $rowreview['Review']?></p>
                                        <?php endwhile ?>
                                    </div>
                                </div>
                            </div>
                            
                            <?php 
                            $datenow=date('m/d/y');
                            if(isset($_POST['submit1'])){
                                $_SESSION['houseid']=$_GET['id'];
                                $squery="INSERT into reviews values ('','".$_GET['id']."','".$_POST['review']."','".$_POST['name1']."','".$_POST['rating']."','".$datenow."','".$_POST['email']."','')";
                                mysqli_query($con,$squery);
                            }

                            ?>

                            <div class="col-md-6">
                                <form  action="detail.php?id=<?php echo $_GET['id']?>&search=house" method="POST">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <input class="form-control" type="number" min="0" max="5" step="0.5" value="0" onKeyDown="return false" name="rating">
                                    </div>
                                </div>
                                
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control" name="review"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name" name="name1">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3" name="submit1">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->




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