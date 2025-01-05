<?php
include('../DBConnection/dbConnection.php');
$did = $_REQUEST['did'];
$rqstid = $_REQUEST['rqst_id'];
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i");
$qry1 = "UPDATE `user_blood_request` SET `status` = 'DONATED', `last_donate` = '$date' WHERE `b_rqst_id` = '$rqstid'";
$qry2 = "UPDATE `donor_reg` SET `status` = 'FREE' WHERE `d_id` = '$did'";
if ($conn->query($qry1) == TRUE && $conn->query($qry2) == TRUE) {
	echo "<script>alert('Successfully Donated');window.location='../DONOR/userRequest.php'</script>";
} else {
	echo "<script>alert('Action Failed');window.location='../DONOR/userRequest.php'</script>";
}
