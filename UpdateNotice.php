<!DOCTYPE html>
<?php
   include("ConnectDB.php");
   session_start();
   if($_SESSION['login_status'] == 1){
		$id = $_REQUEST["id"];
		  $sqlchk = "SELECT * FROM post_master_attr where postid = '$id'";
		  $result = mysqli_query($db,$sqlchk);
		  $count = mysqli_num_rows($result);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$active = $row['active'];
		  $p_lost_pic = $row['lost_pic'];
		  $p_lost_name = $row['lost_name'];
		  $p_lost_gender =  $row['lost_gender'];
		  $p_lost_date =  $row['lost_date'];
		  $p_lost_info =  $row['lost_info'];
		  $p_contact_name =  $row['contact_name'];
		  $p_contact_tel =  $row['contact_tel'];
		  $posid = $row['postid'];
		  $owner = $_SESSION['login_user'];
		  
	   if($_SERVER["REQUEST_METHOD"] == "POST") {
		  $lost_pic = mysqli_real_escape_string($db,$_POST['lostpic']);
		  $lost_name = mysqli_real_escape_string($db,$_POST['lostname']);
		  $lost_gender = mysqli_real_escape_string($db,$_POST['gender']);
		  $lostday = mysqli_real_escape_string($db,$_POST['lostday']);
		  $lostinfo = mysqli_real_escape_string($db,$_POST['lostinfo']);
		  $ownername = mysqli_real_escape_string($db,$_POST['ownername']);
		  $ownertel = mysqli_real_escape_string($db,$_POST['ownertel']);
		  $timestamp = date("d/m/Y H:i:s");
		  $time = date("d-m-Y-H:i:s");
		  
			$chkgen = strlen($lost_gender);
			$chklostname = strlen($lost_name);
			$chkowner = strlen($ownername);
			$chktel = strlen($ownertel);
		  if($count == 0){
		  $posid = $owner.$time;
		  }
				if(isset($_FILES['lostpic'])){
						  $errors= array();
						  $file_name = $_FILES['lostpic']['name'];
						  $file_size =$_FILES['lostpic']['size'];
						  $file_tmp =$_FILES['lostpic']['tmp_name'];
						  $file_type=$_FILES['lostpic']['type'];
						  $file_ext=strtolower(end(explode('.',$_FILES['lostpic']['name'])));
						  $upload=$_FILES['fileupload'];
						  $extensions= array("jpeg","jpg","png");
				  
						  if(in_array($file_ext,$extensions)=== false){
							 $error="extension not allowed, please choose a JPEG or PNG file.";
						  }
						  
						  if($file_size > 2097152){
							 $error="File size must be excately 2 MB";
						  }
						  
						  if(empty($error)==true){
							 $path="img/";
							 $type = strrchr($_FILES['lostpic']['name'],".");
							 $newname = $posid.$type;
							 //$path_copy = $path.$newname;
							// move_uploaded_file($file_tmp,$path_copy); 
							$path_copy = $path.$file_name;
							move_uploaded_file($file_tmp,$path_copy);
								$error = $sqlchk."|".$path.$newname;
						  }
					}
					
			
			if($chkgen<> NULL && $chklostname<>NULL && $chkowner <>NULL && $chktel<>NULL){
				if(isset($_FILES['lostpic'])){
						  $errors= array();
						  $file_name = $_FILES['lostpic']['name'];
						  $file_size =$_FILES['lostpic']['size'];
						  $file_tmp =$_FILES['lostpic']['tmp_name'];
						  $file_type=$_FILES['lostpic']['type'];
						  $file_ext=strtolower(end(explode('.',$_FILES['lostpic']['name'])));
						  $extensions= array("jpeg","jpg","png");
				  
						  if(in_array($file_ext,$extensions)=== false){
							 $error="extension not allowed, please choose a JPEG or PNG file.";
						  }
						  
						  if($file_size > 2097152){
							 $error="File size must be excately 2 MB";
						  }
						  
						  if(empty($error)==true){
							 $path="img/";
							 $type = strrchr($_FILES['lostpic']['name'],".");
							 $newname = $posid.$type;
							 $path_copy=$path.$newname;
							 move_uploaded_file($file_tmp,$path_copy);  					 
						  }
					}
			  if($count == 0){
				  $sql = "INSERT INTO post_master_attr (postid, lost_name, lost_gender, lost_date, lost_info, contact_name, contact_tel, lost_pic, create_date, last_update,owner) 
				  VALUES ('$posid', '$lost_name', '$lost_gender', '$lostday', '$lostinfo', '$ownername', '$ownertel', '$path_copy', '$timestamp', '$timestamp','$owner')";
				  $result = mysqli_query($db,$sql);
				  $posid = 0;
				  $error = "";
				  header("location: ManagePost.php");
				  
				  
			  }else{
				  $sql = "UPDATE post_master_attr SET lost_name='$lost_name',lost_gender='$lost_gender',lost_date='$lostday',lost_info='$lostinfo',contact_name='$ownername',contact_tel='$ownertel',last_update='$timestamp'
				  WHERE postid='$posid'";
				 $result = mysqli_query($db,$sql);
				  $posid = 0;
				  $error = "";
				header("location: ManagePost.php");
			  } 
		  }else{
			  $error = "กรุณากรอกรายละเอียดให้ครบ ได้แก่ ชื่อและเพศของผู้สูญหาย ชื่อและเบอร์ติดต่อของผู้ลงประกาศ";
		  }
			
	   }	
   }else{
	   $error = "";
	   header("location: Homepage.php");
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
				<form action="" class="FormArea" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>
						<?if($count == 0){
							 echo "<h1>เพิ่มประกาศใหม่</h1>";
						}else{
							echo "<h1>แก้ไขประกาศ</h1>";
						}?>
						</legend>
						<table class="inputform">
							<?if($count == 0){?>
							<?}else{?>
								<tr>
								<td class="topic"></td>
								<td class="input">
									<img src="<?echo $p_lost_pic;?>" width="400" height="auto"/>
								</td>
							</tr>
							<?}?>
							
							<?if($count == 0){?>
							<tr>
								<td class="topic">ภาพผู้สูญหาย</td>
								<td class="input">
									<input type="file" name="lostpic" > </br>
									<a class="comment">กรุณาอัพโหลดภาพคนหายแบบเห็นหน้าชัด</a>
								</td>
							</tr>
							<?}?>
							<tr>
								<td class="topic">ชื่อ - สกุล ผู้สูญหาย</td>
								<td class="input">
									<?if($count == 0){?>
										<input type="text" name="lostname">
									<?}else{?>
										<input type="text" name="lostname" value="<?echo $p_lost_name; ?>">
									<?}?>
									<a class="comment">ต้องมี</a>
								</td>
							</tr>
							<tr>
								<td class="topic">เพศ</td>
								<td class="input">
									<?if($count == 0){?>
										<input type="radio" name="gender" value="1">ชาย 
										<input type="radio" name="gender" value="2">หญิง
									<?}else{
										if($p_lost_gender ==1){?>
											<input type="radio" name="gender" value="1" checked="checked">ชาย 
											<input type="radio" name="gender" value="2">หญิง
										<?}else{?>
											<input type="radio" name="gender" value="1" >ชาย 
											<input type="radio" name="gender" value="2" checked="checked">หญิง
										<?}?>
									<?}?>
									<a class="comment">ต้องมี</a>
								</td>
							</tr>
							<tr>
								<td class="topic">วันที่พบเห็นครั้งสุดท้าย</td>
								<td class="input">
									
									<?if($count == 0){?>
										<input type="date" name="lostday">
									<?}else{?>
										<input type="date" name="lostday" value="<?echo $p_lost_date;?>">
									<?}?>
								</td>
							</tr>
							<tr>
								<td class="topic">รายละเอียดเพิ่มเติม</td>
								<td class="input">
									
									<?if($count == 0){?>
										<textarea rows="5" cols="25" name="lostinfo" maxlength="300"></textarea>
									<?}else{?>
										<textarea rows="5" cols="25" name="lostinfo" maxlength="300" ><?echo $p_lost_info;?></textarea>
									<?}?>
								</td>
							</tr>
							<tr>
								<td class="topic">ชื่อ - สกุล ผู้ลงประกาศ</td>
								<td class="input">
									
									<?if($count == 0){?>
										<input type="text" name="ownername">
									<?}else{?>
										<input type="text" name="ownername" value="<?echo $p_contact_name;?>">
									<?}?>
									<a class="comment">ต้องมี</a>
								</td>
							</tr>
							<tr>
								<td class="topic">เบอร์ติดต่อ</td>
								<td class="input"> 
									<?if($count == 0){?>
										<input type="text" name="ownertel">
									<?}else{?>
										<input type="text" name="ownertel" value="<?echo $p_contact_tel;?>">
									<?}?>
									<a class="comment">ต้องมี</a>
								</td>
							</tr>
							<tr>
								<td class="topic"></td>
								<td class="input">
									<?if($count == 0){?>
									<input type="Submit" value="Post" onclick="">
									<?}else{?>
									<input type="Submit" value="Update" onclick="">
									<?}?>
									
								</td>
							</tr>
							<tr>
								<td class="topic"></td>
								<td class="input">
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