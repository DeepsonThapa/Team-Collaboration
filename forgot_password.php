<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "users";
$port = "3307";


$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

       
        $sql = "SELECT * FROM form WHERE Email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['reset_email'] = $email;

            exit();
        } else {
            $message = "No account found with this email!";
        }
    } elseif (isset($_POST['new_password'])) {
      
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password === $confirm_password) {
            // hash password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $email = $_SESSION['reset_email'];
            $sql = "UPDATE form SET Password = '$hashed_password' WHERE Email = '$email'";

            if ($conn->query($sql)) {
                $message = "Password reset successfully!";
                unset($_SESSION['reset_email']); 
                header("Location: Login.php"); // redirect login page
                exit();
            } else {
                $message = "Error updating password: " . $conn->error;
            }
        } else {
            $message = "Passwords do not match!";
        }
    }
}

$conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password | Foodly</title>
  <link rel="stylesheet" href="Login.css">
</head>
<body>
  <div class="container">
    <div class="form-section">
      <h1>Forgot Password</h1>
      <?php if (!empty($message)): ?>
        <p style="color: red;"><?php echo $message; ?></p>
      <?php endif; ?>

      <!-- enter email -->
      <?php if (!isset($_SESSION['reset_email'])): ?>
        <form method="POST" action="">
          <h5>Enter your email address</h5>
          <input type="email" name="email" placeholder="Enter your E-mail Address" required><br>
          <button class="SignUp" type="submit">Reset Password</button>
        </form>
      <?php else: ?>
        <!--enter password -->
        <form method="POST" action="">
          <h5>Enter New Password</h5>
          <input type="password" name="new_password" placeholder="New Password" required><br>
          <h5>Confirm New Password</h5>
          <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
          <button class="SignUp" type="submit">Change Password</button>
        </form>
      <?php endif; ?>
      <p>Remember your password? <a href="Login.php">Login here</a></p>
    </div>
  </div>
</body>
</html>