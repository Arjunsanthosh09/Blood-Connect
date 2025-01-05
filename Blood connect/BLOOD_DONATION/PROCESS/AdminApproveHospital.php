<?php
	include('../DBConnection/dbConnection.php');
	$uid = $_REQUEST['id'];
	$qry = "update login set status='1' where reg_id='$uid' AND type='HOSPITAL'";
	if ($conn->query($qry) == TRUE ){
		echo "<script>alert('Successfully Approved');window.location='../ADMIN/hospitalRequest.php'</script>";
	}else{
		echo "<script>alert('Action Failed');window.location='../ADMIN/hospitalRequest.php'</script>";
	}
?>