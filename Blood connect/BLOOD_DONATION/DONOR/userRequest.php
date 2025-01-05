<?php
include('donorHeader.php');
?>
<div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
    <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
        <h2 class="title pt-5">Blood Request</h2>
        <ul class="breadcrumbs-custom-path mt-3 text-center">
            <li><a href="donorHome.php">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Blood Request </li>
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
<div class="view-content">

    <?php
    $qry = "SELECT u.*, r.`b_rqst_id` FROM `user_blood_request` r, `donor_reg` d, `user_reg` u WHERE r.`u_id` = u.`u_id` AND r.`d_id` = d.`d_id` AND r.`status` = 'ASSIGNED TO DONOR'";
    $result = mysqli_query($conn, $qry);
    $did = $_SESSION['uid'];
    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>Action</th>

            </tr>
        <?php
        // echo $pid;
        while ($row = mysqli_fetch_array($result)) {
            echo "
                <tr>
                    <td>" . $row['u_name'] . "</td>
                    <td>" . $row['u_age'] . "</td>
                    <td>" . $row['u_phone'] . "</td>
                    <td>" . $row['u_address'] . "</td>
                    <td>" . $row['u_email'] . "</td>
                    <td><a class='approve-btn' href='../PROCESS/approveBloodRqst.php?did=" . $did . "&rqst_id=" . $row['b_rqst_id'] . "'>Donate</a></td>
                </tr>";
        }
    } else {
        echo "<div class='no-data'><img class='no-data' src='../assets/images/no-data.png'><h5>No Blood Request</h5></div>";
    }

        ?>
        </table>

</div>



<?php

include('../Footer.php');

?>