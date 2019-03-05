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
			
			<!--Content Area-->
			<div id="content">
				<table class="inputform">
							
				
				<?
				   $owner = $_SESSION['login_user'];
				   $sqlsl = "SELECT * FROM post_master_attr where owner = '$owner' ORDER BY last_update DESC";
				   
					$result = mysqli_query($db,$sqlsl);
					while($row = mysqli_fetch_array($result)){
						?>
							<tr>
								<td class="topic" >
									<img src="<? echo $row['lost_pic'];?>"/ width="300" height="auto">
								</td>
								<td class="input">
									<b>คุณ</b><?echo $row['lost_name'];?> </br>
									<b>เพศ</b><?if($row['lost_gender'] == 1){echo "ชาย";}else{echo "หญิง";}?> </br>
									<b>หายตัวไปเมื่อวันที่ </b><?echo $row['lost_date'];?> </br>
									<b>รายละเอียดเพิ่มเติม</b> <?echo $row['lost_info'];?> </br>
									<b>หากพบตัวติดต่อได้ที่คุณ</b> <?echo $row['contact_name'];?> </br>
									<b>เบอร์</b> <?echo $row['contact_tel'];?></br>
									
									<?
										echo "<a href='DelPost.php?id=$row[postid]'>Delete</a><br>";
										echo "<a href='UpdateNotice.php?id=$row[postid]'>Edit</a>";
									?>
								</td>
							</tr>
						<?
					}
				?>
				</table>
			</div>
		
		</div>		
	</body>
</html>