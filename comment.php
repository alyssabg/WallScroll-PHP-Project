<?php
// Start the session

session_start();
$usersession = $_SESSION['usersession'] ;

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/wallscroll.css">
</head>

<body>

<?php

/*-----Connect to Database--------*/
	$username = "vi930844";
	$password = "Elijah4/27";
	$hostname = "sulley.cah.ucf.edu";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die ("<p id='echo'>"."Could Not Connect"."</p>");
	$selected = mysql_select_db("vi930844", $dbhandle);


//insert entry
$submit = $_POST['submitpost'];
$wallpost = $_POST['entry'];
$insertentry = mysql_query("INSERT INTO wallposts(username , comment , datetime) VALUES ('$usersession' , '$wallpost', NOW() )");

if($submit){
	if(empty($wallpost)){
		echo "<p id='echo'>"."Enter a posting"."</p>";
		include "profilepage.php";
	}
	else{
		$insertentry;
		include "profilepage.php";
	}
}

?>
</body>
</html>