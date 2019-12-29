<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];

$tbills="Select count(BillID) from bill b inner join vendor on b.VendorID=vendor.VendorID where vendor.Username='$user'";
$restb=mysqli_query($con,$tbills);
$row=mysqli_fetch_assoc($restb);

$cbills="Select count(BillID) from bill b inner join vendor on b.VendorID=vendor.VendorID where vendor.Username='$user' And BillStatus like 'Completed'";
$rescb=mysqli_query($con,$cbills);
$row1=mysqli_fetch_assoc($rescb);

$pbills="Select count(BillID) from bill b inner join vendor on b.VendorID=vendor.VendorID where vendor.Username='$user' And BillStatus like 'Pending'";
$respb=mysqli_query($con,$pbills);
$row2=mysqli_fetch_assoc($respb);

$allbills="select * from bill inner join vendor on bill.vendorID=vendor.VendorID where vendor.Username='$user' And BillStatus like'Pending'";
$resab=mysqli_query($con,$allbills);
$rows=mysqli_num_rows($resab)
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
    font-size: 18px;
    padding-top: 10px;
    padding-bottom: 10px;

    width: 100px;
    transition: all 0.5s;
    cursor: pointer;
    margin right: 0px;
    margin-left: 10px;
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
            <div class="main_menu_area">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="Vendor-Home.php">Home</a></li>
                                <li class="dropdown submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Orders</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="Vendor-Order-Main.php">All Orders Orders</a></li>
                                        <li><a href="Vendor-Order-Compl.php">Completed Orders</a></li>
                                        <li><a href="Vendor-Order-Pending.php">Pending Orders</a></li>
                                        <li><a href="Vendor-Order-Canceled.php">Canceled Orders</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Payments</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="Vendor-Bill-Main.php">All Payments</a></li>
                                        <li><a href="Vendor-Bill-Pending.php">Pending Payments</a></li>
                                        <li><a href="Vendor-Bill-Compl.php">Complted Payments</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Advertisements</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="Vendor-Advertisement-Main.php">View All Advertisements</a></li>
                                        <li><a href="Vendor-Ad-Upload.php">Add Advertisements</a></li>
                                        <li><a href="Vendor-Enabled-Advertisements.php">Enable Advertisements</a></li>
                                        <li><a href="Vendor-Disabled-Advertisements.php">Disable Advertisements</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Supplier</a>
                                    <ul class="dropdown-menu">
                                <li class="active"><a href="Vendor-Supplier-Info.php">Supplier Info</a></li>
                                <li class="active"><a href="Vendor-Supplier-Info-Status.php">Supplier Selection</a></li>
                            </ul>
                        </li>
                                <li><a href="Vendor-Acc-Up.php">Upgrade Account</a></li>
                                <li><a href="Account-Info.php">Account Info</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
            <a class='slider_btn' href='Logout_action.php' style="float: right; margin-right: 50px;">Logout</a>
        </header>
        <!--================Header Area =================-->
         <section class="our_project2_area our_project_three_column">
            <div class="main_c_b_title">
                <h2>Basic<br class="title_br">Information</h2>
            </div>
        </section>

        <section class="counter_area">
            <div class="container">
                <div class="row counter_inner">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-archive" aria-hidden="true"></i>
            
                            <h4 class="counter"><?php 
                                echo "<td>{$row['count(BillID)']}</td>";
                             ?></h4>
                            <h5>All Payments</h5>
                                <a class="get_btn" href="#" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <h4 class="counter"><?php 
                                echo "<td>{$row1['count(BillID)']}</td>";
                             ?></h4>
                            <h5>Completed Payments</h5>
                            <a class="get_btn" href="#" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <h4 class="counter"><?php 
                                echo "<td>{$row2['count(BillID)']}</td>";
                             ?></h4>
                            <h5>Pending Payments</h5>
                            <a class="get_btn" href="#" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================Our Project2 Area =================-->
           <section class="our_project2_area our_project_three_column">
            <div class="main_c_b_title">
                <h2>Pending<br class="title_br">Payments</h2>
            </div>
        </section>

        <section class="our_service_area2">
            <div class="container">

                <form class="nbox" action="Vendor-Bill-Single.php" method="POST">
                <center>
                <br>
                <b>Payment-ID</b><br>
                <input type=text placeholder="Payment ID" name="Bid">
                <button class="button" type="submit" name="sub" style="margin-right: -30px;"><span>Proceed</span></button>
                <button class="button" type="reset" name="res"><span>Reset</span></button>
                </center>
                </form>

                 <?php

                if($rows>0)
                {
                    echo "
                <div class='row service2_inner'>";
             
                while($rows>0)
                {
                while($row3=mysqli_fetch_array($resab,MYSQLI_ASSOC))
                {
                echo "
                
                    <div class='col-md-4 col-sm-6'>
                        <div class='service2_item'>
                            <div class='service2_item_inner'>
                                <div class='service2_item_inner_content'>
                                    <div class='service_icon'>
                                    <h4>Bill No. "; echo "<td>{$row3['BillID']}</td>"; echo "</h4>
                                    <p>"; echo "<td>{$row3['Details']}</td>";
                                    $id="{$row3['BillID']}";
                                    echo "</p>
                                    <a class='view_btn' href='Vendor-Bill-Dynamic.php?Bid=$id'>Read</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            $rows--;
        }
    }
    else if($rows<=0)
    {

      echo "
      <center>
      <h4>NO DATA FOUND</h4>
      </center>";
    }
    ?>
    </div>
            </div>
        </section>

        <!--================Address Area =================-->
     <?php
        $add="select * from vendor where UserName='$user'";
        $read=mysqli_query($con,$add);
        $adrow=mysqli_fetch_assoc($read);

        $admin="select admin.PhoneNumber from admin inner join vendor on vendor.AdminID=admin.AdminID where vendor.UserName='$user'";
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
                                <h5><?php echo "<td>{$adrow['PhoneNo']}</td>"; ?></h5>
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
                    <div class="row footer_widgets_inner">
                        <div class="col-md-3 col-sm-6">
                            <aside class="f_widget about_widget">
                                <img src="img/footer-logo.png" alt="">
                                <p>
                                     We’re a global product group.+20 brands. All Nations. One mindset.
                                     We empower people to upgrade their lives. Our products & services make it super easy for anyone to buy or sell almost anything.Every month thousands of people use our market-leading trading platforms. We’re going for a billion.
                                  </p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <aside class="f_widget recent_widget">
                                <div class="f_w_title">
                                    <h3>Recent Posts</h3>
                                </div>
                                <div class="recent_w_inner">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="img/blog/recent-post/recent-1.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <a href="#"><p>The road to success is always under TeamWork</p></a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="img/blog/recent-post/recent-2.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <a href="#"><p>The road to success is always under HardShip</p></a>
                                        </div>
                                    </div>
                                </div>
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