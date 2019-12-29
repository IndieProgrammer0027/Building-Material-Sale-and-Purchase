<?php 

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    die ('could not connect'.mysql_error());
}
  mysqli_select_db($con,"practicum");

   $user=$_SESSION['Username'];

   $id="select VendorID from vendor where UserName='$user'";
   $res=mysqli_query($con,$id);
   $row=mysqli_fetch_assoc($res);
   $vid="{$row['VendorID']}";


$adname=$_POST['name'];
$adstatus=$_POST['status'];
$descr=$_POST['desc'];
$descr=$_POST['desc'];
$aitem=$_POST['item'];
$iprice=$_POST['price'];
$idesc=$_POST['itdesc'];

   $id3="select AdminID from admin";
   $res2=mysqli_query($con,$id3);
   $row2=mysqli_fetch_assoc($res2);
   $aid="{$row2['AdminID']}";

if(isset($_POST['sub']))
 {   
    echo "Hey!You have presses Vendor Button. ";    
    $sql="INSERT INTO advertisement (AdvertisementName,AdStatus,Details,UploadTimeDate,VendorID,AdminID) VALUES ('$adname','$adstatus','$descr',now(),'$vid','$aid')";
    mysqli_query($con,$sql);

   $id2="SELECT AdvertisementID FROM advertisement ORDER BY AdvertisementID DESC LIMIT 1";
   $res1=mysqli_query($con,$id2);
   $row1=mysqli_fetch_assoc($res1);
   $adid="{$row1['AdvertisementID']}";

    $sql2="Insert into products (ProductName,PriceUnit,Details,VendorID,AdvertisementID) VALUES ('$aitem','$iprice','$idesc','$vid','$adid')";
    $res=mysqli_query($con,$sql2);

    echo "Task Completed";
       echo'<script>window.location.replace("Vendor-Home.php");</script>';
 }
mysqli_close($con);

?>