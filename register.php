<?php 
require('dbconnect.php');
extract($_POST);
$e="";
if(isset($save))
{

$sql=mysqli_query($conn,"select * from teacher where username='$uname'");

$r=mysqli_num_rows($sql);

if($r==true)
{

$err= "<font color='red' size='+2'>This user already exists </font><br><br><font  color='red'  >( Try different Username)</font>";
}
else
{

$query="insert into teacher values('','$name','$uname','$pass')";
mysqli_query($conn,$query);



$e= "Successfully Registered ...";

}}
?><head>
 <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>
   
<font color="gray" size=+3>
<h2 >Registration...</h2>
</font>
               <font color="blue" size=+3>

<?php

 echo $e; 

?>

</font>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered" align="center" cellpadding = "10">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				
				<tr>
					<td>Enter Your name :</td>
					<Td><input  type="text"  class="form-control" name="name" required/></td>
					
				</tr>
				
				
				
				<tr>
					<td>Choose Your Username :</td>
					<Td><input  type="text"  class="form-control" name="uname" required/></td>
				</tr>
				
				<tr>
					<td>Choose Your Password :</td>
					<Td><input  type="text"  class="form-control" name="pass" required/></td>
				</tr>
				<
				
				
<Td  align="right">
</Td>
<Td  align="right">
<input type="submit" class="btn btn-success" value="Register" name="save"/>
<a href="login.php"><input type="button" class="btn btn-success" value="Login"/ "></a>
				
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>