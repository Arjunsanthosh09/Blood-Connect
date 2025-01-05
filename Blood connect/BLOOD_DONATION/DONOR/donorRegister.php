<?php
session_start();
include("../DBConnection/dbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Donation : Donor Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../login/css/style.css" type="text/css" media="all" />
</head>

<body>
    <div class="signinform">
        <h1>Register Donor</h1>
        <div class="container">
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>Register</h2>
                    <form action="#" method="post">
                        <div class="input-group">
                            <input type="text" placeholder="Name" name="NAME" pattern="[A-Za-z\s]{1,32}" maxlength="32" required>
                        </div>
                        <div class="input-group">
                            <input type="number" placeholder="Age" name="AGE" min="18" max="65" required>
                        </div>
                        <div class="input-group">
                            <textarea placeholder="Address" name="ADDRESS" required></textarea>
                        </div>
                        <div class="input-group">
                            <select name="BLOOD" required>
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
                        <div class="input-group">
                            <input type="text" placeholder="Phone" name="PHONE" pattern="[0-9]{10}" maxlength="10" required>
                        </div>
                        <div class="input-group">
                            <textarea placeholder="Disease (Optional)" name="DISEASE"></textarea>
                        </div>
                        <div class="input-group">
                            <input type="email" placeholder="Email" name="EMAIL" required>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="PASSWORD" pattern="^(?=.*[A-Z]).{6,}$" title="Password must be at least 6 characters and contain one uppercase letter." required>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit" name="register">Register</button>
                    </form>
                    <p class="account">Already have an account? <a href="../index.php">Login</a></p>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['register'])) {
            $Name = $_POST['NAME'];
            $Age = $_POST['AGE'];
            $Phone = $_POST['PHONE'];
            $Disease = !empty($_POST['DISEASE']) ? $_POST['DISEASE'] : 'None';
            $Address = $_POST['ADDRESS'];
            $Blood = $_POST['BLOOD'];
            $Email = $_POST['EMAIL'];
            $Password = $_POST['PASSWORD'];

            if (!preg_match('/^[A-Za-z][a-zA-Z0-9._%+-]*@gmail\.com$/', $Email)) {
                echo "<script>alert('Invalid Email Format: The email must start with a letter and end with @gmail.com');window.location='donorRegister.php';</script>";
                exit();
            }

            if (!preg_match('/^[0-9]{10}$/', $Phone) || preg_match('/^(.)\1{9}$/', $Phone)) {
                echo "<script>alert('Invalid phone number. It must be 10 digits and not repetitive (e.g., 0000000000).');window.location='donorRegister.php';</script>";
                exit();
            }
            $qryCheck = $conn->prepare("SELECT COUNT(*) AS cnt FROM donor_reg WHERE d_email = ? OR d_phone = ?");
            $qryCheck->bind_param("ss", $Email, $Phone);
            $qryCheck->execute();
            $result = $qryCheck->get_result();
            $fetchData = $result->fetch_assoc();

            if ($fetchData['cnt'] > 0) {
                echo "<script>alert('An account already exists with the same Email or Phone Number.');window.location='donorRegister.php';</script>";
            } else {
                $qryReg = $conn->prepare("INSERT INTO donor_reg(d_name, d_age, d_address, d_blood, d_phone, d_email, d_diseases) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $qryReg->bind_param("sisssss", $Name, $Age, $Address, $Blood, $Phone, $Email, $Disease);

                $qryLog = $conn->prepare("INSERT INTO login(reg_id, email, password, type, status) VALUES ((SELECT MAX(d_id) FROM donor_reg), ?, ?, 'DONOR', '0')");
                $qryLog->bind_param("ss", $Email, $Password);

                if ($qryReg->execute() && $qryLog->execute()) {
                    echo "<script>alert('Registration Successful');window.location='../index.php';</script>";
                } else {
                    echo "<script>alert('Registration Failed');window.location='donorRegister.php';</script>";
                }
            }
        }
        ?>
    </div>
    <script src="js/fontawesome.js"></script>
</body>

</html>
