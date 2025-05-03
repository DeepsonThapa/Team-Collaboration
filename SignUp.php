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
    $confirmPassword = $_POST['Confirm_Password'];

    $check_email = mysqli_query($conn, "SELECT Email FROM form WHERE Email = '".$_POST['Email']."' ");

    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else if (strlen($_POST['Password']) < 8) {
        echo "<script>alert('Password Must be >= 8');</script>";
    } else if (strlen($_POST['Phone']) < 10) {
        echo "<script>alert('Invalid phone number!');</script>";
    } else if (mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('Email Already exists!');</script>";
    } else if (!empty($email) && !empty($password)) {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO form (fname, lname, Email, Phone, Address, Password) 
                VALUES('$fname', '$lname', '$email', '$phone', '$address', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'> alert('Registration successful!'); </script>";
            echo "<script>window.location.href='Login.php';</script>";
exit;
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
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins';
          }
          .form-section input::placeholder{
            font-size: 12px;

          }

          .terms-list li{
            font-size:11px;
          }
          .terms-list li input[type="checkbox"] {
            margin-left:20px;
            margin-right:20px;
          }
          
          .welcome-section p {
            font-size: 12.5px;
            margin-bottom: 15px;
          }
          .welcome-section a{
            text-decoration:none;
            color:#FC8A06;
          }

    </style>

</head>
<body>
     <!-- Left Section-->

  <div class="container">

    <div class="form-section">
      <h1>Sign Up | Foodly</h1>
      <p>Create new account</p>
      <form method="POST" onsubmit="return validatePasswords()">
    
        
        
<div class="name-container">
    
       <input id="name-container1" type="text" name="fname" placeholder="First Name" required>
       <input id="name-container2" type="text" name="lname" placeholder="Last Name" required></div>
       <input type="number" name="Phone" placeholder="Enter your phone number" required>
        <input type="email" name="Email" placeholder="Enter your E-mail Address" required><br>
        <input type="text" name="Address" placeholder="Enter your Address" required>
      
       
        <input type="password" name="Password" placeholder="Create Password" required><br>
        <input type="password" name="Confirm_Password" placeholder="Confirm Password" required><br>
        

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
     <button class="login-btn"><a href="Login.php">Login</button></a>
    </div>
  </div>

  <script>

function validatePasswords() {

  const password = document.getElementById("Password").value;
  const confirmPassword = document.getElementById("Confirm_Password").value;

 
  if (password !== confirmPassword) {
    alert("Passwords do not match!");
    return false; 
  }


  return true;
}

</script>
</body>
</html>


