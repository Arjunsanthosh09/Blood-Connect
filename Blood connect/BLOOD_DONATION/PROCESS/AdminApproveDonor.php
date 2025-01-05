<?php
	include('../DBConnection/dbConnection.php');
	$uid = $_REQUEST['id'];
	$qry = "update login set status='1' where reg_id='$uid' AND type='DONOR'";
	if ($conn->query($qry) == TRUE ){
		echo "<script>alert('Successfully Approved');window.location='../ADMIN/donorRequest.php'</script>";
	}else{
		echo "<script>alert('Action Failed');window.location='../ADMIN/donorRequest.php'</script>";
	}
?>