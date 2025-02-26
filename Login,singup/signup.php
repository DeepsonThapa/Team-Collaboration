<?php
// MySQL server credentials
$servername = "localhost"; // XAMPP default hostname
$username = "root";        // Default username
$password = "";            // Default password (blank for XAMPP)
$database = "signup_database"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start(); // starting the session 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve and sanitize inputs
    $first_name = $_POST['first_name'];
    $last_name =$_POST['last_name'];
    $phone_number = $_POST['Phone_number'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $password = $_POST['Password'];
    $confirmPassword = $_POST['ConfirmPassword'];

    // Check if password and confirm password match
    if ($password !== $confirmPassword) {       
        echo 'Passwords do not match!';
    } else {
      

        // Insert new user data into the database
        $sql = "INSERT INTO signup_table (first_name, last_name, phone_number, email, Address, Password) 
                VALUES ('$first_name', '$last_name', '$phone_number', '$email', '$address', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Signup successful!');</script>";  // javascript alert for login 
            echo "<script>window.location.href = 'login.php';</script>"; // javascript link
        } else {
            echo "Error: " . $conn->error ;
        }
    }
}
$conn->close(); // closing the connection 
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up | Foodly</title>
  <link rel="stylesheet" href="SignUp.css">
</head>
<body>
  <div class="container">
    <div class="form-section">
      <h1>Sign Up | Foodly</h1>
      <p>Create new account</p>
      <form method="POST">
  <div class="name-container">
    <input id="name-container1" type="text" name="first_name" placeholder="First Name" required>
    <input id="name-container2" type="text" name="last_name" placeholder="Last Name" required>
  </div>
  <input type="tel" name="Phone_number" placeholder="Enter your phone number" pattern="[0-9]{10}" title="Enter a valid 10-digit phone number" required>
  <input type="email" name="Email" placeholder="Enter your E-mail Address" required>
  <input type="text" name="Address" placeholder="Enter your Address" required>
  <input type="password" name="Password" placeholder="Create Password" minlength="6" required>
  <input type="password" name="ConfirmPassword" placeholder="Confirm Password" minlength="6" required>
  <div class="checkbox-container">
    <ul class="terms-list">
    <input type="checkbox" id="terms" name="terms" required>
    <label for="terms">I agree to Foodly's <a href="#">Terms of Service</a>, <a href="#">Privacy Policy</a>, and <a href="#">Content Policies</a></label>
    </ul>
  </div>
  <button class="SignUp" type="submit">Sign Up</button>
</form>

    </div>

    <div class="welcome-section">
      <h1>WELCOME!</h1>
      <p>Enter your personal details <br>and start your journey with us.</p>
      <br><br>
      <p>Already have an account?</p>
      <button class="login-btn"><a href="Login.php">Login</a></button>
    </div>
  </div>
</body>
</html>
  