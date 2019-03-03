<!DOCTYPE html>
<?php
   include("ConnectDB.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  $myfname = mysqli_real_escape_string($db,$_POST['firstname']);
	  $mylname = mysqli_real_escape_string($db,$_POST['lasttname']);
	  $mymail = mysqli_real_escape_string($db,$_POST['email']);
      
      $sql = "SELECT user FROM user_master WHERE user = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);

	  $nlen = strlen($myusername);
	  $plen = strlen($mypassword);
	  $flen = strlen($myfname);
      
	  if($nlen == NULL || $flen == NULL){
		  $error = "You can't register. Please fill inform.";
	  }elseif($count == 1 || $nlen > 20){
		  $error = "You can't use this username.";
	  }elseif($plen > 12 || $plen <8){
		  $error = "Password should have 8 - 12 digit";
	  }else{
		  $sql2 = "INSERT INTO user_master (user, password, fname, lname, email, status) 
			VALUES ('$myusername', '$mypassword', '$myfname','$mylname','$mymail', '2')";
			$result2 = mysqli_query($db,$sql2);
			$_SESSION['login_user'] = $myusername;
			$_SESSION['login_status'] = 1;
			$posid = 0;
		header("location: Profile.php");
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
				
				<form action="" method="post" class="FormArea">
					<fieldset>
						<legend><h1>Register</h1></legend>
						<table class="inputform">
							<tr>
								<td class="topic"></td>
								<td class="input"></td>
							</tr>
							<tr>
								<td class="topic">First name</td>
								<td class="input">
									<input type="text" name="firstname"/> ต้องมี
								</td>
							</tr>
							<tr>
								<td class="topic">Last name</td>
								<td class="input">
									<input type="text" name="lasttname"/>
								</td>
							</tr>
							<tr>
								<td class="topic">Email</td>
								<td class="input">
									<input type="text" name="email"/>
								</td>
							</tr>
							<tr>
								<td class="topic">Username</td>
								<td class="input">
									<input type="text" name="username"/> ต้องมี (ไม่เกิน 20 ตัวอักษร)
								</td>
							</tr>
							<tr>
								<td class="topic">Password</td>
								<td class="input">
									<input type="Password" name="password"/> ต้องมี 8 - 12 หลัก
								</td>
							</tr>
							<tr>
								<td class="topic"></td>
								<td class="input">
									<input type="Submit" value="Register" onclick="" name="regsubmit"/></br>
									<a class="comment">
								<?php							
									echo $error;
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