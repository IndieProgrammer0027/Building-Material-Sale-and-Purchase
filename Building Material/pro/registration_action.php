<?php

include"connect.php";

$Uname=$_POST['uname'];
$Password=$_POST['pass'];
$Name=$_POST['name'];
$phone=$_POST['phone'];
$User=$_POST['user'];
$Mship=$_POST['mship'];
$vsname=$_POST['shopname'];
$Email=$_POST['email'];
$Address=$_POST['address'];

   $id="select AdminID from admin";
   $res=mysqli_query($con,$id);
   $row=mysqli_fetch_assoc($res);
   $aid="{$row['AdminID']}";


if(isset($_POST['sub']))
 {   
  if($_POST['user']=='vendor')  
   {     
    echo "Hey!You have presses Vendor Button. ";    
 $sql="INSERT INTO vendor (VendorName,VendorShopName,Email,PhoneNo,UserName,Vpassword,Membership,Address,Accounttag,AdminID) VALUES ('$Name','$vsname','$Email','$phone','$Uname','$Password','$Mship','$Address',0,'$aid')";

    echo "Task Completed";
  }

  else if($_POST['user']=='buyer')
  {
    echo "Hey! You have presses Buyer Button. ";
    $sql="INSERT INTO buyer (BuyerName,Address,PhoneNumber,Email,UserName,Bpassword,Accounttag,AdminID) VALUES ('$Name','$Address','$phone','$Email','$Uname','$Password',0,'$aid')";

    echo "Task Completed";
  }

  else if($_POST['user']=='supplier')
  {
    echo "Hey! You have presses Supplier Button. ";
    $sql="INSERT INTO supplier (SupplierName,Address,PhoneNumber,Email,UserName,Spassword,Accounttag,AdminID,SupplierStatus) VALUES ('$Name','$Address','$phone','$Email','$Uname','$Password',0,'$aid','Available')";

    echo "Task Completed";
  }
}
  
  if(mysqli_query($con,$sql))
  {
    echo'<script>window.location.replace("LoginPage.php");</script>';
  }
  else if(!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
 
mysqli_close($con)

?>