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
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold px-3 mr-1"><img src="img/logo.png"></span></h1>
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
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 369px">
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
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold px-3 mr-1"><img src="img/logo.png"></span></h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
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
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">The dream home that you deserve is here.</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Futuristic Home</h3>
                                    <a href="shop.php?search=all&page=1" class="btn btn-light py-2 px-3" style="border-radius: 5px 5px 5px 5px;">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">We Have Over Million Properties For You</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Your Home is Waiting</h3>
                                    <a href="shop.php?search=all&page=1" class="btn btn-light py-2 px-3" style="border-radius: 5px 5px 5px 5px;">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <i class="fas fa-location-arrow text-primary m-0 mr-2"></i>
                    <h5 class="font-weight-semi-bold m-0">Pick a Category</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <i class="fas fa-home text-primary m-0 mr-2"></i>
                    <h5 class="font-weight-semi-bold m-0">Find your House</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <i class="fas fa-key text-primary m-0 mr-3"></i>
                    <h5 class="font-weight-semi-bold m-0">Take your Keys</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <i class="far fa-thumbs-up text-primary m-0 mr-3"></i>
                    <h5 class="font-weight-semi-bold m-0">Live your Dream</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <?php
                $query="select * from categories";
                $res=mysqli_query($con,$query);
                while($row = mysqli_fetch_array($res)):
            ?>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <?php
                        $query1="select * from houseinfo where Category ='".$row['Category']."'";
                        $res1=mysqli_query($con,$query1);
                    ?>
                    <p class="text-right"><?php echo mysqli_num_rows($res1)?> Units</p>

                    <a href="shop.php?id=<?php echo $row['Category']?>&search=categories&page=1" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/<?php echo $row['picture'] ?>" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0"><?php echo $row['Category'] ?></h5>
                </div>
            </div>
            <?php endwhile ?>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase mb-3" style="color: white;">20% off to all premium members</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Vacation Package</h1>
                        <a href="shop.php?search=all&page=1" class="btn btn-outline-primary py-md-2 px-md-3">Redeem Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase mb-3" style="color:white;">10% off to new members</h5>
                        <h1 class="mb-4 font-weight-semi-bold">House Warming</h1>
                        <a href="shop.php?search=all&page=1" class="btn btn-outline-primary py-md-2 px-md-3">Rent Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Popular Architectural Style Homes</span></h2>
        </div>
        
            <!-- Categories Start -->
            <div class="container-fluid pt-5">
                <div class="row px-xl-5 pb-3">
                    <?php
                        $query="select * from style";
                        $res=mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($res)):
                    ?>
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                            <?php
                                $query1="select * from houseinfo where style ='".$row['Style']."'";
                                $res1=mysqli_query($con,$query1);
                            ?>
                            <p class="text-right"><?php echo mysqli_num_rows($res1)?> Units</p>
                            <a href="shop.php?id=<?php echo $row['Style']?>&search=style&page=1" class="cat-img position-relative overflow-hidden mb-3">
                                <img class="img-fluid" src="img/<?php echo $row['picture'] ?>" alt="">
                            </a>
                            <h5 class="font-weight-semi-bold m-0"><?php echo $row['Style'] ?></h5>
                        </div>
                    </div>
                    <?php endwhile ?>
                </div>
            </div>
            <!-- Categories End -->
    </div>
    <!-- Products End -->

    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Want to be the first one to be notify about our new Houses. Subscribe to our newsletter and enjoy the benefits.</p>
                </div>
                <form action="send.php">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here" name="emai">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here" name="name1" value="Our beloved customer" hidden>
                        
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4" type="submit" name="send">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">New Modular Houses</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php 
            $query="select * from houseinfo where Status='Available' order by ID DESC LIMIT 8";
            $res=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($res)):
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/<?php echo $row['Preview1'] ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $row['HouseName'] ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>&#8369;<?php echo $row['Price'] ?></h6><h6 class="text-muted ml-2"><del>&#8369;<?php echo $row['PreviousPrice'] ?></del></h6><h6>/month</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="detail.php?id=<?php echo $row['ID'] ?>&search=house" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <?php 
                       
                        if(isset($_SESSION['login_user'])){
                            
                            if($_SESSION==''){

                            }else{
                                $dreamsql="SELECT * from dreamlist where HouseID='".$row['ID']."' and userID='".$_SESSION['userid']."'";
                                $dreamres=mysqli_query($con,$dreamsql);

                                if(mysqli_num_rows($dreamres)>0){
                                echo "<a href='dream.php' class='btn btn-sm text-dark p-0'><i class='fas fa-heart text-primary mr-1'></i>I LOVE IT</a>";
                                }else{

                                echo "<a href='dreamfunction.php?id=" .$row['ID']. "' class='btn btn-sm text-dark p-0'><i class='far fa-heart text-primary mr-1'></i>Dream List</a>";
                                }
                            }
                        }else{
                            echo "<a href='login.php' class='btn btn-sm text-dark p-0'><i class='far fa-heart text-primary mr-1'></i>Dream List</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php endwhile ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


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