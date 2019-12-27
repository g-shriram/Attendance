<?php

setcookie(cname, $_GET['name'], time() + (86400 * 30), "/");
				header('location:addattendance.php');
				
				
?>