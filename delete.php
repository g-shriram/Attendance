<?php 
include('dbconnect.php');
$nid=$_GET['id'];
$n= $_COOKIE['cname'];
$q=mysqli_query($conn,"delete from  $n where rollno='$nid'");


$aq="select * from class where Name='$n'";
			
			$res=mysqli_query($conn,$aq) or die("wrong query");
			
			$row1=mysqli_fetch_assoc($res);
			
$t=intval($row1['scount'])-1;
 $res=mysqli_query($conn,"UPDATE class SET scount ='$t'  WHERE Name = '$n'");


header('location:viewattendance.php');



?>