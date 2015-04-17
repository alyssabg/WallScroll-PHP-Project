<?php
// Start the session

session_start();
$usersession = $_SESSION['usersession'] ;


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>WallScroll - Feed</title>
</head>
<link rel="stylesheet" type="text/css" href="css/wallscroll.css">

<body>

<form method="POST" name="logout" class="logout" action="logout.php">
    	<input type="submit" name="logoutbutton" class="logoutbutton" value="log out"/>
        </form>

<p id="green"><a href="users.php">View WallScroll Members</a></p>
<p id="green"><a href="feed.php">News Feed</a></p>
<p id="green"><a href="profilepage.php">Profile</a>


<?php

/*-----Connect to Database--------*/
	$username = "vi930844";
	$password = "Elijah4/27";
	$hostname = "sulley.cah.ucf.edu";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die ("<p id='echo'>"."Could Not Connect"."</p>");
	$selected = mysql_select_db("vi930844", $dbhandle);
	

/*----Grab member from url----*/

$url = $_SERVER['REQUEST_URI'] ;
$uservar = parse_url($url);
/*print_r($uservar);*/

$query = array();
parse_str($uservar['query'], $query);
/*print_r($query);
*/
$member = $_GET['user'];
echo "<p id='green'>" . $member . "</p>";

echo "<p id='green'>" . $url . "</p>";

/*---select data from database---*/
	$result = mysql_query("SELECT * FROM wallmembers WHERE username = '$member' ");
	
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
 
  /* echo out html divs & classes*/	
 		echo '<div class="content">';
		echo '<p class="heading">'.$rows[$name].'<br>'.'</p>';
		
		echo '<p class="heading2">'.'Here is your BookFace Page:'.'</p>'.'<br>';
		
		echo '<div id="form">';
		echo '<div id="profileinfo">';
		
/* echo row data from table*/
		echo '<strong>' . 'Name: '. "</strong>" . $rows[$name].'<br>' .'<br>';
		echo '<strong>' . 'Email: '. "</strong>" . $rows[$email].'<br>' .'<br>';
		echo '<strong>' . 'Gender: '. "</strong>" . $rows[$gender].'<br>' .'<br>';
		echo '<strong>' . 'Website Url: '. "</strong>" . $rows[$website].'<br>' .'<br>';
		echo '<strong>' . 'Zip Code: '. "</strong>" . $rows[$zip].'<br>' .'<br>';
		echo '<strong>' . 'About Me: '. "</strong>" . $rows[$about].'<br>' .'<br>';
		echo '<strong>' . 'My Books: '. "</strong>" . $rows[$books].'<br>' .'<br>';
		echo '<strong>' . 'My Music: '. "</strong>" . $rows[$music].'<br>' .'<br>';
		echo '</div>';
		echo '</div>';
		echo "<form method='POST' action='profile.php'>";
		echo "<input type='submit' name='Edit' value='Edit' class='submit'>";
		echo "</form>";

		
		echo "<br>";
		echo "<br>";

 




echo '</div>';
/*$getprofile= mysql_query("SELECT * FROM wallmembers WHERE username = $usersession");
while($postprofile = mysql_fetch_assoc($getprofile)){
	
	$userprofile= $postprofile['username'];
	echo "<p id='green''>". $userprofile . "</p>";
}*/
	

	
?>