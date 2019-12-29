<?php
	session_start();
	$con = mysqli_connect("localhost","root","");
	if(!$con){
		 die ('could not connect'.mysql_error());
	}

	mysqli_select_db($con,"practicum");
	$user = $_SESSION['Username'];
	$Aid = $_SESSION['ad1'];
	
	if(isset($_POST['sub10'])){
		$quan = $_POST['quantity'];
		$sad = $_POST['sad'];
		
		//Details Query
		$ql = "SELECT products.Details from products INNER JOIN advertisement on advertisement.AdvertisementID=products.AdvertisementID WHERE advertisement.AdvertisementID=$Aid";
		$row = mysqli_query($con,$ql);
		$result1 = mysqli_fetch_assoc($row);
		$details = $result1['Details'];
		
		//Vendor Id
		$ql1 = "select vendor.VendorID  from vendor inner join advertisement on advertisement.VendorID=vendor.VendorID where advertisement.AdvertisementID=$Aid";
		$row1 = mysqli_query($con,$ql1);
		$result2 = mysqli_fetch_assoc($row1);
		$vendorId = $result2['VendorID'];
		
		//Admin Id
		$ql2 = "SELECT AdminID from admin where AdminName = 'Sheraz'";
		$row2 = mysqli_query($con,$ql2);
		$result3 = mysqli_fetch_assoc($row2);
		$adminId = $result3['AdminID'];
		
		//Buyer ID
		$ql3 = "SELECT BuyerID from buyer where UserName = '$user'";
		$row3 = mysqli_query($con,$ql3);
		$result4 = mysqli_fetch_assoc($row3);
		$buyerId = $result4['BuyerID'];
		
		//product ID
		$ql4 = "SELECT p.ProductID from products p inner join advertisement a ON a.AdvertisementID = p.AdvertisementID where a.AdvertisementID = '$Aid'";
		$row4 = mysqli_query($con,$ql4);
		$result5 = mysqli_fetch_assoc($row4);
		$productId = $result5['ProductID'];
		
		$_SESSION['ad2'] = $Aid;
		$_SESSION['buyer'] = $buyerId;
		$_SESSION['admin'] = $adminId;
		$_SESSION['vendor'] = $vendorId;
		$_SESSION['product'] = $productId;
		$_SESSION['quan'] = $quan;
		$_SESSION['det'] = $details;
		
		//Insert data
		$q5 = "Insert Into orders (TproductQuantity,Details,OrderTimeDate,VendorID,AdminID,BuyerID,OrderStatus,AdvertisementID,ProductID,shipmentAd) VALUES('$quan','$details',now(),'$vendorId','$adminId','$buyerId','Pending','$Aid','$productId','$sad')";
		
		
	} 
	 if(mysqli_query($con,$q5))
  {
    echo'<script>window.location.replace("Buyer-Show-Bill.php");</script>';
  }
  else if(!mysqli_query($con,$q5))
  {
    die('Error: ' . mysqli_error($con));
  }
 
mysqli_close($con);


	

?>
