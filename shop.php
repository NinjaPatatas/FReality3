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
<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
?>
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
                            <a href="shop.php?search=all&page=1" class="nav-item nav-link active">Units</a>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3"><span class="bg-secondary px-2">Our Units</span></h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.html" style="color:white;">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Units</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by Monthly Rent</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."'";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."'";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%'";   
                            }else{
                            $query = "select * from houseinfo";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>     
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">P3,000 - P10,000</label>

                            <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and Price>=3000 and price<=10000";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and Price>=3000 and price<=10000";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and Price>=3000 and price<=10000";   
                            }else{
                            $query = "select * from houseinfo where Price>=3000 and Price<=10000";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">P10,000 - P100,0000</label>

                             <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and Price>=10000 and price<=100000";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and Price>=10000 and price<=100000";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and Price>=10000 and price<=100000";   
                            }else{
                            $query = "select * from houseinfo where Price>=10000 and Price<=100000";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">P100,000 - P500,0000</label>
                             <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and Price>=100000 and price<=500000";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and Price>=100000 and price<=500000";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and Price>=100000 and price<=500000";   
                            }else{
                            $query = "select * from houseinfo where Price>=100000 and Price<=500000";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">P500,0000 - P1,000,000</label>
                             <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and Price>=500000 and price<=1000000";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and Price>=500000 and price<=1000000";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and Price>=500000 and price<=1000000";   
                            }else{
                            $query = "select * from houseinfo where Price>=500000 and Price<=1000000";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">P1,000,000 - above</label>

                             <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and Price>=1000000";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and Price>=1000000";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and Price>=1000000";   
                            }else{
                            $query = "select * from houseinfo where Price>=1000000";

                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 

                            ?>
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                
                
                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by Room</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and ProductDescription LIKE '%bedroom%'";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and ProductDescription LIKE '%bedroom%'";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and ProductDescription LIKE '%bedroom%'";   
                            }else{
                            $query = "select * from houseinfo  where ProductDescription LIKE '%bedroom%'";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>     
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">5 Bedroom</label>
                            <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and ProductDescription LIKE '%5 bedroom%'";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and ProductDescription LIKE '%5 bedroom%'";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and ProductDescription LIKE '%5 bedroom%'";   
                            }else{
                            $query = "select * from houseinfo where ProductDescription LIKE '%5 bedroom%'";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>     
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                            
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">4 Bedroom</label>
                            
                            <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and ProductDescription LIKE '%4 bedroom%'";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and ProductDescription LIKE '%4 bedroom%'";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and ProductDescription LIKE '%4 bedroom%'";   
                            }else{
                            $query = "select * from houseinfo where ProductDescription LIKE '%4 bedroom%'";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>     
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                            
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">3 Bedroom</label>
                            <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and ProductDescription LIKE '%3 bedroom%'";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and ProductDescription LIKE '%3 bedroom%'";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and ProductDescription LIKE '%3 bedroom%'";   
                            }else{
                            $query = "select * from houseinfo where ProductDescription LIKE '%3 bedroom%'";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>     
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                            
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">2 Bedroom</label>
                            <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' and ProductDescription LIKE '%2 bedroom%'";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' and ProductDescription LIKE '%2 bedroom%'";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' and ProductDescription LIKE '%2 bedroom%'";   
                            }else{
                            $query = "select * from houseinfo where ProductDescription LIKE '%2 bedroom%'";
                            }
                            $res = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($res); 
                            ?>     
                            <span class="badge border font-weight-normal"><?php echo mysqli_num_rows($res)?></span>
                            
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <?php 
                                $search1 = (isset($_POST['NameSearch'])) ? htmlentities($_POST['NameSearch']) : '';
                            ?>
                            <form action="shop.php?search=house&page=1" method="POST">
                                <div class="input-group">
                                    <input type="Search" class="form-control" placeholder="Search by name" Name="NameSearch"  value="<?= $search1 ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>

                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sort by
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php 
                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."'";
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."'";
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%'";   
                            }else{
                            $query = "select * from houseinfo";
                            }
                            $res = mysqli_query($con,$query);
                            
                            $page = $_GET['page'];  
                           
    
                            $results_per_page = 9;  
                            $page_first_result = ($page-1) * $results_per_page; 

                            $number_of_result = mysqli_num_rows($res);  
                            $number_of_page = ceil ($number_of_result / $results_per_page);

                            if($_GET['search']=="categories"){
                            $query = "select * from houseinfo where Category = '".$_GET['id']."' LIMIT " .$page_first_result. ',' .$results_per_page;
                            }elseif($_GET['search']=="style"){
                            $query = "select * from houseinfo where Style = '".$_GET['id']."' LIMIT " .$page_first_result. ',' .$results_per_page;
                            }elseif($_GET['search']=="house"){
                            $query = "select * from houseinfo where HouseName LIKE '%".$_SESSION['NameSearch']."%' LIMIT " .$page_first_result. ',' .$results_per_page;
                            }else{
                            $query = "select * from houseinfo LIMIT " .$page_first_result. ',' .$results_per_page;
                            }
                            
                            $res = mysqli_query($con,$query); 
                            if (!$res) {
                            printf("Error: %s\n", mysqli_error($con));
                            exit();
                            }
                            while($row = mysqli_fetch_array($res)):
                            ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="img/<?php echo $row['Preview1'] ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $row['HouseName'] ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>P <?php echo $row['PreviousPrice'] ?></h6><h6 class="text-muted ml-2"><del>P <?php echo $row['Price'] ?></del></h6><h6>/month</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="detail.php?id=<?php echo $row['ID']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
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

                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item">
                              <a class="page-link" href="shop.php?search=<?php echo $_GET['search'] ?>&page=<?php 
                              if($page>1){
                                $page=$page-1;
                              }else{
                                $page=1;
                                if($_POST['NameSearch']!=""){
                                $_SESSION['NameSearch'] = $_POST['NameSearch'];
                                }
                              }
                              echo $page;

                              ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>

                            <?php 
                            $search=$_GET['search'];
                               for($page1 = 1; $page1<= $number_of_page; $page1++) {                                   
                                $page=$_GET['page'];
                                if($page==$page1){

                                echo '<li class="page-item active"><a class="page-link" href=shop.php?search='. $search.'&page='. $page1 . '>'.$page1.'</a></li>';
                                }else{

                                echo '<li class="page-item"><a class="page-link" href=shop.php?search='. $search.'&page='. $page1 . '>'.$page1.'</a></li>';
                                }
                                }
                            ?>
                            <li class="page-item">
                              <a class="page-link" href="shop.php?search=<?php echo $_GET['search'] ?>&page=<?php 
                              if($page<$number_of_page){
                                $page=$page+1;
                              }else{
                                $page=$number_of_page;
                                if($_POST['NameSearch']!=""){
                                $_SESSION['NameSearch'] = $_POST['NameSearch'];
                                }
                              }
                              echo $page;
                              ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <?php include('footer.php')?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn back-to-top" style="color:white; border-color:white;"><i class="fa fa-angle-double-up"></i></a>





  <!-- LOGIN -->
    <?php include('login.php') ?>
<!-- LOGIN -->



 <!-- Register -->
    <?php include('register.php') ?>
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