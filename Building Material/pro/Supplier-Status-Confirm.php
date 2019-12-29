<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];
  $sid=$_SESSION['sid'];

  $trigger=0;

  $sql="Select orders.OrderStatus from orders inner join supplier on orders.SupplierID=supplier.SupplierID where supplier.SupplierID=$sid";
  $res=mysqli_query($con,$sql);
  $rows=mysqli_num_rows($res);

  while($rows>0)
  {
    while($row3=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
    	$stat="{$row3['OrderStatus']}";
    	if($stat=="Pending")
    	{
    		$trigger=1;
    	}
    }
    $rows--;
}
if($trigger==0)
{
	$sql1="UPDATE supplier set SupplierStatus='Available' where SupplierID=$sid";
  	$res1=mysqli_query($con,$sql1);
}
else
{
	echo"<script>alert('You Have Orders That Needs to be Completed. Contact Vendor .');</script>";
}
	echo'<script>window.location.replace("Supplier-Orders.php");</script>';

?>