<?php
// Start the session
session_start();

$usersession = $_SESSION['usersession'];

/*session_unset($usersession);
session_destroy();*/



if(isset($_POST['logoutbutton'])){
	session_unset($usersession);
	session_destroy();
	echo "<p id='echo'>" . "You are logged out." . "</p>";
}
else{
	echo "<p id='echo'>" . "You are still logged in". "</p>";
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/wallscroll.css">
</head>

<body>
   <div class="content">
		<a href="login.php"> Log back in.</a>
        <br>
		<a href="index.php"> Create an account.</a>
   </div>
</body>
</html>