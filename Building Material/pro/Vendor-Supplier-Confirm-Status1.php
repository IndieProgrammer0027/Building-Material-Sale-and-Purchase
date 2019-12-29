<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];
  $sid=$_SESSION['sta2'];
  $oid=$_SESSION['id11'];

  $sql= "UPDATE orders SET SupplierID=$sid WHERE OrderID=$oid";
  if(mysqli_query($con,$sql))
  {
  	$sql1="UPDATE bill set SupplierID=$sid WHERE OrderID=$oid";
  	$res=mysqli_query($con,$sql1);

  	$sql2="UPDATE supplier set SupplierStatus='Occupied' where SupplierID=$sid";
  	$res1=mysqli_query($con,$sql2);
  }
  else
  {
  	echo "error";
  }
  header("location:  Vendor-Order-Pending.php");
  ?>