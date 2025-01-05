
<?php
session_start();
include("DBConnection/dbConnection.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Donation : Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" />

</head>

<body>
    <div class="signinform">
        <h1>Login Form</h1>
        
        <div class="container">
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>Login</h2>
                    <form action="#" method="post">
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="email" placeholder="Username or Email" name="Email" required="">
                        </div>
                        <div class="input-group">
                            <span><i class="fas fa-key" aria-hidden="true"></i></span>
                            <input type="Password" placeholder="Password" name="Password" required="">
                        </div>

                        <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                    </form>
                    <p class="continue"><span> </span></p>

                    <p class="account">Don't have an account? <a href="RegisterPage.html">Sign up</a></p>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2024 Blood Connect. All Rights Reserved | Design by <a href="#">Blood Connect</a></p>
        </div>
     
    </div>


    <?php
if (isset($_REQUEST['login'])) {
    $email = $_REQUEST['Email'];
    $password = $_REQUEST['Password'];
    $qry = "SELECT * FROM login WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($conn, $qry);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $uid = $data['reg_id'];
        $type = $data['type'];
        $status = $data['status']; 
        $_SESSION['uid'] = $uid;
        $_SESSION['l_id'] = $iid;
        $_SESSION['type'] = $type;

        if ($status == 1) { 
            if ($type == 'ADMIN') {
                echo "<script>alert('Login Success'); window.location='ADMIN/adminHome.php'</script>";
            } else if ($type == 'DONOR') {
                echo "<script>alert('Login Success'); window.location='DONOR/donorHome.php'</script>";
            } else if ($type == 'USER') {
                echo "<script>alert('Login Success'); window.location='USER/userHome.php'</script>";
            } else if ($type == 'HOSPITAL') {
                echo "<script>alert('Login Success'); window.location='HOSPITAL/hospitalHome.php'</script>";
            } else {
                echo "<script>alert('Login Failed')</script>";
            }
        } else {
            echo "<script>alert('Your account is inactive. Please contact admin.'); window.location='index.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid Email / Password'); window.location='index.php'</script>";
    }
}
?>


    <script src="js/fontawesome.js"></script>

</body>

</html>