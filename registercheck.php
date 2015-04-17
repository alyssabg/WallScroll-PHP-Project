<html>
<title>WallScroll - Registration</title>
<link rel="stylesheet" type="text/css" href="css/wallscroll.css">
<body>

<!------ Passing Info Through hidden fields ------>

<!--<form method="POST" action="login.php">
	<input type="hidden" name="userName" value="<?php/* echo $_POST['userName'];*/ ?>">
	<input type="hidden" name="passWord" value="<?php/*echo $_POST['passWord'];*/ ?>">
  	<input type="hidden" name="email" value="<?php/*echo $_POST['email'];*/ ?>">
</form>-->

<?php 

/*-----Connect to Database--------*/
	$username = "vi930844";
	$password = "Elijah4/27";
	$hostname = "sulley.cah.ucf.edu";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die ("<p id='echo'>"."Could Not Connect"."</p>");
	$selected = mysql_select_db("vi930844", $dbhandle);


/*variables*/
 $user = $_POST['userName'];
 $pass = $_POST['passWord'];
 $email = $_POST['email'];
 
 	
/*---Protect against injections------*/
	$user = stripslashes($user);
	$pass = stripslashes($pass);
	$email = stripslashes($email);
 

/*insert into database function and user exist check function */ 
$insert = "INSERT INTO wallmembers(username, password, email) VALUES('$user','$pass','$email')";

$queryuser = "SELECT * FROM wallmembers WHERE username='$user'";
$resultuser = mysql_query($queryuser);
$countuser = mysql_num_rows($resultuser);


/*------Register validation function - check entries - move on to next page------*/

$register = isset($_POST['register']);
	if ($register)/*{
	$username = $_POST['userName'];
		$password = $_POST['passWord'];
		$email = $_POST['email'];
		
			{*/{ 
				
					if(empty ($user)) 
					{
						 echo "<p id='echo'>" ."*Username is required"."</p>";
						 include('index.php');
					}
						elseif($countuser==1)
					{
						echo "<p id='echo'>" ."*Username is taken"."</p>";
						include('index.php');
				    }
					elseif (empty($pass))
					{
						 echo "<p id='echo'>" ."*Password is required"."</p>";
						 include('index.php');
					}
					elseif(empty($email))
					{
						echo "<p id='echo'>" . "*Email is required";
						include('index.php');
					}
					elseif(strlen($user) < 4)
					{
						echo "<p id='echo'>" . "*Username is too short"."</p>";
						 include('index.php');
					}
					elseif(strlen($pass) < 6)
						{
							echo "<p id='echo'>" . "*Password is too short"."</p>";
							include('index.php');
						 }	
							
							/*elseif($countuser==0){
								mysql_query($insert);
							}*/
							 else
						 		{	mysql_query($insert);
									include('login.php');
									mysqli_close($dbhandle);
								}
			}


						
	
?>
</body>
</html>