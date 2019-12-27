<?php 
include('dbconnect.php');
$nid=$_GET['id'];

$q=mysqli_query($conn,"delete from class where Name='$nid'");
$q=mysqli_query($conn,"DROP TABLE $nid");

header('location:index.php?page=attendance');

?>