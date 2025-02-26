<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "signup_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // To display messages to the user

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['email'])) {
        // Step 1: Verify Email
        $email = $_POST['email'];

        // Check if the email exists in the database
        $sql = "SELECT * FROM signup_table WHERE Email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Email exists, proceed to password reset
            $_SESSION['reset_email'] = $email; // Store email in session for the next step
            
            exit();
        } else {
            $message = "No account found with this email!";
        }
    } elseif (isset($_POST['new_password'])) {
        // Step 2: Reset Password
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password === $confirm_password) {
            // Update the password in the database (plain text)
            $email = $_SESSION['reset_email'];
            $sql = "UPDATE signup_table SET Password = '$new_password' WHERE Email = '$email'";

            if ($conn->query($sql)) {
                $message = "Password reset successfully!";
                unset($_SESSION['reset_email']); // Clear the session variable
                header("Location: Login.php"); // Redirect to reset password page
            } else {
                $message = "Error updating password: " . $conn->error;
            }
        } else {
            $message = "Passwords do not match!";
        }
    }
}

$conn->close(); // Close the database connection
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

      <!-- Step 1: Enter Email -->
      <?php if (!isset($_SESSION['reset_email'])): ?>
        <form method="POST" action="">
          <h5>Enter your email address</h5>
          <input type="email" name="email" placeholder="Enter your E-mail Address" required><br>
          <button class="SignUp" type="submit">Reset Password</button>
        </form>
      <?php else: ?>
        <!-- Step 2: Enter New Password -->
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
