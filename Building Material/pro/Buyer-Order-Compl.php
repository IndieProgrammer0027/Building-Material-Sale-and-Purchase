<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];

$torders="Select count(OrderID) from orders o inner join buyer on o.BuyerID=Buyer.BuyerID where buyer.Username='$user'";
$resto=mysqli_query($con,$torders);
$row3=mysqli_fetch_assoc($resto);

$corders="Select count(OrderID) from orders o inner join buyer on o.BuyerID=buyer.BuyerID where buyer.Username='$user' And OrderStatus like 'Completed'";
$resco=mysqli_query($con,$corders);
$row4=mysqli_fetch_assoc($resco);

$porders="Select count(OrderID) from orders o inner join buyer on o.BuyerID=buyer.BuyerID where buyer.Username='$user' And OrderStatus like 'Pending'";
$respo=mysqli_query($con,$porders);
$row5=mysqli_fetch_assoc($respo);

$comporder="select orders.*,buyer.BuyerName from orders inner join vendor on orders.vendorID=vendor.VendorID inner join buyer on orders.BuyerID=buyer.BuyerID where buyer.UserName='$user' And OrderStatus like 'Completed'";
$resco=mysqli_query($con,$comporder);
$rows=mysqli_num_rows($resco);

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
                                <li class="active"><a href="Buyer-Main.php">Home</a></li>
                                <li class="dropdown submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Orders</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="Buyer-Order-Main.php">All Orders Orders</a></li>
                                        <li><a href="Buyer-Order-Compl.php">Completed Orders</a></li>
                                        <li><a href="Buyer-Order-Pending.php">Pending Orders</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Payments</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="Buyer-Bill-Main.php">All Payments</a></li>
                                        <li><a href="Buyer-Bill-Pending.php">Pending Payments</a></li>
                                        <li><a href="Buyer-Bill-Compl.php">Complted Payments</a></li>
                                    </ul>
                                </li>
                                <li><a href="Buyer-Advertisement-Main.php">View Advertisements</a></li>
                                <li><a href="Buyer-Supplier-Info.php">Supplier Info</a></li>
                                <li><a href="Buyer-Vendor-Info.php">Vendor Info</a></li>
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
                            <h4 class="counter">
                                <?php 
                                echo "<td>{$row3['count(OrderID)']}</td>";
                             ?></h4>
                            <h5>All Orders</h5>
                                <a class="get_btn" href="Vendor-Order-Main.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <h4 class="counter">
                                <?php 
                                echo "<td>{$row4['count(OrderID)']}</td>";
                             ?></h4>
                            <h5>Completed Orders</h5>
                            <a class="get_btn" href="Vendor-Order-Compl.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <h4 class="counter"><?php 
                                echo "<td>{$row5['count(OrderID)']}</td>";
                             ?></h4>
                            <h5>Pending Orders</h5>
                            <a class="get_btn" href="Vendor-Order-Pending.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================Our Project2 Area =================-->
       <section class="latest_news_area">
            <div class="container">
                <div class="main_c_b_title">
                    <h2>Completed<br class="title_br">Orders</h2>
                </div>

                <form class="nbox" action="Buyer-Order-Single.php" method="POST">
                <center>
                <br>
                <b>Order-ID</b><br>
                <input type=text placeholder="Order ID" name="Oid">
                <button class="button" type="submit" name="sub" style="margin-right: -30px;"><span>Proceed</span></button>
                <button class="button" type="reset" name="res"><span>Reset</span></button>
                </center>
                </form>
                
                <?php

                if($rows>0)
                {
                    echo "
                <div class='row latest_news_inner' style='margin-top: 20px;'>
                ";
                while($rows>0)
                {
                while($row3=mysqli_fetch_array($resco,MYSQLI_ASSOC))
                {
                echo "
                    <div class='col-md-4 col-sm-6'>
                        <div class='latest_news_item'>
                            <div class='l_date'>
                                <h5> "; echo "<td>{$row3['OrderTimeDate']}</td>"; echo "</h5>
                            </div>
                            <div class='news_content'>
                                <h4>Order No.  "; echo "<td>{$row3['OrderID']}</td>"; echo "</h4>
                                <h5>Posted By Buyer : "; echo "<td>{$row3['BuyerName']}</td>"; echo "</h5>
                                <br>
                                <p>"; echo "<td>{$row3['Details']}</td>"; echo "</p>
                                <div>
                                    "; 
                                $id="{$row3['OrderID']}";
                                echo "
                                <a href='Buyer-Order-Dynamic.php?Oid=$id'>Read More <i class='fa fa-angle-right' aria-hidden='true'></i></a>
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