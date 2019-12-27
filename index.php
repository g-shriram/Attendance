<?php 
session_start();
include('dbconnect.php');
$admin= $_SESSION['user'];
if($admin=="")
{
header('location:login.php');
}
$q="select * from teacher where username='$admin'";
			
			$res=mysqli_query($conn,$q) or die("wrong query");
			
			$row=mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
  div.info{
   
   float:left;
   width:40%;
   }
   
   div.icon{
   width:40%;
   float:right;
  }
  img{
  border-radius:50%;}
  </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Online Attendance Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Welcome <?php echo $row['Name'];?> !</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           
            <li><a href="logout.php">Logout</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
			<!-- find users' image if image not found then show dummy image -->
			
			
           <br><br><br><br>
			
			
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-user"></span> Dashboard </a></li>
			<li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Update Password</a></li>
            <li><a href="index.php?page=cclass"><span class="glyphicon glyphicon-user"></span> Create a class</a></li>
			 <li><a href="index.php?page=attendance"><span class="glyphicon glyphicon-envelope"></span>Attendance</a></li>
            
          </ul>
         
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
		  <?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
		  	if($page=="cclass")
			{
				include('cclass.php');
			
			}
			
			if($page=="update_password")
			{
				include('update_password.php');
			
			}
			
			if($page=="attendance")
			{
				include('attendance.php');
			
			}
			
				
			
		  }
		  
		  else
		  {
		  ?>
		  <!-- container end-->
		  
		  
		<div class="info">
		  
		 <h1><font color="#FF6600" face="Times New Roman, Times, serif"> Welcome</font><font face="Georgia, Times New Roman, Times, serif" color="#660099" > <?php echo $row['Name'];?> !</h1></font>
		 <ul>
	<font face="Verdana, Arial, Helvetica, sans-serif"	size=+2 color="#FF9999" ><li>You can create a multiple classes...</li>
		  <li>You can manage the classes...</li>
		 		 <li>You can maintain a class Attendance...</li>
				 		 <li>You can manage class students...</li>
		 </ul>
         </div>
		 
		 <div class="icon">
		 <img src="assets/icon.jpg" width=300px height="382px">
		 </div>
		 
		 </div>
		  
		  <?php } ?>
		  

         
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
