<?php
// Database connection code
$servername = "localhost";
$username = "root";
$password = "";
$database = "restaurants";
$port = "3307";

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $action = mysqli_real_escape_string($conn, $_GET['action']);

    if ($action == 'approve') {
        $new_status = 'approved';
    } elseif ($action == 'deny') {
        $new_status = 'denied';
    } else {
        echo "Invalid action.";
        exit;
    }

    $sql = "UPDATE restaurant_table SET approval_status = '$new_status' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Restaurant request " . $new_status . " successfully!');</script>";
        echo "<script>window.location.href = 'admin_requests.php';</script>"; // Redirect back to the admin page
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>