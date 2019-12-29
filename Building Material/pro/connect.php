<?php 
error_reporting(0);
    $host = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "practicum"; 


	$con = mysqli_connect($host,$username,$password,$dbname);	




if(!$con)
    echo "connection error ".mysqli_connect_error();
?>