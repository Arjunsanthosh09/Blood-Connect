<?php
include('userHeader.php');
?>

<div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
    <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
        <h2 class="title pt-5">Search Blood</h2>
        <ul class="breadcrumbs-custom-path mt-3 text-center">
            <li><a href="adminHome.php">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Search Blood </li>
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
            <h2>Search Blood</h2>
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

                <button class="btn btn-primary btn-block" name="bloodrequest" type="submit">Search</button>
            </form>
        </div>

    </div>
</div>

<div class="view-content">

    <?php
    if (isset($_REQUEST['bloodrequest'])) {
        $blood = $_REQUEST['BLOOD'];
        $hid = $_SESSION['uid'];

        $qry = "SELECT d.* FROM `donor_reg` d,`login` l WHERE d.`d_id`=l.`reg_id` AND l.`status`='1' AND l.`type` = 'DONOR' AND d.`d_blood` = '$blood' AND d.`status` = 'FREE'";
        $result = mysqli_query($conn, $qry);
        if ($result->num_rows > 0) {
    ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Blood</th>
                    <th>Phone</th>
                    <th>Disease</th>
                    <th>Email</th>
                </tr>
        <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "
                <tr>
                    <td>" . $row['d_name'] . "</td>
                    <td>" . $row['d_age'] . "</td>
                    <td>" . $row['d_address'] . "</td>
                    <td>" . $row['d_blood'] . "</td>
                    <td>" . $row['d_phone'] . "</td>
                    <td>" . $row['d_diseases'] . "</td>
                    <td>" . $row['d_email'] . "</td>
                </tr>";
            }
        } else {
            echo "<div class='no-data'><img class='no-data' src='../assets/images/no-data.png'><h5>No Such Result</h5></div> ";
        }
    }
        ?>
            </table>

</div>




<?php
include('../footer.php');
?>