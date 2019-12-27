<?php 

$tname= $_SESSION['user'];
$q=mysqli_query($conn,"select * from class WHERE tname='$tname'");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any  class exists !!!</h2>";
}
else
{
?>
<script>
	function DeleteUser(id)
	{
		if(confirm("You want to delete the class " + id+" ?"))
		{
		window.location.href="delete_user.php?id="+id;
		}
	}
	function aattendance(name)
	{
		
		window.location.href="forwarding.php?name="+name;

	}
	function vattendance(name)
	{
		
		window.location.href="forwarding1.php?name="+name;

	}
</script>
<h2 style="color:#00FFCC">All Classes</h2>

<table class="table table-bordered">
	<Tr class="success">
		<th>Sr.No</th>
		<th>Class Name</th>
		<th>No of students</th>
		<th>No of class</th><th></th><th></th>
		<th>Delete</th>
	</Tr>
		<?php 



while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$row['id']."</td>";?>
<Td><span><?php echo $row['Name'];?></span></td>
<?php
echo "<td>".$row['scount']."</td>";
echo "<td>".$row['tcount']."</td>";
?>
<Td><a href="javascript:aattendance('<?php echo $row['Name']; ?>')" style='color:green'><span><font color="#663399" >View</font></span></a></td>
<Td><a href="javascript:vattendance('<?php echo $row['Name']; ?>')" style='color:green'><span><font color="#663399" >Add</font></span></a></td>
<Td><a href="javascript:DeleteUser('<?php echo $row['Name']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>

<?php
echo "</Tr>";
}
		?>
		
</table>
<?php }?>