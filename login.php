<?php
	include('dbconnect.php');
	session_start();
	extract($_POST);
	
	if(isset($login))
	{
		$que=mysqli_query($conn,"select * from teacher where username='$uname' and password='$pass'");
		$row=mysqli_num_rows($que);
		if($row)
			{	
				$_SESSION['user']=$uname;
				header('location:index.php');
			}
		else
			{
				$err="Incorrect Credentials, Try again...";
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign In.</h2>
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
        
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	 <input class="form-control" name="uname" type="text" autofocus required placeholder="Username">
                </div>
                <span class="text-danger"></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	                                    <input class="form-control" placeholder="Password" name="pass" type="password" required>

                </div>
                <span class="text-danger"></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" value="login" name="login">Sign In</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="register.php">Sign Up Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
