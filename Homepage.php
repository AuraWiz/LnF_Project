<!DOCTYPE html>
<?php
   include("ConnectDB.php");
   session_start();
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
						<?php
							if($_SESSION['login_status']==1){
						?>
							<li>
							<a href="Homepage.php"  class="menustyle">Home</a>
						</li>
						<li>
							<a href="ManagePost.php"  class="menustyle">Manage Post</a>
						</li>
						<li>
							<a href="Profile.php"  class="menustyle">Profile</a>
						</li>
						<li>
							<a href="logout.php"  class="menustyle">Sign out</a>
						</li>
						<?php		
							}else{
						?>
								<li>
							<a href="Homepage.php"  class="menustyle">Home</a>
						</li>
						
						<li>
							<a href="LogIn.php"  class="menustyle">Sign in</a>
						</li>
						<li>
							<a href="Register.php"  class="menustyle">Register</a>
						</li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
			
			<!--Content Area-->
			<div id="content">
			ABC กขคง
			</div>
		
		</div>		
	</body>
</html>