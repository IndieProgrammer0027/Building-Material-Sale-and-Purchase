<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];
    $billid=$_POST['aBid'];

$abs="select bill.*,buyer.BuyerID,buyer.BuyerName,vendor.VendorID,vendor.VendorName from bill inner join vendor on vendor.VendorID=bill.VendorID inner join buyer on bill.BuyerID=buyer.BuyerID inner join orders on bill.OrderID=orders.OrderID where bill.BillID='$billid'";

$resabs=mysqli_query($con,$abs);
$rows=mysqli_num_rows($resabs);

    if(isset($_POST['submit8']))
    {
        $value=$_POST['ob'];
        $_SESSION['ran']=$value;
        $user="bill";
        $_SESSION['use']=$user;
        header("location:  Admin-OB-Status1.php");
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

    </head>
    <body>
       
       
        <!--================Header Area =================-->
                 <header class="main_header_area">
            <div class="header_top_area">
                <div class="container">
                  <h2 style="margin: 15px; color: white;">Welcome to WeBuild Market Place(Where Buying and Selling Made Easier)</h2>
                    </div>
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
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="Admin-Main.php">Home</a></li>
                                <li class="dropdown submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Orders</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="Admin-Order.php">All Orders Orders</a></li>
                                        <li><a href="Admin-Order-Compl.php">Completed Orders</a></li>
                                        <li><a href="Admin-Order-Pending.php">Pending Orders</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Payments</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="Admin-Bill.php">All Payments</a></li>
                                        <li><a href="Admin-Bill-Pending.php">Pending Payments</a></li>
                                        <li><a href="Admin-Bill-Compl.php">Complted Payments</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Advertisements</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="Admin-Advertisement-Main.php">View All Advertisements</a></li>
                                        <li><a href="Admin-Advertisement-ADisabled.php" style="font-size: 12px;">Admin Disabled Advertisements</a></li>
                                        <li><a href="Admin-Advertisement-Enabled.php">Enable Advertisements</a></li>
                                        <li><a href="Admin-Advertisement-Disabled.php">Disable Advertisements</a></li>
                                    </ul>
                                </li>
                                <li><a href="Admin-Buyer-Info.php">Buyer's Info</a></li>
                                <li><a href="Admin-Supplier-Info.php">Supplier's Info</a></li>
                                <li><a href="Admin-Vendor-Info.php">Vendor's Info</a></li>

                                <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts</a>
                                    <ul class="dropdown-menu">
                                        <li class="active"><a href="Admin-Create-Acc.html">Create Account</a></li>
                                        <li><a href="Admin-Acc-Info.php">My Account</a></li>
                                    </ul>
                                </li>
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
                <h2>Payment<br class="title_br">Information</h2>
            </div>
        </section>

        <!--================Our Project2 Area =================-->
       <section class="feature_content">
            <div class="container">
                <div class="row" style="margin-left: 440px;">
                    <div class="col-md-4 col-sm-6">
                        <?php
                        if($rows>0)
                        {
                        $row3=mysqli_fetch_array($resabs,MYSQLI_ASSOC);

                            echo "
                            <div class='f_content_item' style='margin-top: -40px; text-align: center;'>
                            <i class='fa fa-ge' aria-hidden='true'></i>
                            <h4>Bill No. : "; echo "<td>{$row3['BillID']}</td>"; echo "</h4>
                            <h4>Amount : "; echo "<td>{$row3['Amount']}</td>"; echo "</h4>
                            <h4>Bill Status : "; echo "<td>{$row3['BillStatus']}</td>"; echo "</h4>
                            <h4>Date : "; echo "<td>{$row3['BillTimeDate']}</td>"; echo "</h4>
                            <h4>Details : "; echo "<td>{$row3['Details']}</td>"; echo "</h4>
                            <hr style='color : black;'>
                            <br>
                            <h4>Vendor ID : "; echo "<td>{$row3['VendorID']}</td>"; echo "</h4>
                            <h4>Vendor Name : "; echo "<td>{$row3['VendorName']}</td>"; echo "</h4>
                            <h4>Buyer ID : "; echo "<td>{$row3['BuyerID']}</td>"; echo "</h4>
                            <h4>Buyer Name : "; echo "<td>{$row3['BuyerName']}</td>"; echo "</h4>
                            <h4>Order ID : "; echo "<td>{$row3['OrderID']}</td>"; echo "</h4>
                        </div>
                        ";
                        echo "
                        <form class='nbox' method='POST'>
                        <center>
                        <br>
                        <h4>Bill Status</h4><br>
                        <input type=radio button name='ob' value='Pending' style='margin-left : -48px;'><b style='font-size : 20px;'>Pending</b>
                        <input type=radio button name='ob' value='Completed'><b style='font-size : 20px;'>Recieved</b>
                        <input type=radio button name='ob' value='Delete'><b style='font-size : 20px;'>Delete</b>
                        <br><br>
                         ";
                        $id1="{$row3['BillID']}";
                        $_SESSION['id1']=$id1;
                        echo "
                        <button class='button' type='submit' name='submit8' style='margin-right: -30px;'><span>Proceed</span></button>
                        <button class='button' type='reset' name='res'><span>Clear</span></button>
                        </center>
                        </form>
                        ";
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
            </div>
        </section>

        <!--================Address Area =================-->
        <?php
        $add="select * from admin where UserName='$user'";
        $read=mysqli_query($con,$add);
        $adrow=mysqli_fetch_assoc($read);

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
                    <div class="row footer_widgets_inner">
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
                                            <p><?php echo "<td>{$adrow['PhoneNumber']}</td>"; ?></p>
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
                                <h4><?php echo "<td>{$adrow['PhoneNumber']}</td>"; ?></h4>
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