<?php include('function/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3"><span class="bg-secondary px-2">Transaction</span></h1>
            <div class="d-inline-flex">
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <?php 
    $sqlhouse="select * from houseinfo where ID = '".$_GET['id']."'";
    $reshouse=mysqli_query($con,$sqlhouse);
    $rowhouse=mysqli_fetch_array($reshouse);
    ?>
    <h1 class="text-center"><?php echo $rowhouse['HouseName'] ?></h1>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Payment</th>
                            <th>PaymentDate</th>
                            <th>Next Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php 
                        $sqlt="select * from translist where userid = '".$_SESSION['userid']."' and houseid='".$_GET['id']."' order by ID DESC";
                        $rest=mysqli_query($con,$sqlt);
                        while($rowt = mysqli_fetch_array($rest)):
                        ?>
                        <tr>

                            <td>&#8369;<?php 
                            $price=$rowt['Payment'];
                            $converted=number_format($price,2,'.',',');
                            echo $converted;?></td>

                            <td class="align-middle"><?php echo $rowt['PaymentDate']?></td>
                            <td class="align-middle"><?php echo $rowt['NextPayment']?></td>
                            <td class="align-middle"><?php echo $rowt['Status']?></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <?php 
                        $sqlt="select * from translist where userid = '".$_SESSION['userid']."' and houseid='".$_GET['id']."' order by ID DESC";
                        $rest=mysqli_query($con,$sqlt);
                        $rowt = mysqli_fetch_array($rest);
                        ?>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Rent</h6>
                            <h6 class="font-weight-medium">&#8369;<?php 
                            $price=$rowt['Payment'];
                            $converted=number_format($price,2,'.',',');
                            echo $converted;?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Next Payment</h6>

                            <h6 class="font-weight-medium"><?php echo $ndate=date('m/d/y', strtotime("+1 months", strtotime($rowt['NextPayment']))); ?></h6>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <?php include('footer.php')?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


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