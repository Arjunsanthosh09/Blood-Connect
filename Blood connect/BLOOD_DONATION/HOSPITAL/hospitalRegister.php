<?php
session_start();
include("../DBConnection/dbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Blood Donation : Hospital Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../login/css/style.css" type="text/css" media="all" />
</head>
<body>
    <div class="signinform">
        <h1>Register Hospital</h1>
        <div class="container">
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>Register</h2>
                    <form action="#" method="post">
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="text" placeholder="Hospital Name" class="name" name="NAME" pattern="[A-Za-z\s]{1,32}" maxlength="32" required="">
                        </div>
                        <div class="input-group">
                            <textarea placeholder="Address" required="" name="ADDRESS" class="address"></textarea>
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="Phone" name="PHONE" required="" pattern="^\d{10}$" maxlength="10">
                        </div>
                        <div class="input-group">
                            <input type="email" placeholder="Email" name="EMAIL" required="">
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="PASSWORD" required="" pattern="^(?=.*[A-Z]).{6,}$" title="Password must be at least 6 characters long and contain at least one uppercase letter.">
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="register">Register</button>
                    </form>
                    <p class="account">Already have an account? <a href="../index.php">Login</a></p>
                </div>
            </div>
        </div>
        <?php
        if (isset($_REQUEST['register'])) {
            $Name = $_REQUEST['NAME'];
            $Phone = $_REQUEST['PHONE'];
            $Address = $_REQUEST['ADDRESS'];
            $Email = $_REQUEST['EMAIL'];
            $Password = $_REQUEST['PASSWORD'];

            // Validate email format
            if (!preg_match('/^[A-Za-z][a-zA-Z0-9._%+-]*@gmail\.com$/', $Email)) {
                echo "<script>alert('Invalid Email Format: The email must start with a letter and end with @gmail.com');window.location='hospitalRegister.php';</script>";
                exit();
            }

            // Validate phone number
            if (!preg_match('/^\d{10}$/', $Phone) || preg_match('/^(.)\1{9}$/', $Phone)) {
                echo "<script>alert('Invalid phone number format. It must be a valid 10-digit number and not repetitive like 0000000000.');window.location='hospitalRegister.php';</script>";
                exit();
            }

            // Check if email or phone already exists
            $qryCheck = "SELECT COUNT(*) AS cnt FROM `hospital` WHERE `h_email` = '$Email' OR `h_phone` = '$Phone'";
            $qryOut = mysqli_query($conn, $qryCheck);
            $fetchData = mysqli_fetch_array($qryOut);
            if ($fetchData['cnt'] > 0) {
                echo "<script>alert('An account already exists with the same Email / Phone Number');window.location='hospitalRegister.php';</script>";
            } else {
                // Insert into hospital table
                $qryReg = "INSERT INTO hospital(h_name, h_address, h_phone, h_email) VALUES('$Name', '$Address', '$Phone', '$Email')";

                // Insert into login table
                $qryLog = "INSERT INTO login(`reg_id`, `email`, `password`, `type`, `status`) 
                           VALUES((SELECT MAX(h_id) FROM hospital), '$Email', '$Password', 'HOSPITAL', '0')";

                if ($conn->query($qryReg) === TRUE && $conn->query($qryLog) === TRUE) {
                    echo "<script>alert('Registration Successful');window.location='../index.php';</script>";
                } else {
                    echo "<script>alert('Registration Failed');window.location='hospitalRegister.php';</script>";
                }
            }
        }
        ?>
    </div>
    <script src="js/fontawesome.js"></script>
</body>
</html>
