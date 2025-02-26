<?php
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
echo "";

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        // Check if the email exists in the database
        $sql = "SELECT * FROM signup_table WHERE Email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Directly compare the plain-text password
            if ($password === $user['password']) {
                // Store user data in the session
                $_SESSION['user_id'] = $user['id']; // Save user ID or other info as needed
              
                echo "<script>window.location.href = 'home.php';</script>";
            } else {
                echo 'Incorrect password!';
            }
        } else {
            echo 'No account found with this email!';
        }
    } else {
        echo 'Please fill in all fields!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Foodly</title>
  <link rel="stylesheet" href="Login.css">
</head>
<body>
  <!-- Left Section-->
  <div class="container">
    <div class="form-section">
      <h1>Login</h1>
      <form method="POST" action="">
        <h5>E-mail Address</h5>
        <input type="email" name="Email" placeholder="Enter your E-mail Address" required><br>
        <h5>Password</h5>
        <input type="password" name="password" placeholder="Enter your password" required><br>
        <!-- Forgot Password Link -->
        <a href="forgot_password.php" style="display: block; text-align: right; margin-top: 10px; color: #007BFF; text-decoration: none;">Forgot Password?</a>
        <button class="SignUp" type="submit">Login</button>
      </form>
    </div>

    <!-- Right Section-->
    <div class="welcome-section">
      <h1>WELCOME!</h1>
      <p>Enter your credentials <br> to login.</p>
      <br><br>
      <p>Don't have an account?</p>
      <button class="signup-btn"> <a href="signup.php">Sign Up</a></button>
    </div>
  </div>
</body>
</html>
