<?php
session_start();
include("Conn.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = trim($_POST['Email']);
    $password = trim($_POST['Password']);

    if (!empty($email) && !empty($password)) {
        $stmt = $conn->prepare("SELECT id, Password FROM form WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
      

            if (password_verify($password, $user['Password'])) {
              $_SESSION['user_id'] = $user['id'];
              $redirectUrl = 'Home.php';
              if (isset($_SERVER['HTTP_REFERER'])) {
                  $referrer = $_SERVER['HTTP_REFERER'];
                  if (strpos($referrer, 'Home.php') !== false) { 
                      $redirectUrl = 'Home.php';
                  }
              } else {
                  error_log("HTTP_REFERER not set!");
              }

              echo "<script>
                      alert('Login successful!');
                      window.location.href = '$redirectUrl';
                    </script>";
              exit;
          } else {
              echo "<script>alert('Incorrect password!');</script>";
          }
      } else {
          echo "<script>alert('No account found with this email!');</script>";
      }
      $stmt->close();
  } else {
      echo "<script>alert('Please fill in all fields!');</script>";
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
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
  <div class="container">
    <div class="form-section">
      <h1>Login | Foodly</h1>
      <form method="POST">
        <h5>Email Address</h5>
        <input type="email" name="Email" placeholder="Enter your E-mail Address" required><br>
        <h5>Password</h5>
        <input type="password" name="Password" placeholder="Enter your password" required><br>
      

        <button class="SignUp" type="submit">Login</button>
      </form>
    </div>

    <div class="welcome-section">
      <h1>WELCOME!</h1>
      <p>Enter your credentials <br>to login.</p>
      <p>Don't have an account?</p>
      <button class="signup-btn"><a href="SignUp.php">Sign Up</a></button>
    </div>
  </div>
</body>
</html>
