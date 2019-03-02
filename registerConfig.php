<?php
	include("ConnectDB.php");
	  
      $chkusername = mysqli_real_escape_string($db,$_POST['username']);
      $chkpassword = mysqli_real_escape_string($db,$_POST['password']);       
      $sql2 = "SELECT user FROM user_master WHERE user = '$chkusername'";
      $result2 = mysqli_query($db,$sql2);
	  $count2 = mysqli_num_rows($result2);
	  $row2 = mysqli_fetch_array($result2,mySQLI_ASSOC);
      $active2 = $row2['active'];
	  $len = strlen($chkusername);
	  
	  if(isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['firstname'])){

			mysql_query("INSERT INTO `user_master` (`user`, `password`, `fname`, `lname`, `email`, `status`) 
			VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['firstname']."','".$_POST['lasttname']."','".$_POST['email']."', '2')")
			header("location:Profile.php");
		
	  }else{
		if(isset($_POST['username'])== TRUE && $_POST['password'])== TRUE && $_POST['firstname'])== FALSE){
			$error = "Please fill your firstname.";
			$errornoct = "";
		}elseif(isset($_POST['username'])== TRUE && $_POST['password'])== FALSE && $_POST['firstname'])== FALSE){
			$error = "Please fill password & your firstname.";
			$errornoct = "";
		}elseif(isset($_POST['username'])== FALSE && $_POST['password'])== TRUE && $_POST['firstname'])== FALSE){
			$error = "Please fill username & your firstname.";
			$errornoct = "";
		}elseif(isset($_POST['username'])== FALSE && $_POST['password'])== TRUE && $_POST['firstname'])== TRUE){
			$error = "Please fill username.";
			$errornoct = "";
		}elseif(isset($_POST['username'])== FALSE && $_POST['password'])== FALSE && $_POST['firstname'])== TRUE){
			$error = "Please fill username & password.";
			$errornoct = "";
		}elseif(isset($_POST['username'])== TRUE && $_POST['password'])== FALSE && $_POST['firstname'])== TRUE){
			$error = "Please fill password.";
			$errornoct = "";
		}else{
			$error = "Please fill username & password & your firstname.";
			$errornoct = "";
		}
	  }
	  
	
	header("location:LogIn.php");
	
	
	
?>