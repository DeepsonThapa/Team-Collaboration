<?php
session_start();
include("Conn.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $password = $_POST['Password'];

    if (!empty($email) && !empty($password)) {
        $sql = "INSERT INTO form (fname, lname, Email, Phone, Address, Password) 
                VALUES('$fname', '$lname', '$email', '$phone', '$address', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'> alert('Registration successful!')</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
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
     <!-- Left Section-->

  <div class="container">

    <div class="form-section" action="SignUp.php">
      <h1>Sign Up | Foodly</h1>
      <p>Create new account</p>
      <form method="POST" >
        
        
<div class="name-container">
    
       <input id="name-container1" type="text" name="fname" placeholder="First Name" required>
    


       <input id="name-container2" type="text" name="lname" placeholder="Last Name" required></div>
      
   
       <input type="number" name="Phone" placeholder="Enter your phone number" required>
        <input type="email" name="Email" placeholder="Enter your E-mail Address" required><br>
        <input type="text" name="Address" placeholder="Enter your Address" required>
      
       
        <input type="password" name="Password" placeholder="Create Password" required><br>
        <input type="password" name="Password" placeholder="Confirm Password" required><br>
        
        <!--<input type="password" placeholder="Confirm password" required><br>-->

        <div class="checkbox-container">
          <ul class="terms-list">
          <li><input type="checkbox" id="terms" name="terms" required></li>
          <li><label for="terms">I agree to Foodly's <a href="#">Terms of Service</a>, <a href="#">Privacy Policy</a>, and <a href="#">Content Policies</a></label></li>
        </ul>
        </div>

        <button class="SignUp" type="submit">Sign Up</button>
      </form>
    </div>

    <!-- Right Section:-->

    <div class="welcome-section">
      <h1>WELCOME!</h1>
      <p>Enter your personal details <br>
        and start your journey <br>with us.</p>
      <br>
      <br>
      <p>Already have an account?</p>
      <button class="login-btn"><a href="Login.html">Login</a></button>
    </div>
  </div>
</body>
</html>
