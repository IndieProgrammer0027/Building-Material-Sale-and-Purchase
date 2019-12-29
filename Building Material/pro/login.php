<?php

session_start();

include "connect.php";
if(isset($_REQUEST['sub']))
{
  $username=$_REQUEST['userName'];
  $pass=$_REQUEST['password'];
  $User=$_REQUEST['user'];

    if($_REQUEST['user']=='admin') 
    { 
     $q="select * from admin where UserName='$username' and Apassword='$pass'";
     $qr=mysqli_query($con,$q);

      if(mysqli_num_rows($qr)>0)
      {
       $_SESSION['Username']=$username;
      header("location:  Admin-Main.php");
      }
      else
      {
        echo"<script>alert('Admin UserName OR Password was wrong');</script>";
      }
    }
   if($_REQUEST['user']=='buyer') 
   { 
     $q="select * from buyer where UserName='$username' and Bpassword='$pass'";
     $qr=mysqli_query($con,$q);

      if(mysqli_num_rows($qr)>0)
      {
        $_SESSION['Username']=$username;
       header("location:  Buyer-Main.php");
    
      }
      else
      {
        echo"<script>alert('Buyer UserName OR Password was wrong');</script>";
      }
    }
    if($_REQUEST['user']=='vendor') 
    { 
      $q="select * from vendor where UserName='$username' and Vpassword='$pass'";
      $qr=mysqli_query($con,$q);
      if(mysqli_num_rows($qr)>0)
      {
        $_SESSION['Username']=$username;
        header("location:  Vendor-Home.php");
      }
      else
      {
        echo"<script>alert('Vendor UserName OR Password was wrong');</script>";
      }
    }
    if($_REQUEST['user']=='supplier') 
    {  
      $q="select * from supplier where UserName='$username' and Spassword='$pass'";
      $qr=mysqli_query($con,$q);

      if(mysqli_num_rows($qr)>0)
      {
        $_SESSION['Username']=$username;
        header("location:  Supplier-Main.php");
    
      }
     else
    {
       echo"<script>alert('Supplier UserName OR Password was wrong');</script>";
      }
    }
  }

?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<style>
		body, html {
  height: 100%;
  font-family: lucida calligraphy;
}

* {
  box-sizing: border-box;
}

.bg-img {

  background-image: url("Bm2.jpeg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 900px;
  width : 1800px
}


.signinbox {
	color: #b4cddf; 
	position: absolute;
	margin-top: 100px;
	margin-left: 500px;
  max-width: 400px;
  padding: 16px;
  background-color: #35444f;
  border-radius: 12px;

}



input[type = text] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #b2ddff;
}

input[type = password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #b2ddff;
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
  	padding: 10px;
  	width: 100px;
  	transition: all 0.5s;
  	cursor: pointer;
  	margin: 2px;
    margin-left: 39px;
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
	<center>
	<h1 style="background-color: #35444f"><font style="color:  #b4cddf">Login</font></h1>
  <hr>
	</center>
	<div class="bg-img">
 	<form class="signinbox" method="POST">
	<b>User Name</b>
	<input type="text" placeholder="Enter User Name" name="userName"><br>
	<b>Password</b>
	<input type="password" placeholder="Password" name="password"><br>
	
	<br>	

	<input type=radio name="user" value="admin">Admin
	<input type=radio name="user" value="buyer">Buyer
	<input type=radio name="user" value="vendor">Vender
	<input type=radio name="user" value="supplier">Supplier

	<br><br><br>

	    <button class="button" type="submit" name="sub"><span>Proceed</span></button>
      <button class="button" type="reset" name="res"><span>Reset</span></button>

	</form>

</br>
<br>

</br>


</body>
</html>
