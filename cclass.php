<?php 

$tname= $_SESSION['user'];
require('dbconnect.php');
extract($_POST);
$e="";
if(isset($save))
{

$sql=mysqli_query($conn,"select * from class where Name='$cname'");

$r=mysqli_num_rows($sql);

if($r==true)
{

$err= "<font color='red' size='+2'>This class already exists </font><br><br><font  color='red'>( Try different Class Name)</font>";
}
else
{

$num1=intval($sroll);
$num2=intval($eroll);
$tno=$num2-$num1+1;
$sql = "CREATE TABLE $cname (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
rollno VARCHAR(11) NOT NULL,
count INT(66)
)";

if ($conn->query($sql) === TRUE) {
    $e= "Class created successfully";
	
	$query="insert into class values('','$cname','$tno','0','$tname')";
     mysqli_query($conn,$query);

	while($num1<=$num2)
	{
	 $query="insert into $cname values('','$num1','')";
      mysqli_query($conn,$query);
	  $num1++;
	 }
	
} else {
    $e="<font color='red' size='+2'>Enter vaid class name</font>";
}



}}
?><head>
 <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
</head>
   
<font color="gray" size=+3>
<h2 >Create your Class...</h2><br>
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
					<td>Enter class name:</td>
					<Td><input  type="text"  class="form-control" name="cname" required/></td>
					
				</tr>
				
				
				
				<tr>
					<td>Starting Roll No :</td>
					<Td><input  type="number"  class="form-control" name="sroll" required/></td>
				</tr>
				
				<tr>
					<td>Ending Roll No :</td>
					<Td><input  type="number"  class="form-control" name="eroll" required/></td>
				</tr>
				<
				
				
<Td  align="right">
</Td>
<Td  align="right">
<input type="submit" class="btn btn-success" value="Register" name="save"/>

				
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>