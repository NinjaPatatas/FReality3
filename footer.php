<div class="container-fluid bg-secondary text-light mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold" style="background-color: white; border-radius: 10px 50px 10px 50px;"><span class="text-primary font-weight-bold px-3 mr-1"><img src="img/logo.png"></span></h1>
                </a>
                <p style="color: white;">The dream home that you deserve is here. We Have Over Million Properties For You</p>
                <p style="color: white;" class="mb-2"><i class="fa fa-map-marker-alt mr-3" style="color:#ffca59;"></i>143 Poblacion 1 Sariaya, Quezon</p>
                <p  style="color: white;" class="mb-2"><i class="fa fa-envelope mr-3" style="color:#ffca59;"></i>findreality@gmail.com</p>
                <p style="color: white;" class="mb-0"><i class="fa fa-phone-alt mr-3" style="color:#ffca59;"></i>+639478546528</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-light mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-light mb-2" href="shop.php?search=all&page=1"><i class="fa fa-angle-right mr-2"></i>Units</a>
                            <a class="text-light" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-light mb-4">Categories</h5>
                        <div class="d-flex flex-column justify-content-start">


                            <?php 
                            $query = "select * from categories";
                            $res = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($res)):
                            ?>
                            <a class="text-light mb-2" href="shop.php?id=<?php echo $row['Category']?>&search=categories&page=1"><i class="fa fa-angle-right mr-2"></i><?php echo $row['Category'] ?></a>                        
                            
                            <?php endwhile ?>

                        </div>
                    </div>
                    <div class="col-md-4 mb-5">

                        
                        <h5 class="font-weight-bold text-light mb-4">Newsletter</h5>
                        <form action="send.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="name1" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" name="send" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-light">
                    &copy; <a class="text-light font-weight-semi-bold" href="#">Find Reality</a>. All Rights Reserved.                   
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>