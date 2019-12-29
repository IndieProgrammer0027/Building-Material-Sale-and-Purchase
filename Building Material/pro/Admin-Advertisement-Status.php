<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];
  $aaid=$_SESSION['ad3'];
  $status=$_POST['ad'];

  if($_POST['ad']=='Active')
  {
  	$sql="update advertisement set advertisement.AdStatus='Active' where advertisement.AdvertisementID='$aaid'";
  	$res=mysqli_query($con,$sql);
    unset($_SESSION['ad3']);
  	if(!(mysqli_query($con,$sql)))
  	{
  		echo "error";
  	}
    else
    {
      header("location:  Admin-Advertisement-Enabled.php");
    }
  }
  else if($_POST['ad']=='DeActive')
  {
  	$sql="update advertisement set advertisement.AdStatus='DeActive' where advertisement.AdvertisementID='$aaid'";
  	$res=mysqli_query($con,$sql);
    unset($_SESSION['ad3']);
  	if(!(mysqli_query($con,$sql)))
  	{
  		echo "error";
  	}
    else
    {
      header("location:  Admin-Advertisement-Disabled.php");
    }
  }
  else if($_POST['ad']=='AdminDeActive')
  {
    $sql="update advertisement set advertisement.AdStatus='AdminDeActive' where advertisement.AdvertisementID='$aaid'";
    $res=mysqli_query($con,$sql);
    unset($_SESSION['ad3']);
    if(!(mysqli_query($con,$sql)))
    {
      echo "error";
    }
    else
    {
      header("location:  Admin-Advertisement-ADisabled.php");
    }
  }


  ?>