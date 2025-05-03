<?php
session_start();


include("db_connect.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_id'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $payment_method = isset($_POST['payment']) ? 'Paid' : (isset($_POST['cod']) ? 'Cash on Delivery' : 'Pending');

        unset($_SESSION['order_id']);
        unset($_SESSION['orderdetails_id']);
        unset($_SESSION['direct_order']);

        echo "<h2>Order Placed Successfully!</h2>";
        echo "<p>Payment Method: " . $payment_method . "</p>";
 
    $conn->close();
} else {
    echo "Invalid request.";
}
?>