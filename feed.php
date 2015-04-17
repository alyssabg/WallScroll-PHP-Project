<?php
// Start the session

session_start();
$usersession = $_SESSION['usersession'] ;
$user= $postfeed['username'];

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
	
	
//show news feed
echo "<div id='profileinfo'>";

$getfeed= mysql_query("SELECT * FROM wallposts ORDER BY id DESC");	
while($postfeed = $postfeed = mysql_fetch_assoc($getfeed)){
	
	$id = $postfeed['id'];
	$user= $postfeed['username'];
	$post = $postfeed['comment'];
	$datetime = $postfeed['datetime'];
	
	echo "<p id='white'>" . "<strong>" ."<a href='membersprofile.php?user=$user'>". $user . "</a>"."</strong>" . "<br>". $post . "<br>" . "<p style='color:#2ADF08;'>". $datetime . "</p>" . "</p>" . "<br>" . "<br>" ;
}
	
	
	
?>

</div>
</div>
</div>-->

</body>
</html>