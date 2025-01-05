<?php
	include('../DBConnection/dbConnection.php');
	$uid = $_REQUEST['uid'];
	$did = $_REQUEST['did'];
	$rqstid = $_REQUEST['rqst_id'];
	$qry1 = "UPDATE `user_blood_request` SET `d_id` = '$did', `status` = 'ASSIGNED TO DONOR' WHERE `b_rqst_id` = '$rqstid'";
	$qry2 = "UPDATE `donor_reg` SET `status` = 'ASSIGNED' WHERE `d_id` = '$did'";
	if ($conn->query($qry1) == TRUE && $conn->query($qry2) == TRUE){
		echo "<script>alert('Successfully Assigned');window.location='../ADMIN/userRequest.php'</script>";
	}else{
		echo "<script>alert('Action Failed');window.location='../ADMIN/userRequest.php'</script>";
	}
?> 