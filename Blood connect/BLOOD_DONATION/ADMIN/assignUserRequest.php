<?php
include('adminHeader.php');
?>

<div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
    <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
        <h2 class="title pt-5">Donors</h2>
        <ul class="breadcrumbs-custom-path mt-3 text-center">
            <li><a href="adminHome.php">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> User Request </li>
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
    $qry = "SELECT * FROM `donor_reg` WHERE `status` = 'FREE'";
    $uid = $_REQUEST['uid'];
    $rqstid = $_REQUEST['rqst_id'];
    $result = mysqli_query($conn, $qry);
    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Blood</th>
                <th>Disease</th>
                <th>Email</th>
                <th>Action</th>

            </tr>
        <?php
        
        while ($row = mysqli_fetch_array($result)) {
            echo "
                <tr>
                    <td>" . $row['d_name'] . "</td>
                    <td>" . $row['d_age'] . "</td>
                    <td>" . $row['d_phone'] . "</td>
                    <td>" . $row['d_address'] . "</td>
                    <td>" . $row['d_blood'] . "</td>
                    <td>" . $row['d_diseases'] . "</td>
                    <td>" . $row['d_email'] . "</td>
                    <td><a class='approve-btn' href='../PROCESS/assignUserRqst.php?uid=" . $uid . "&did=" . $row['d_id'] . "&rqst_id=" . $rqstid . "'>Assign</a></td>
                </tr>";
        }
    } else {
        echo "<div class='no-data'><img class='no-data' src='../assets/images/no-data.png'><h5>No Matching Donors Available</h5></div>";
    }

        ?>
        </table>

</div>



<?php

include('../Footer.php');

?>