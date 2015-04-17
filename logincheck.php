<?php
// Start the session
session_start();
$_SESSION['usersession'] = $_POST['loginName'];
?>
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

/*---register varibles-------*/	
	$user = $_POST['loginName'];
	$pass = $_POST['loginPass'];
	
/*---Protect against injections------*/
	$user = stripslashes($user);
	$pass = stripslashes($pass);
	
/*---find info in the database--------*/	
		/* username name and password from db---*/
	$query = "SELECT * FROM wallmembers WHERE username='$user' and password ='$pass'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
		/* username from db---*/
	$queryuser = "SELECT * FROM wallmembers WHERE username='$user'";
	$resultuser = mysql_query($queryuser);
	$countuser = mysql_num_rows($resultuser);
		/* pass from db---*/
	$querypass = "SELECT * FROM wallmembers WHERE password='$pass'";
	$resultpass = mysql_query($querypass);
	$countpass = mysql_num_rows($resultpass);
	
	/* check if profile info exists */
	$exist = mysql_query("SELECT * FROM wallmembers WHERE username = '$user' ");
	$rows = mysql_fetch_assoc($exist);
	

	
/*----Check if user info ----*/
		/* check if user and pass match db---*/
if($count ==1 && empty ($rows["name"])){
	include('profile.php');
}
	else if($count==1 ){
		/*session_register("user");
       session_register("pass"); 
       header("location:profile.php");*/
		include('profilepage.php');
	}
	 /* check username exists---*/
		elseif($countuser ==0){   
			echo "<p id='echo'>". "Username Does Not Exist". "</p>";
			include 'login.php';
		}
			else{ 
				echo"<p id='echo'>"."Password Do Not Match"."</p>";
				include 'login.php';
	}

/*------------------------------PHASE 1 CODE ------------------------------------------------------------------*/


/*-Function making sure login info equals registration info to pass to next page-*/

/*if(isset ($_POST['login'])){
		if($_POST['loginName'] != $_POST['userName'] || $_POST['loginPass'] != $_POST['passWord'])
			{
				 $_POST['userName'];
				 $_POST['passWord'];
				 $_POST['email'];
				echo "<p id='echo'>" ."*Username and/or Password do not match";
				include('login.php');
			}
			else{
				include('profile.php');
				$_POST['email'];
			}
	}*/
?>
</body>
</html>