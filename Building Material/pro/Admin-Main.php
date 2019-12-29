<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];

$sql="Select count(AdvertisementID) from advertisement";
$sel=mysqli_query($con,$sql);
$row =mysqli_fetch_assoc($sel);

$activeAds="Select count(AdvertisementID) from advertisement where AdStatus like 'Active'";
$resAA=mysqli_query($con,$activeAds);
$row1=mysqli_fetch_assoc($resAA);

$deactiveAds="Select count(AdvertisementID) from advertisement where AdStatus like 'DeActive'";
$resDA=mysqli_query($con,$deactiveAds);
$row2=mysqli_fetch_assoc($resDA);

$torders="Select count(OrderID) from orders";
$resto=mysqli_query($con,$torders);
$row3=mysqli_fetch_assoc($resto);

$corders="Select count(OrderID) from orders where OrderStatus like 'Completed'";
$resco=mysqli_query($con,$corders);
$row4=mysqli_fetch_assoc($resco);

$porders="Select count(OrderID) from orders where OrderStatus like 'Pending'";
$respo=mysqli_query($con,$porders);
$row5=mysqli_fetch_assoc($respo);

$tbills="Select count(BillID) from bill";
$restb=mysqli_query($con,$tbills);
$row6=mysqli_fetch_assoc($restb);

$cbills="Select count(BillID) from bill where BillStatus like 'Completed'";
$rescb=mysqli_query($con,$cbills);
$row7=mysqli_fetch_assoc($rescb);

$pbills="Select count(BillID) from bill where BillStatus like 'Pending'";
$respb=mysqli_query($con,$pbills);
$row8=mysqli_fetch_assoc($respb);

$details1="select * FROM advertisement ORDER BY AdvertisementID DESC LIMIT 1";
$resd1=mysqli_query($con,$details1);
$row9=mysqli_fetch_assoc($resd1);

$details2="select * FROM advertisement ORDER BY AdvertisementID DESC LIMIT 1,1";
$resd2=mysqli_query($con,$details2);
$row10=mysqli_fetch_assoc($resd2);

$details3="select * FROM advertisement ORDER BY AdvertisementID DESC LIMIT 2,1";
$resd3=mysqli_query($con,$details3);
$row11=mysqli_fetch_assoc($resd3);

$details4="select * FROM orders ORDER BY OrderID DESC LIMIT 1";
$resd4=mysqli_query($con,$details4);
$row12=mysqli_fetch_assoc($resd4);

$details5="select * FROM orders ORDER BY OrderID DESC LIMIT 1,1";
$resd5=mysqli_query($con,$details5);
$row13=mysqli_fetch_assoc($resd5);

$details6="select * FROM bill ORDER BY BillID DESC LIMIT 1";
$resd6=mysqli_query($con,$details6);
$row14=mysqli_fetch_assoc($resd6);

$details7="select * FROM bill ORDER BY BillID DESC LIMIT 1,1";
$resd7=mysqli_query($con,$details7);
$row15=mysqli_fetch_assoc($resd7);

if(isset($_REQUEST['sub1']))
{
    $ID=$_REQUEST['tid'];

 if($_REQUEST['use']=='buyer') 
    { 
       $_SESSION['ID']=$ID;
      header("location:  Admin-Buyer-Single.php");
    }
  else if($_REQUEST['use']=='supplier') 
   { 
       $_SESSION['ID']=$ID;
       header("location:  Admin-Supplier-Single.php");
    
    }
   else if($_REQUEST['use']=='vendor') 
    { 
      $_SESSION['ID']=$ID;
       header("location:  Admin-Vendor-Single.php");
    }
   else if($_REQUEST['use']=='advertisement') 
    {  
        $_SESSION['ID']=$ID;
       header("location:  Ad.php");
    }
  else if($_REQUEST['use']=='bill') 
    {  
        $_SESSION['ID']=$ID;
       header("location:  Admin-Bill-Single.php");
    }
    else if($_REQUEST['use']=='order') 
    {  
        $_SESSION['ID']=$ID;
       header("location:  Admin-Order-Single.php");
    }
    else if($_REQUEST['use']=='ad') 
    {  
        $_SESSION['ID']=$ID;
       header("location:  Admin-Advertisement-Single.php");
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
    font-size: 18px;
    padding-top: 4px;
    padding-bottom: 6px;

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
         <section class="our_project2_area our_project_three_column" style="margin-top: 240px;">
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
                                echo "<td>{$row['count(AdvertisementID)']}</td>";
                             ?>
                         </h4>
                            <h5>Advertisement Uploaded</h5>
                                <a class="get_btn" href="Admin-Advertisement-Main.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <h4 class="counter"><?php 
                                echo "<td>{$row1['count(AdvertisementID)']}</td>";
                             ?></h4>
                            <h5>Advertisement Active</h5>
                            <a class="get_btn" href="Admin-Advertisement-Enabled.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <h4 class="counter"><?php 
                                echo "<td>{$row2['count(AdvertisementID)']}</td>";
                             ?></h4>
                            <h5>Advertisement Disabled</h5>
                            <a class="get_btn" href="Admin-Advertisement-Disabled.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="counter_area" style="margin-top: -80px;">
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
                                <a class="get_btn" href="Admin-Order.php" style="margin-top: 10px; font-size: 15px;">View</a>
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
                            <a class="get_btn" href="Admin-Order-Compl.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <h4 class="counter"><?php 
                                echo "<td>{$row5['count(OrderID)']}</td>";
                             ?></h4>
                            <h5>Pending Orders</h5>
                            <a class="get_btn" href="Admin-Order-Pending.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="counter_area" style="margin-top: -80px;">
            <div class="container">
                <div class="row counter_inner">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-archive" aria-hidden="true"></i>
            
                            <h4 class="counter"><?php 
                                echo "<td>{$row6['count(BillID)']}</td>";
                             ?></h4>
                            <h5>All Payments</h5>
                                <a class="get_btn" href="Admin-Bill.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <h4 class="counter"><?php 
                                echo "<td>{$row7['count(BillID)']}</td>";
                             ?></h4>
                            <h5>Completed Payments</h5>
                            <a class="get_btn" href="Admin-Bill-Compl.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter_item">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <h4 class="counter"><?php 
                                echo "<td>{$row8['count(BillID)']}</td>";
                             ?></h4>
                            <h5>Pending Payments</h5>
                            <a class="get_btn" href="Admin-Bill-Pending.php" style="margin-top: 10px; font-size: 15px;">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


               <section class="our_project2_area project_grid_three">
           <div class="container">
               <div class="main_c_b_title">
                    <h2>Search<br class="title_br">By ID's</h2>
                </div>

                <form class="nbox" method="REQUEST">
                <center>
                <br>
                <h3>Enter-ID</h3><br>
                <input type=text placeholder="ID" name="tid"><br>
                <input type=radio button name='use' value='buyer' style='margin-left : 0px;'><b style='font-size : 20px;'>  Buyer</b>
                <input type=radio button name='use' value='supplier'><b style='font-size : 20px;'>  Supplier</b>
                <input type=radio button name='use' value='vendor'><b style='font-size : 20px;'>  Vendor</b>
                <input type=radio button name='use' value='order'><b style='font-size : 20px;'>  Order</b>
                <input type=radio button name='use' value='bill'><b style='font-size : 20px;'>  Bill</b>
                <input type=radio button name='use' value='ad'><b style='font-size : 20px;'>  Advertisement</b>
                <br><br>
                <button class='button' type='submit' name='sub1' style='margin-right: -30px;'><span>Proceed</span></button>
                <button class='button' type='reset' name='res'><span>Clear</span></button>
                </center>

                </form>
                </div>
           </div>
        </section>

         <section class="our_project2_area our_project_three_column">
            <div class="main_c_b_title">
                <h2>Recently Added<br class="title_br">Advertisements</h2>
            </div>
            <div class="our_project_details">
                <div class="col-md-4 col-sm-6 building isolation interior">
                    <div class="project_item">
                        <img src="img/project/project-three-column/project-three-1.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <?php
                                    $rows=mysqli_num_rows($resd1);
                                    if($rows>0)
                                    {
                                    echo"
                                    <h4>Advertisement Name : "; echo "{$row9['AdvertisementName']}"; ?></h4>
                                    <p><?php 
                                echo "{$row9['Details']}";
                                echo "<br>";
                                $id="{$row9['AdvertisementID']}";
                                echo "<br>";
                                echo "<a class='view_btn' href='Admin-Advertisement-Dynamic.php?Aid=$id'>View Advertisement</a>";
                            }
                                else if($rows<=0)
                                {
                                 echo "
                                 <center>
                                 <br>
                                 <h4>NO DATA FOUND</h4>
                                 </center>";
                                }

                             ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 building isolation tiling design">
                    <div class="project_item">
                        <img src="img/project/project-three-column/project-three-2.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                   <?php
                                    $rows=mysqli_num_rows($resd2);
                                    if($rows>0)
                                    {
                                    echo"
                                    <h4>Advertisement Name : "; echo "{$row10['AdvertisementName']}"; ?></h4>
                                    <p><?php 
                                echo "{$row10['Details']}";
                                echo "<br>";
                                $id="{$row10['AdvertisementID']}";
                                echo "<br>";
                                echo "<a class='view_btn' href='Admin-Advertisement-Dynamic.php?Aid=$id'>View Advertisement</a>";
                            }
                                else if($rows<=0)
                                {
                                 echo "
                                 <center>
                                 <br>
                                 <h4>NO DATA FOUND</h4>
                                 </center>";
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 isolation tiling interior design plumbing">
                    <div class="project_item">
                        <img src="img/project/project-three-column/project-three-3.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <?php
                                    $rows=mysqli_num_rows($resd3);
                                    if($rows>0)
                                    {
                                    echo"
                                    <h4>Advertisement Name : "; echo "{$row11['AdvertisementName']}"; ?></h4>
                                    <p><?php 
                                echo "{$row11['Details']}";
                                echo "<br>";
                                $id="{$row11['AdvertisementID']}";
                                echo "<br>";
                                echo "<a class='view_btn' href='Admin-Advertisement-Dynamic.php?Aid=$id'>View Advertisement</a>";
                            }
                                else if($rows<=0)
                                {
                                 echo "
                                 <center>
                                 <br>
                                 <h4>NO DATA FOUND</h4>
                                 </center>";
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="our_project2_area our_project_three_column">
            <div class="main_c_b_title">
                <h2>Recent<br class="title_br">Orders</h2>
            </div>
        </section>

        <section class="preconstruction_area">
            <div class="row pre_construction_inner">
                <div class="col-md-6">
                    <div class="pre_construction_item">
                        <img src="img/pre-cons-left.jpg" alt="">
                        <div class="pre_hover">
                            <?php 
                            $rows=mysqli_num_rows($resd4);
                            if($rows>0)
                            {
                                echo "
                            <h4>Order No. : "; echo "<td>{$row12['OrderID']}</td>"; echo "</h4>
                            <p>"; echo "<td>{$row12['Details']}</td>"; echo "</p>
                            "; $id="{$row12['OrderID']}";
                            echo "</p><a class='slider_btn' href='Admin-Order-Dynamic.php?aOid=$id'>Read Details</a>
                        </div>
                    </div>
                </div>
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

               <div class="col-md-6">
                    <div class="pre_construction_item">
                        <img src="img/pre-cons-left.jpg" alt="">
                        <div class="pre_hover">
                            <?php 
                            $rows=mysqli_num_rows($resd5);
                            if($rows>0)
                            {
                                echo "
                            <h4>Order No. : "; echo "<td>{$row13['OrderID']}</td>"; echo "</h4>
                            <p>"; echo "<td>{$row13['Details']}</td>"; echo "</p>
                            "; $id="{$row13['OrderID']}";
                            echo "</p><a class='slider_btn' href='Admin-Order-Dynamic.php?aOid=$id'>Read Details</a>
                        </div>
                    </div>
                </div>
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
        </section>

    <section class="our_project2_area our_project_three_column">
            <div class="main_c_b_title">
                <h2>Recent<br class="title_br">Bills</h2>
            </div>
        </section>

        <section class="preconstruction_area">
            <div class="row pre_construction_inner">
                <div class="col-md-6">
                    <div class="pre_construction_item">
                        <img src="img/pre-cons-left.jpg" alt="">
                        <div class="pre_hover">
                            <?php 
                            $rows=mysqli_num_rows($resd1);
                            if($rows>0)
                            {
                                echo "
                            <h4>Bill No. : "; echo "<td>{$row14['BillID']}</td>"; echo "</h4>
                            <p>"; echo "<td>{$row14['Details']}</td>"; echo "</p>
                            "; $id="{$row14['BillID']}";
                            echo "</p><a class='slider_btn' href='Admin-Bill-Dynamic.php?aBid=$id'>Read Details</a>
                        </div>
                    </div>
                </div>
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

               <div class="col-md-6">
                    <div class="pre_construction_item">
                        <img src="img/pre-cons-left.jpg" alt="">
                        <div class="pre_hover">
                            <?php 
                            $rows=mysqli_num_rows($resd2);
                            if($rows>0)
                            {
                                echo "
                            <h4>Bill No. : "; echo "<td>{$row15['BillID']}</td>"; echo "</h4>
                            <p>"; echo "<td>{$row15['Details']}</td>"; echo "</p>
                            "; $id="{$row15['BillID']}";
                            echo "</p><a class='slider_btn' href='Admin-Bill-Dynamic.php?aBid=$id'>Read Details</a>
                        </div>
                    </div>
                </div>
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
        </section>

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