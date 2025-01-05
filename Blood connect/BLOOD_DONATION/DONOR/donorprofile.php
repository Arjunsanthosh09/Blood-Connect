<?php
session_start();
include("../DBConnection/dbConnection.php");

$id = $_SESSION['uid'];
$type = $_SESSION['type'];

// Fetch donor login details
$query = "SELECT * FROM login WHERE reg_id = '$id' AND type = 'DONOR'";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $email = $data['email'];
    $password = $data['password']; 
} else {
    echo "<script>alert('Donor login details not found!');</script>";
    exit();
}

// Fetch donor profile details
$donorQuery = "SELECT * FROM donor_reg WHERE d_email = '$email'";
$donorResult = mysqli_query($conn, $donorQuery);
if ($donorResult && mysqli_num_rows($donorResult) > 0) {
    $donorData = mysqli_fetch_assoc($donorResult);
} else {
    echo "<script>alert('Donor profile details not found!');</script>";
    exit();
}

// Handle profile update
if (isset($_POST['submit'])) {
    $newpass = $_POST['new_password'];
    $confirmpass = $_POST['confirm_password'];
    $newemail = $_POST['email'];
    $newName = $_POST['d_name'];
    $newPhone = $_POST['d_phone'];
    $newAddress = $_POST['d_address'];
    $newDisease=$_POST['d_disease'];
    $newAge= $_POST['d_age'];

    if ($newpass == $confirmpass) {
        $updateLoginQry = "UPDATE login SET email = '$newemail', password = '$newpass' WHERE reg_id = '$id' AND type = 'DONOR'";
        $updateDonorQry = "UPDATE donor_reg SET d_name = '$newName', d_phone = '$newPhone', d_address = '$newAddress', d_email = '$newemail',d_diseases='$$newDisease',d_age='$newAge' WHERE d_email = '$email'";

        if (mysqli_query($conn, $updateLoginQry) && mysqli_query($conn, $updateDonorQry)) {
            echo "<script>alert('Profile updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating profile. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    :root {
        --primary-blue: #1a4f8b;
        --secondary-blue: #2c7be5;
        --light-blue: #f0f5ff;
        --dark-blue: #153e6f;
        --white: #ffffff;
    }

    body {
        background-color: var(--light-blue);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

#adminnavbar {
  background-color: var(--primary-blue);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 1rem 0;
}

#adminnavbar .nav-link {
  color: var(--white);
  font-weight: 500;
  padding: 0.5rem 1rem;
  transition: all 0.3s ease;
}

#adminnavbar .nav-link:hover {
  color: #e0e0e0;
  transform: translateY(-1px);
}

#adminnavbar .nav-link.logout-btn {
  background-color: #ff3547;
  border-radius: 4px;
  padding: 0.5rem 1.5rem;
}

#adminnavbar .nav-link.logout-btn:hover {
  background-color: #ff1f35;
}

.container {
  background-color: var(--white);
  border-radius: 8px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
  margin-top: 2rem;
  padding: 2rem;
}

h2 {
  color: var(--primary-blue);
  font-weight: 600;
  margin-bottom: 2rem;
  padding-bottom: 1rem;
  border-bottom: 2px solid var(--light-blue);
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-group label {
  color: var(--primary-blue);
  font-weight: 500;
  margin-bottom: 0.5rem;
}

.form-control {
  border: 1px solid #e0e0e0;
  border-radius: 18px;
  padding: 0.75rem;
  transition: all 0.3s ease;
}

.form-control:focus {
  border-color: var(--secondary-blue);
  box-shadow: 0 0 0 0.2rem rgba(44, 123, 229, 0.25);
}

.form-control[readonly] {
  background-color: #f8f9fa;
  border-color: #e0e0e0;
}

.btn-custom {
  background-color: var(--secondary-blue);
  border: none;
  color: var(--white);
  font-weight: 500;
  padding: 0.75rem 2rem;
  transition: all 0.3s ease;
}

.btn-custom:hover {
  background-color: var(--primary-blue);
  transform: translateY(-1px);
}

.alert {
  border-radius: 4px;
  margin-top: 1.5rem;
  padding: 1rem;
}

.alert-success {
  background-color: #d4edda;
  border-color: #c3e6cb;
  color: #155724;
}

.alert-danger {
  background-color: #f8d7da;
  border-color: #f5c6cb;
  color: #721c24;
}

@media (max-width: 768px) {
  .container {
    padding: 1.5rem;
  }
  
  .btn-custom {
    width: 100%;
  }
  
  #adminnavbar .navbar-nav {
    margin: 1rem 0;
  }
}
input[type="password"] {
  letter-spacing: 0.1em;
}

form {
  max-width: 600px;
  margin: 0 auto;
}

.form-control, .btn-custom, .nav-link {
  transition: all 0.3s ease-in-out;
}
  </style>
</head>
<body>
  <nav id="adminnavbar" class="navbar navbar-expand-lg navbar-dark">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mx-lg-auto">
          <li class="nav-item active">
              <a class="nav-link" href="donorHome.php">Home</a>
          </li>
          
          <li class="nav-item">
              <a class="nav-link" href="donorprofile.php">Profile</a>
          </li>
          <li class="nav-item">
              <a class="nav-link logout-btn" href="logout.php">Log Out</a>
          </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h2>Donor Profile</h2>
    <form method="POST">
      <div class="form-group">
            <label for="d_name">Name</label>
            <input type="text" class="form-control" id="d_name" name="d_name" value="<?php echo htmlspecialchars($donorData['d_name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="<?php echo htmlspecialchars($data['type']); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Current Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" >
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" >
        </div>
        

        <div class="form-group">
            <label for="d_phone">Phone</label>
            <input type="text" class="form-control" id="d_phone" name="d_phone" value="<?php echo htmlspecialchars($donorData['d_phone']); ?>" >
        </div>

        <div class="form-group">
            <label for="d_address">Address</label>
            <input type="text" class="form-control" id="d_address" name="d_address" value="<?php echo htmlspecialchars($donorData['d_address']); ?>" >
        </div>
        <div class="form-group">
            <label for="d_name">Disease</label>
            <input type="text" class="form-control" id="d_disease" name="d_disease" value="<?php echo htmlspecialchars($donorData['d_diseases']); ?>" >
        </div>
        <div class="form-group">
            <label for="d_name">Age</label>
            <input type="text" class="form-control" id="d_age" name="d_age" value="<?php echo htmlspecialchars($donorData['d_age']); ?>" >
        </div>
        <button type="submit" class="btn btn-custom" name="submit">Update Profile</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
