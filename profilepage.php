<?php
// Start the session

session_start();
$usersession = $_SESSION['usersession'] ;

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>WallScroll - Profile</title>
</head>
<link rel="stylesheet" type="text/css" href="css/wallscroll.css">

<body>

<form method="POST" name="logout" class="logout" action="logout.php">
    	<input type="submit" name="logoutbutton" class="logoutbutton" value="log out"/>
        </form>

<p id="green"><a href="users.php">View WallScroll Members</a></p>
<p id="green"><a href="feed.php">News Feed</a></p>


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
 
 /* echo out html divs & classes*/	
 		echo '<div class="content">';
		echo '<p class="heading">'.'Welcome '.$rows[$name].'<br>'.'</p>';
		
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

	
?>

<div id="profileinfo">

<form  method="POST" action="comment.php" id="form">

	<textarea name="entry" cols="30" rows="10" maxlength="600" placeholder="Post your thoughts here." ></textarea>
    
    <input type="submit" name="submitpost" value="post" class="submit" >
    
</form>

<?php


$getpost= mysql_query("SELECT * FROM wallposts WHERE username = '$usersession' ORDER BY id DESC");/*ORDER BY id DESC*/
while($postrows = mysql_fetch_assoc($getpost)){
	
	$id = $postrows['id'];
	$user= $postrows['username'];
	$post = $postrows['comment'];
	$datetime = $postrows['datetime'];
	
	echo "<p id='white'>" . "<strong>" . $user . "</strong>" . "<br>". $post . "<br>" . "<p style='color:#2ADF08;'>". $datetime . "</p>" . "</p>" . "<br>" . "<br>" ;
}

 
echo '</div>';
echo '</div>';


?>

</div>
</div>
</div>

</body>
</html>