<?php
// Start the session
session_start();

$usersession = $_SESSION['usersession'];


/*session_register("user");
session_register("pass");*/
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>WallScroll - Edit Profile</title>
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
	
/*---select data from database---*/
	$result = mysql_query("SELECT * FROM wallmembers WHERE username = '$usersession' ");

/* database variables */	
 $email = 'email';
 $name = 'name';
 $gender = 'gender';
 $website = 'website';
 $zip = 'zip';
 $about = 'about';
 $books = 'books';
 $music = 'music';
 
 /* grab data from associated db */	
 $rows = mysql_fetch_assoc($result);
?>
<div class="navlogout">
<form method="post" name="logout" class="logout" action="logout.php">
    	<input type="submit" name="logoutbutton" class="logoutbutton" value="log out"/>
        </form>
</div>
        
<div class="content">

<!-------headings------>

<p class="heading">Enter Profile Information:</p>
<br>

<!-----Form to enter profile information----------->

<form method="POST"  action="profilecheck.php" id="form"> 
Name:<br>
<input type="text" name="name" maxlength="15" value="<?php echo $rows[$name]; ?>">*Required
<br><br>
Email:<br>
<input type="email" name="email" value="<?php echo $rows[$email]; ?>">
<br><br>
Select Gender:&nbsp;
<br>
<input type="radio" name="gender" value="male<?php echo $rows[$gender]; ?>" >Male<br>
<input type="radio" name="gender" value="female<?php echo $rows[$gender]; ?>">Female<br>
<br>
Website URL:<br>
<input type="url" name="url" value="<?php echo $rows[$website]; ?>">*Required
<br><br>
Zip Code:&nbsp;<br>
<input type="text" name="zip" placeholder="Enter 5 digit zip" value="<?php echo $rows[$zip]; ?>" maxlength="5"/>
<br><br>
About Me:<br>
<textarea name="about" rows="5" cols="20" maxlength="250"><?php echo $rows[$about]; ?></textarea>*Required
<br><br>
Favorite Books:<br>
<textarea name="books" rows="5" cols="20" maxlength="250"><?php echo $rows[$books]; ?></textarea>
<br><br>
Favorite Music:<br>
<textarea name="music" rows="5" cols="20" maxlength="250"><?php echo $rows[$music]; ?></textarea>
<br><br>
<input type="submit" name="submitInfo" class="submit">

<!--<form method="POST" action="profile.php">
<input type="hidden" name="name" value="?php $_POST['name']; ?>">
<input type="hidden" name="email" value="?php  $_POST['email']; ?>">
<input type="hidden" name="gender" value="?php  $_POST['gender']; ?>">
<input type="hidden" name="ur" value="?php  $_POST['url']; ?>">
<input type="hidden" name="zip" value="?php $_POST['zip']; ?>">
<input type="hidden" name="about" value="?php  $_POST['about']; ?>">
<input type="hidden" name="books" value="?php $_POST['books']; ?>">
<input type="hidden" name="music" value="?php  $_POST['music']; ?>">
</form>-->

</div>
</body>

</html>