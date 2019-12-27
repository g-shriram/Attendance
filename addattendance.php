<?php 

include('dbconnect.php');
$nid= $_COOKIE['cname'];
extract($_POST);
$q=mysqli_query($conn,"select * from $nid ");


$aq="select * from class where Name='$nid'";
			
			$res=mysqli_query($conn,$aq) or die("wrong query");
			
			$row1=mysqli_fetch_assoc($res);
			


if(isset($login))
{
 $t=intval($row1['tcount'])+1;
 $res=mysqli_query($conn,"UPDATE class SET tcount ='$t'  WHERE Name = '$nid'");

 while($row=mysqli_fetch_assoc($q))
{
 $a='a'.$row['rollno'];
  if($_POST[$a])
 {
   $t=intval($row['count'])+1;
 $res=mysqli_query($conn,"UPDATE $nid SET count ='$t'  WHERE rollno = '$row[rollno]'");
   }
  }
 header('location:index.php?page=addattendance');

 }
 
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add your Attendance</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class=""><?php echo "<font size=+2>Class : ".$nid."</font>";?></h2> <h2 class="" align="right"><?php echo "<font size=+2>Total  : ".$row1['scount']."</font>";?></h2>
				<?php
			if ( isset($err) ) {
				
				?>
            </div><div class="alert alert-danger">
			
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $err; ?>
                </div>
				<?php }?>
        	<div class="form-group">
            	<hr />
            </div>
        
		<table class="table table-bordered"><center>
	<Tr class="success">
		<th><center>Roll No</th>
		<th><center>Present</th>
		<th><center>Absent</th>
	</Tr>
		<?php 

while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td><center>".$row['rollno']."</td>";
echo "<td><center><input type=radio name=a$row[rollno] value=1 checked></td>";
echo "<td><center><input type=radio name=a$row[rollno] value=0 ></td>";
echo "</center></Tr>";

}
		?>
		
</table>
		
		
           
            
     
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" value="login" name="login">Submit</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
   
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
