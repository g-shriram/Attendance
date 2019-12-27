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
header('location:index.php');
}

 $t=intval($row1['tcount']);
if(isset($login))
{
 $t=intval($row1['tcount'])+1;
 $res=mysqli_query($conn,"UPDATE class SET Tcount ='$t'  WHERE Name = '$nid'");

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
<script>
	function Delete(id)
	{
		if(confirm("You want to delete the student " + id+" ?"))
		{
		window.location.href="delete.php?id="+id;
		}
	}
	
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Attendance</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class=""><?php echo "<font size=+2>Class : ".$nid."</font>";?></h2><br> <h2 class="" ><?php echo "<font size=+2>Total No Students  : ".$row1['scount']."</font>";?></h2><br> <h2 class="" ><?php echo "<font size=+2>Periods  : ".$t."</font>";?></h2>
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
		<th>Roll No</th>
		<th>No of Present</th>
		<th>No of Absent</th>
		<th>Percentage</th>
		<th>Delete Student</th>
		
	</Tr>
		<?php 

while($row=mysqli_fetch_assoc($q))
{
$abs=intval($t)-intval($row['count']);
if(intval($t)==0)
$per=0;
else
$per=(intval($row['count'])/intval($t))*100;

if($per>=75)
echo "<Tr style=color:green;>";
else
echo "<Tr style=color:red;>";
echo "<td><center>".$row['rollno']."</td>";
echo "<td><center>".$row['count']."</td>";
echo "<td><center>".$abs."</td>";
echo "<td><center>".$per."%</td>";
echo "</center>";
?>
<Td><center><a href="javascript:Delete('<?php echo $row['rollno']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td></Tr>
<?php

}
		?>
		
	
</table>
		
		
           
            
     
            <div class="form-group">
            	<hr />
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" value="login" name="login">Back</button>
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
