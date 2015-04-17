

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>WallScroll - Login</title>
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

<div class="content">

<!-----------headings------>

<p class="heading">
Please Login:
</p>
<br>


<!----login form and passing registration hidden info----------->

<form method="POST" action="logincheck.php" id="form">
Username: </br>
<input type="text" name="loginName" placeholder="Enter Username" maxlength="10"/> </br>
Password:</br>
<input type="password" name="loginPass" placeholder="Enter Password" maxlength="16"/>
<input type="hidden" name="userName" value="<?php echo $_POST['userName']; ?>">
<input type="hidden" name="passWord" value="<?php echo $_POST['passWord']; ?>">
<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
<br><br>
<input type="submit" name="login" class="submit">
<a href="index.php">Create an account</a>
</form>


</div>

</body>
</html>