<?php

session_start();
$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];
  $ID1=$_SESSION['id1'];
  $use=$_SESSION['use'];
  $value=$_SESSION['adon1'];

  echo $ID1;
  echo $use;
  echo $value;
  if($use=='vendor')
  {
  	if($value=='Activate')
  	{
  		$sql="update vendor set Accounttag='0' where VendorID=$ID1";
  		$res=mysqli_query($con,$sql);
	}
	else if($value=='DeActivate')
	{
		$sql="update vendor set Accounttag='1' where VendorID=$ID1";
  		$res=mysqli_query($con,$sql);
	}
	else if($value=='Delete')
	{
      $sql1="update bill set VendorID=NULL where VendorID = $ID1";
      $res2=mysqli_query($con,$sql1);
      $sql1="update orders set VendorID=NULL where VendorID = $ID1";
      $res2=mysqli_query($con,$sql1);
      $sql1="update advertisement set VendorID=NULL where VendorID = $ID1";
      $res2=mysqli_query($con,$sql1);
      $sql1="update products set VendorID=NULL where VendorID = $ID1";
      $res2=mysqli_query($con,$sql1);
		  $sql="delete from vendor where VendorID = $ID1";
  		$res=mysqli_query($con,$sql);
	}
 }
 else if($use=='buyer')
  {
  	if($value=='Activate')
  	{
  		$sql="update buyer set Accounttag='0' where BuyerID=$ID1";
  		$res=mysqli_query($con,$sql);
	}
		else if($value=='DeActivate')
	{
		$sql="update buyer set Accounttag='1' where BuyerID=$ID1";
  		$res=mysqli_query($con,$sql);
	}
	else if($value=='Delete')
	{
      $sql1="update bill set BuyerID=NULL where BuyerID = $ID1";
      $res2=mysqli_query($con,$sql1);
      $sql1="update order set BuyerID=NULL where BuyerID = $ID1";
      $res2=mysqli_query($con,$sql1);
	   	$sql="delete from buyer where BuyerID = $ID1";
  		$res=mysqli_query($con,$sql);
	}
 }
  else if($use=='supplier')
  {
  	if($value=='Activate')
  	{
  		$sql="update supplier set Accounttag='0' where SupplierID=$ID1";
  		$res=mysqli_query($con,$sql);
	}
		else if($value=='DeActivate')
	{
		$sql="update supplier set Accounttag='1' where SupplierID = $ID1";
  	$res=mysqli_query($con,$sql);
	}
	else if($value=='Delete')
	{
      $sql1="update bill set SupplierID=NULL where SupplierID = $ID1";
      $res2=mysqli_query($con,$sql1);
      $sql1="update order set SupplierID=NULL where SupplierID = $ID1";
      $res2=mysqli_query($con,$sql1);

		$sql="delete from supplier where SupplierID = $ID1";
  		$res=mysqli_query($con,$sql);
	}
 }

 ?>