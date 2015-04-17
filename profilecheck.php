<?php
// Start the session
session_start();

$usersession = $_SESSION['usersession'];


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>WallScroll - Profile</title>
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
	
	/*variables*/
 $email = $_POST['email'];
 $name = $_POST['name'];
 $gender = $_POST['gender'];
 $website = $_POST['url'];
 $zip = $_POST['zip'];
 $about = $_POST['about'];
 $books = $_POST['books'];
 $music = $_POST['music'];
 
 	
/*---Protect against injections------*/
	$email = stripslashes($email);
	$name = stripslashes($name);
	$gender = stripslashes($gender);
	$website = stripslashes($website);
	$zip = stripslashes($zip);
	$about = stripslashes($about);
	$books = stripslashes($books);
	$music = stripslashes($music);
 

/*insert into database function and user exist check function */

$update= "UPDATE wallmembers SET email = '$email', name= '$name', gender = '$gender', website = '$website', zip = '$zip', about = '$about', books = '$books', music = '$music' WHERE username= '$usersession' ";


/* ----Profile entry validation function - checking required info was submitted - move on to next page -----*/

if(isset($_POST['submitInfo'])){
	if(empty($_POST['name']))
	{
		echo "<p id='echo'>" ."*Name is required";
		include('profile.php');
	}
		else if(empty($_POST['url'])){
			echo "<p id='echo'>" ."*Website URL is required";
			include('profile.php');
		}
			else if (empty($_POST['about'])){
				echo "<p id='echo'>" ."*About Me is required";
				include('profile.php');
			}
			else{
				mysql_query($update);
				include('profilepage.php');
			}
}
	
?>


<!-------Passing profile information through hidden fields--------->

<form method="POST" action="profilepage.php">
<!--<input type="hidden" name="name" value="?php echo $_POST['name']; ?>">
<input type="hidden" name="email" value="?php echo $_POST['email']; ?>">
<input type="hidden" name="gender" value="?php echo $_POST['gender']; ?>">
<input type="hidden" name="ur" value="?php echo $_POST['url']; ?>">
<input type="hidden" name="zip" value="?php echo $_POST['zip']; ?>">
<input type="hidden" name="about" value="?php echo $_POST['about']; ?>">
<input type="hidden" name="books" value="?php echo $_POST['books']; ?>">
<input type="hidden" name="music" value="?php echo $_POST['music']; ?>">-->
</form>
-->

</body>
</html>