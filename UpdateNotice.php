<!DOCTYPE html>
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
				<form action="" class="FormArea">
					<fieldset>
						<legend><h1>เพิ่มประกาศใหม่</h1></legend>
						<table class="inputform">
							<tr>
								<td class="topic">ภาพผู้สูญหาย</td>
								<td class="input">
									<input type="file" name="lostpic"></br>
									<a class="comment">กรุณาอัพโหลดภาพคนหายแบบเห็นหน้าชัด </a>
								</td>
							</tr>
							<tr>
								<td class="topic">ชื่อ - สกุล ผู้สูญหาย</td>
								<td class="input">
									<input type="text" name="lostname">
								</td>
							</tr>
							<tr>
								<td class="topic">เพศ</td>
								<td class="input">
									<input type="radio" name="lostmale">ชาย 
									<input type="radio" name="lostfemale">หญิง
								</td>
							</tr>
							<tr>
								<td class="topic">วันที่พบเห็นครั้งสุดท้าย</td>
								<td class="input">
									<input type="date" name="lostday">
								</td>
							</tr>
							<tr>
								<td class="topic">รายละเอียดเพิ่มเติม</td>
								<td class="input">
									<textarea rows="5" cols="25" name="lostinfo" maxlength="300"></textarea>
								</td>
							</tr>
							<tr>
								<td class="topic">ชื่อ - สกุล ผู้ลงประกาศ</td>
								<td class="input">
									<input type="text" name="ownername">
								</td>
							</tr>
							<tr>
								<td class="topic">เบอร์ติดต่อ</td>
								<td class="input"> <input type="text" name="ownertel"></td>
							</tr>
							<tr>
								<td class="topic"></td>
								<td class="input">
									<input type="Submit" value="Post" onclick="">
								</td>
							</tr>
					
						</table>
					</fieldset>
				</form>
			</div>
		</div>
	</body>
</html>