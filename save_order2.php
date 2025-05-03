<?php

include("db_connect.php"); 
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Error: User not logged in.";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // fetch user details
    $user_first_name = mysqli_real_escape_string($conn, $_POST['user_first_name']);
    $user_last_name = mysqli_real_escape_string($conn, $_POST['user_last_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $city = mysqli_real_escape_string($conn, $_POST['City']);
    $province = mysqli_real_escape_string($conn, $_POST['Province']);
    $house_street = mysqli_real_escape_string($conn, $_POST['address2']);
    $area = mysqli_real_escape_string($conn, $_POST['Area']);
    

    // insert into orderdetails
    $sql_orderdetails = "INSERT INTO orderdetails (user_first_name, user_last_name, address, contact_number, city, province, house_street, area, created_at)
                         VALUES ('$user_first_name', '$user_last_name', '$address', '$contact_number', '$city', '$province', '$house_street', '$area', NOW())";

    if ($conn->query($sql_orderdetails) === TRUE) {
        $orderdetails_id = $conn->insert_id;
        $_SESSION['orderdetails_id'] = $orderdetails_id;

        // retrieve from hidden
        $item_id = mysqli_real_escape_string($conn, $_POST['id']);
        $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $restaurant_id = mysqli_real_escape_string($conn, $_POST['restaurant_id']);
        $image_path = mysqli_real_escape_string($conn, $_POST['image_path']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $status = "pending";
        
        $subtotal =$price;
        

        $user_id = $_SESSION['user_id'];
        //insert into order
        $sql_orders = "INSERT INTO orders (user_id, status, total_amount, order_date)
                       VALUES ('$user_id', '$status', '$subtotal', NOW())";

        if ($conn->query($sql_orders) === TRUE) {
            $order_id = $conn->insert_id;
            echo "Received image path: " . $image_path;

            // insert into order_details
            $sql_order_details = "INSERT INTO order_details (order_id, item_name, quantity, price, subtotal, restaurant_id, description, image_path)
                                  VALUES ('$order_id', '$item_name', '$quantity', '$price', '$subtotal', '$restaurant_id', '$description', '$image_path')";

            if ($conn->query($sql_order_details) === TRUE) {
                $_SESSION['order_id'] = $order_id;
                header("Location: payment2.php"); // redirect to payment page
                exit();
            } else {
                echo "Error saving order details: " . $conn->error;
            }
        } else {
            echo "Error creating order: " . $conn->error;
        }
    } else {
        echo "Error saving user details: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>