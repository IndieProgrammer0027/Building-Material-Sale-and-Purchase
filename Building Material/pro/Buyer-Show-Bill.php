<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

    $user=$_SESSION['Username'];
    $Aid = $_SESSION['ad2']; 
    $buyerId = $_SESSION['buyer']  ;
    $adminId = $_SESSION['admin'] ;
    $vendorId = $_SESSION['vendor'] ;
    $productId = $_SESSION['product'] ;
    $quan = $_SESSION['quan'] ;
    $details =  $_SESSION['det'] ;
    
    $q = "select orders.OrderID from orders inner join buyer on buyer.BuyerID=orders.BuyerID where buyer.BuyerID='$buyerId' ORDER BY orders.OrderID DESC limit 1";
    $row = mysqli_query($con,$q);
    $res = mysqli_fetch_assoc($row);
    $orderId = $res['OrderID'];

    $q1 = "SELECT PriceUnit from products where ProductID = '$productId'";
    $row1 = mysqli_query($con,$q1);
    $res1 = mysqli_fetch_assoc($row1);
    $priceUnit = $res1['PriceUnit'];
    $totalAmount = $priceUnit * $quan;

    if(isset($_POST['sub10'])){
     $sql = "INSERT INTO bill( Amount, Details, BillTimeDate, OrderID, VendorID,BuyerID, BillStatus) VALUES ('$totalAmount','$details',now(),'$orderId','$vendorId','$buyerId','Pending')";
         if(mysqli_query($con,$sql)){
             header("location:  Buyer-Advertisement-Main.php");
            echo "task Complete";
        }
    }
    else if(isset($_POST['sub11'])){
        $ql = "DELETE FROM orders WHERE OrderID = '$orderId'";
        if(mysqli_query($con,$ql)){
             header("location:  Buyer-Advertisement-Main.php");
            echo "task Complete";
        }
    }



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>
        WeBuilder</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/materialdesignicons.min.css" rel="stylesheet">
        
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        <link href="vendors/owl-carousel/assets/owl.carousel.min.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


                <style>
            .nbox {
    color: black; 
  padding: 2px;
  margin-top: 5px;
  border-radius: 12px
  max-width 200px;
}

.input_fields {
    padding-left: 120px;
}

input[type=text] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #fffbbc;
}

input[type=text]:focus {
  background-color: #ddf0ff;
  outline: none;
}


.button 
{
    display: inline-block;
    border-radius: 6px;
    background-color: #35444f;
    border: none;
    color: #b4cddf;
    text-align: center;
    font-size: 15px;
    padding-top: 3px;
    padding-bottom: 5px;

    width: 100px;
    transition: all 0.5s;
    cursor: pointer;
    margin right: 0px;
    margin-left: 10px;
    margin-top: -5px;
    margin-bottom: -5px;
}

.button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}

.button span:after 
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
}

.button:hover span
{
    padding-right: 25px;
}

.button:hover span:after
 {
     opacity: 1;
    right: 0;
   }
        </style>

    </head>
    <body>
       
       
        <!--================Header Area =================-->
                       <header class="main_header_area">
            <div class="header_top_area">
                <div class="container">
                  <h2 style="margin: 15px; color: white;">Welcome to WeBuild Market Place(Where Buying and Selling Made Easier)</h2>
                </div>
            </div>
            
            <a class='slider_btn' href='Logout_action.php' style="float: right; margin-right: 50px;">Logout</a>
        </header>

        <section class="our_project2_area our_project_three_column">
            <div class="main_c_b_title">
                <h2>Bill<br class="title_br">Information</h2>
            </div>
        </section>


         <section class="feature_content">
            <div class="container">
                <div class="row" style="margin-left: 440px;">
                    <div class="col-md-4 col-sm-6">
                        
                        <?php
                    
                        
                        
                            echo "
                            <div class='f_content_item' style='margin-top: -40px; text-align: center;'>
                            <i class='fa fa-ge' aria-hidden='true'></i>
                            <h4>Advertisement ID : "; echo "<td>{$Aid}</td>"; echo "</h4>
                            <h4>Vendor ID : "; echo "<td> {$vendorId}</td>"; echo "</h4>
                            <h4>Order ID : "; echo "<td> {$orderId}</td>"; echo "</h4>
                            <h4>Details "; echo "<td> {$details}</td>"; echo "</h4>
                            <h4>Total Bill "; echo "<td> {$totalAmount}</td>"; echo "</h4>
                            <h4>Product ID "; echo "<td> {$productId}</td>"; echo "</h4>
                            </div>
                        ";
                        echo "
                        <form class='nbox'  method='POST'>
                        <center>
                        <br>
                        <h4>Place Order</h4><br>
                        <br><br>
                        ";
                         echo "
                        
                        <button class='button' type='submit' name='sub10' style='margin-right: -30px;'><span>Proceed</span></button>

                         <button class='button' type='submit' name='sub11' style='margin-right: -30px;'><span>Cancel</span></button>
                        
                           </center>
                        </form>
                        ";
                    
                    ?>
                    </div>
                </div>
            </div>
        </section>

        <!--================Address Area =================-->
   <?php
        $buy="select * from buyer where UserName='$user'";
        $rebu=mysqli_query($con,$buy);
        $adrow=mysqli_fetch_assoc($rebu);

        $admin="select admin.PhoneNumber from admin inner join buyer on buyer.AdminID=admin.AdminID where buyer.UserName='$user'";
        $resad=mysqli_query($con,$admin);
        $admrow=mysqli_fetch_assoc($resad);

        ?>

        <section class="address_area">
            <div class="container">
                <div class="row address_inner">
                    <div class="col-md-4">
                        <div class="media">
                            <div class="media-left">
                                <img src="img/icon/place-icon.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4>Office Address :</h4>
                                <h5><?php echo "<td>{$adrow['Address']}</td>"; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <div class="media-left">
                                <img src="img/icon/phone-icon.png" alt="">
                            </div>
                            <div class="media-body">
                                <h5><?php echo "<td>{$adrow['PhoneNumber']}</td>"; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <div class="media-left">
                                <img src="img/icon/inbox-icon.png" alt="">
                            </div>
                            <div class="media-body">
                                <h5><?php echo "<td>{$adrow['Email']}</td>"; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Address Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
            <div class="footer_widgets_area">
                <div class="container">
                    <div class="row footer_widgets_inner" style="width: 140%;">
                        <div class="col-md-3 col-sm-6">
                            <aside class="f_widget about_widget">
                                <img src="img/footer-logo.png" alt="">
                                <p>
                                     We’re a global product group.+20 brands. All Nations. One mindset.
                                     We empower people to upgrade their lives. Our products & services make it super easy for anyone to buy or sell almost anything.Every month thousands of people use our market-leading trading platforms. We’re going for a billion.
                                  </p>
                            </aside>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <aside class="f_widget address_widget">
                                <div class="f_w_title">
                                    <h3>Office Address</h3>
                                </div>
                                <div class="address_w_inner">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo "<td>{$adrow['Address']}</td>"; ?></p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo "<td>{$adrow['PhoneNo']}</td>"; ?></p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo "<td>{$adrow['Email']}</td>"; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <aside class="f_widget give_us_widget">
                                <h5>Contact Authorities</h5>
                                <h4><?php echo "<td>{$admrow['PhoneNumber']}</td>"; ?></h4>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_copy_right">
                <div class="container">
                    <h4><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Free Classifieds in Pakistan. © 2006-2019 WeBuild </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></h4>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-2.2.4.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/counterup/waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script>
        <script src="vendors/flex-slider/jquery.flexslider-min.js"></script>
        
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        
        <script src="js/theme.js"></script>
    </body>
</html>