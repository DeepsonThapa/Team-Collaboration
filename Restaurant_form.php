<?php
// MySQL server credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "restaurant_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate user inputs
    $owner_name = $_POST['owner_name'];
    $restaurant_name = $_POST['restaurant_name'];
    $email_address = $_POST['email_address'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $restaurant_details = $_POST['restaurant_details'];

    // Prepare the SQL statement
    $sql = "INSERT INTO restaurant_table (owner_name, restaurant_name, email_address, Address, contact_number,restaurant_details) 
    VALUES ('$owner_name', '$restaurant_name', '$email_address', '$address', '$contact_number', '$restaurant_details')";

if ($conn->query($sql) === TRUE) {
echo "<script>alert(' successful!');</script>";  // javascript alert for restaurant signup 
echo "<script>window.location.href = 'Restaurant.html';</script>"; // javascript link
} else {
echo "Error: " . $conn->error ;

   
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner with Foodly</title>
    <link rel="stylesheet" href="Restaurant_Form.css">
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
    <div class="container">
        <div class="form-section">
            <h2>Partner with us:</h2>
            <p>Please fill up your details.</p>

            <!-- Form starts here -->
            <form method="POST">
    <div class="name">
    <div>
        <h5>Your Name</h5>
        <input type="text" name="owner_name" placeholder="Name" required>
    </div>
    <div>
        <h5>Restaurant Name</h5>
        <input type="text" name="restaurant_name" placeholder="Restaurant Name" required>
    </div>
</div>
<div class="address">
    <div>
        <h5>Email Address</h5>
        <input type="email" name="email_address" placeholder="Your Email Address" required>
    </div>
    <div>
        <h5>Address</h5>
        <input type="text" name="address" placeholder="Your Restaurant Address" required>
    </div>
</div>
<div>
    <h5>Contact Number</h5>
    <input type="tel" name="contact_number" placeholder="Your Contact Number" required>
</div>
<div>
    <h5>Restaurant Details</h5>
    <textarea name="restaurant_details" required></textarea>
</div>
<div class="request-btn">
    <button type="submit">Send Request</button>
</div>
            </form>
            <!-- Form ends here -->
        </div>
    </div>
</body>
</html>
