<?php
include('../DBConnection/dbConnection.php');
$uid = $_REQUEST['id'];

$qryLog = "DELETE from login  WHERE reg_id='$uid' AND type='HOSPITAL'";
$qryReg = "DELETE from hospital  WHERE h_id='$uid'";
if ($conn->query($qryLog) == TRUE && $conn->query($qryReg) == TRUE) {
	echo "<script>alert('Successfully Rejected');window.location='../ADMIN/hospitalRequest.php'</script>";
} else {
	echo "<script>alert('Action Failed');window.location='../ADMIN/hospitalRequest.php'</script>";
}
?>