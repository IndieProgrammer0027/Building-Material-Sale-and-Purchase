<?php

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

  $user=$_SESSION['Username'];

$Uname=$_POST['uname'];
$Password=$_POST['pass'];
$Name=$_POST['name'];
$Mship=$_POST['mship'];

if(isset($_POST['sub']))
 {   
	$sql="update vendor set Membership='$Mship' where UserName='$Uname'";
	$sel=mysqli_query($con,$sql);
	echo "task done";
}
?>