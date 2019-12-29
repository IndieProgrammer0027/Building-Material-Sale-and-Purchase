<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];
  $aid=$_SESSION['ad2'];
  $status=$_POST['ad'];

  echo $status;

  if($status=='Active')
  {
  	$sql="update advertisement set AdStatus='Active' where AdvertisementID='$aid'";

  	if(!(mysqli_query($con,$sql)))
  	{
  		echo "error";
  	}
    else
    {
      unset($_SESSION['ad2']);
      header("location:  Vendor-Enabled-Advertisements.php");
    }
  }
  else if($status=='DeActive')
  {
  	$sql="update advertisement set AdStatus='DeActive' where AdvertisementID='$aid'";

  	if(!(mysqli_query($con,$sql)))
  	{
  		echo "error";
  	}
    else
    {
      unset($_SESSION['ad2']);
      header("location:  Vendor-Disabled-Advertisements.php");
    }
  }

  ?>