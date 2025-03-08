<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: Login.php");
    exit();
}

// Fetch user details from the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "signup_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM signup_table WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // User not found in the database
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: Login.php"); // Redirect to login page
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodly</title>
  <link rel="stylesheet" href="Restaurant.css">
  <link rel="icon" href="image.jpeg">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style type="text/css">
      * {
          margin: 0;
          padding: 0;
          font-family: 'Poppins';
        }
  </style>
</head>
<body>

  <header>
    <nav class="navbar">
      <!-- Logo Section -->
      <div class="logo">
        <img src="Logo.png" alt="Foodly Logo" title="www.Foodly.com.np">
      </div>

      <!--Links-->
      <ul class="navlinks">
        <li><a href="home.php">Home</a></li>
        <li><a href="Menu1.php">Browse Menu</a></li>
        <li><a href="List_of_restaurant.php">Restaurants</a></li>
        <li><a href="#AboutUs">About Us</a></li>
        <li> <a href="Login.php" > <img src="R.png" alt="" height="40" width="40"> </a></li>
      </ul>

      <!-- Login-Signup Button or My Account Button -->
      <div class="login-signup">
        <?php
      
        if (isset($_SESSION['user_id'])) {
            // User is logged in, show "My Account" button
            echo '<a href="my_account.php" class="btn">My Account</a>';
        } else {
            // User is not logged in, show "Login/Signup" button
            echo '<a href="Login.php" class="btn">Login/Signup</a>';
        }
        ?>
      </div>
    </nav>
  </header>
  <section class="account-section">
    <h1>My Account</h1>
    <div class="account-details">
      <p><strong>First Name:</strong> <?php echo $user['first_name']; ?></p>
      <p><strong>Last Name:</strong> <?php echo $user['last_name']; ?></p>
      <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
      <p><strong>Phone Number:</strong> <?php echo $user['phone_number']; ?></p>
      <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
    </div>

    <!-- Logout and Forgot Password Links with Inline CSS -->
    <div style="margin-top: 20px; text-align: center;">
      <a href="Logout.php" style="
        background-color: #ff4d4d;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin-right: 10px;
        font-size: 16px;
        transition: background-color 0.3s ease;
      ">Logout</a>

      <a href="forgot_password.php" style="
        background-color: #007BFF;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;
      ">Forgot Password</a>
    </div>
  </section>
</body>
</html>
