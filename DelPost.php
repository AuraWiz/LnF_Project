<?php
   include("ConnectDB.php");
   session_start();
   $posid = $_REQUEST["id"];
   $sqldel = "DELETE FROM post_master_attr where postid = '$posid'"; 
   $delresult = mysqli_query($db,$sqldel);
   $posid = 0;
   header("location: ManagePost.php");
?>