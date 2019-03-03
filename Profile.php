<!DOCTYPE html>
<?php
   include("ConnectDB.php");
   if(session_start()){
   if($_SESSION['login_status'] == 1) {
      // username and password sent from form 
      $user = $_SESSION['login_user'];
      $sql = "SELECT fname, lname, email FROM user_master WHERE user = '$user'";	  
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
   }else{
	   $_SESSION['login_status'] = 0;
	   header("location: Homepage.php");
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
							<a href="ManagePost.php"  class="menustyle">Manage Post</a>
						</li>
						<li>
							<a href="UpdateNotice.php"  class="menustyle">Create new post</a>
						</li>
						<li>
							<a href="Profile.php"  class="menustyle">Profile</a>
						</li>
						<li>
							<a href="logout.php"  class="menustyle">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
			
			<!--Form Area-->
			<div class="FormArea">
				<h1>Profile</h1></br>
				<table class="inputform">
							<tr>
								<td class="topic"></td>
								<td class="input"></td>
							</tr>
							<tr>
								<td class="topic">First name</td>
								<td class="input">
									<? echo $row['fname'];?>
								</td>
							</tr>
							<tr>
								<td class="topic">Last name</td>
								<td class="input">
									<? echo $row['lname'];?>
								</td>
							</tr>
							<tr>
								<td class="topic">Email</td>
								<td class="input">
									<? echo $row['email'];?>
								</td>
							</tr>
							<tr>
								<td class="topic">Username</td>
								<td class="input">
									<? echo $user;?>
								</td>
							</tr>
							
						</table>
			</div>
		</div>		
	</body>
</html>