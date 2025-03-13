<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "restaurants";
$port = "3307";

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $owner_name = mysqli_real_escape_string($conn, $_POST['owner_name']);
    $restaurant_name = mysqli_real_escape_string($conn, $_POST['restaurant_name']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $cuisine = mysqli_real_escape_string($conn, $_POST['cuisine']);
    $menu_path = "Menu1.php";
    
    $upload_dir = "uploads/";
    $img_path = handleFileUpload($_FILES['img_path'], $upload_dir, array('jpg', 'jpeg', 'png', 'gif'));

    // Check if passwords match
    if ($_POST['password'] !== $_POST['confirm_password']) {
        die("<script>alert('Passwords do not match!'); window.history.back();</script>");
    }

    // Hash the password before storing it
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($img_path) {
        $sql = "INSERT INTO restaurant_table (owner_name, restaurant_name, email_address, Address, contact_number, img_path, menu_path, cuisine, password, approval_status) 
                VALUES ('$owner_name', '$restaurant_name', '$email_address', '$address', '$contact_number', '$img_path', '$menu_path', '$cuisine', '$hashed_password', 'pending')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Restaurant registration successful! Your request is pending approval.');</script>";
            echo "<script>window.location.href = 'Restaurant.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}


function handleFileUpload($file, $upload_dir, $allowed_extensions) {
    $file_name = basename($file['name']);
    $file_tmp = $file['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $file_size = $file['size'];

    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "Error: File upload failed with code " . $file['error'] . "<br>";
        return false;
    }

    if (!in_array($file_ext, $allowed_extensions)) {
        echo "Error: Invalid file type. Allowed types are: " . implode(", ", $allowed_extensions) . "<br>";
        return false;
    }

    if ($file_size > 5000000) { //5MB limiit
        echo "Error: File size exceeds the limit.<br>";
        return false;
    }

//to create upload folder if doenot already exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true); 
    }

    $new_file_name = uniqid() . "." . $file_ext;//file name
    $file_destination = $upload_dir . $new_file_name;

    if (move_uploaded_file($file_tmp, $file_destination)) {
        return $file_destination; 
    } else {
        echo "Error: Failed to move uploaded file.<br>";
        return false;
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

        .request-btn button {
            margin-top:20px;
        }
        .container {
            height:560px;
        }
        .c{
    display:flex;
    gap:20px;

}
.uploads{
    display:flex;
    gap:20px;

}
   </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h2>Partner with us:</h2>
            <p>Please fill up your details.</p>
<!--form-->
            <form method="POST" enctype="multipart/form-data">
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
            <div class="c">
                <div>
                    <h5>Contact Number</h5>
                    <input type="tel" name="contact_number" placeholder="Your Contact Number" required>
                </div>
                <div>
                    <h5>Cuisine</h5>
                    <input type="text" name="cuisine" placeholder="Type of Cuisine" required>
                </div>
            </div>
            <div class="c">
                <div>
                    <h5>Password</h5>
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>
                <div>
                    <h5>Confirm Password</h5>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
            </div>
                <div class="uploads">
                    <div>
                        <h5>Restaurant Image</h5>
                        <input type="file" name="img_path" required>
                    </div>
                    <div>
                        <h5>Menu</h5>
                        <input type="file" name="menu_path" required>
                    </div>
                </div>
                <div class="request-btn">
                    <button type="submit">Send Request</button>
                </div>
            </form>
            </div>
    </div>
    <script>
    
    const form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        const password = form.querySelector('[name="password"]').value;
        const confirmPassword = form.querySelector('[name="confirm_password"]').value;
        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            event.preventDefault(); 
        }
    });
</script>
</body>
</html>
