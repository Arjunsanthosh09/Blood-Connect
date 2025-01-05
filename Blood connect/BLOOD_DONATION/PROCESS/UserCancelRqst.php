<?php
	include('../DBConnection/dbConnection.php');
	$uid = $_REQUEST['rqst_id'];
	$qry = "DELETE FROM `user_blood_request` WHERE `b_rqst_id` = '$uid'";
	if ($conn->query($qry) == TRUE ){
		echo "<script>alert('Successfully Cancelled');window.location='../USER/userRequest.php'</script>";
	}else{
		echo "<script>alert('Action Failed');window.location='../USER/userRequest.php'</script>";
	}
