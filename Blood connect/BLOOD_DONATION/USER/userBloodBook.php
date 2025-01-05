<?php
include('userHeader.php');
?>
<div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
    <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
        <h2 class="title pt-5">Request</h2>
        <ul class="breadcrumbs-custom-path mt-3 text-center">
            <li><a href="adminHome.php">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Request </li>
        </ul>
    </div>
</div>
<div class="position-relative">
    <div class="shape overflow-hidden">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<div class="container container-rqst">
    <div class="w3l-form-info">
        <div class="w3_info">
            <h2>Request Blood</h2>
            <form action="#" method="post">
                <div class="input-group">
                    <select name="BLOOD" id="blood">
                        <option selected disabled>Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>

                <button class="btn btn-primary btn-block" name="bloodrequest" type="submit">Request</button>
            </form>
        </div>

        <?php
        if (isset($_REQUEST['bloodrequest'])) {
            $blood = $_REQUEST['BLOOD'];
            $uid = $_SESSION['uid'];
            $qryx = "INSERT INTO `user_blood_request`(`u_id`, `blood`, `status`) VALUES('$uid', '$blood', 'REQUESTED')";
    
            if ($conn->query($qryx) == TRUE) {
                echo "<script>alert('Successfully Requested');window.location='userBloodBook.php'</script>";
            } else {
                echo "<script>alert('Action Failed');window.location='userBloodBook.php'</script>";
            }
        }
        ?>

    </div>
    
</div>




<?php
include('../footer.php');
?>