<!DOCTYPE html>
<?php
   include("ConnectDB.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['user']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT user FROM user_master WHERE user = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
			if($count == 1) {
				$_SESSION['login_user'] = $myusername;
				$_SESSION['login_status'] = 1;
				header("location:Profile.php");
			}else{
				$errornoct = "Your Login Name or Password is invalid";
				$error = "";
			}
		
   }
?>
<html>
	<head>
		<title>Lost & Found</title>
		<link rel="stylesheet" href="Style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
		<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
	</head>
	
	<body>
		<div id="pagearea">
			<!--Menu Bar-->
			<div id="header">
				<div id="nav-bar">
					<ul>
						<li>
							<a href="Homepage.php"  class="menustyle">Home</a>
						</li>

						<li>
							<a href="LogIn.php"  class="menustyle">Sign in</a>
						</li>
						<li>
							<a href="Register.php"  class="menustyle">Register</a>
						</li>
					</ul>
				</div>
			</div>
		
		
			<!--Form Area-->
			<div class="FormArea">
				
				<form method="post" class="FormArea">
					<fieldset>
						<legend><h1>Log in</h1></legend>
						<table class="inputform">
							<tr>
								<td class="topic">Username</td>
								<td class="input">
									<input type="text" name="user" class="inputbox"/>
								</td>
							</tr>
							<tr>
								<td class="topic">Password</td>
								<td class="input">
									<input type="password" name="pass" class="inputbox"/>
								</td>
							</tr>
							<tr>
								<td class="topic"></td>
								<td class="input"><input onclick="" type="submit" value="Log In"/></td>
							</tr>
							<tr>
								<td class="topic"></td>
								<td class="input">
								<a class="comment">
								<?php
																
									echo $errornoct;
								?>
								</a>
								</td>
							</tr>
						</table>

					</fieldset>
				</form> 
			</div>
		</div>
	</body>
</html>