<?php

session_start();
$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];
  $ID=$_SESSION['id1'];
  $use=$_SESSION['use'];
  $value=$_SESSION['ran3'];

  if($use=='order')
  {
  	if($value=='Completed')
  	{
  		$sql="update orders set OrderStatus='Completed' where OrderID=$ID";
  		$res=mysqli_query($con,$sql);
	}
	else if($value=='Pending')
	{
		$sql="update orders set OrderStatus='Pending' where OrderID='$ID'";
  		$res=mysqli_query($con,$sql);
	}
  
  else if($value=='Cancel')
  {
    $sql="update orders set OrderStatus='Canceled' where OrderID='$ID'";
      $res=mysqli_query($con,$sql);
  }
  header("location:  Vendor-Home.php");
 }
 else if($use=='bill')
  {
    if($value=='Completed')
    {
      $sql="update bill set BillStatus='Completed' where BillID=$ID";
      $res=mysqli_query($con,$sql);
  }
  else if($value=='Pending')
  {
    $sql="update bill set BillStatus='Pending' where BillID='$ID'";
      $res=mysqli_query($con,$sql);
  }
  header("location:  Vendor-Home.php");
 }

 ?>