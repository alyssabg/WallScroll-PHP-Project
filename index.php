
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>WallScroll-Home</title>
</head>
<link rel="stylesheet" type="text/css" href="css/wallscroll.css">
<body>
<?php

/*-----Connect to Database--------*/
	$username = "vi930844";
	$password = "Elijah4/27";
	$hostname = "sulley.cah.ucf.edu";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die ("<p id='echo'>"."Could Not Connect"."</p>");
	$selected = mysql_select_db("vi930844", $dbhandle);
	
?>

<!-------headings------>

<div class="content">
	<p class="heading">Welcome to WallScroll!</p><br>
		<p class="heading2">Please Create an Account.</p>
	<br>


<!-------------User Registration Form--------->

<form method="POST" action= "registercheck.php" id="form">
Username:</br>
<input type = "text" name="userName" placeholder="Create Username"  maxlength="10" class="username">*Required
</br>
4-10 characters
<br>
<br>
Password: </br>
<input type="password" name="passWord" placeholder="Create Password"  maxlength="16"  class="password">*Required
</br>
6-16 characters
<br>
<br>
Email: </br>
<input type="email" name="email" placeholder="Enter Email" class="email">*Required
<br>
<br>
<input type="submit" name="register" class="submit"> 
Already have an account? <a href="login.php">login</a>

</form>


</div>			


</body>
</html>