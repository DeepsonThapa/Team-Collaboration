<?php
session_start(); 

$user_id = $_SESSION['user_id']; // user id from session

$conn = new mysqli("localhost", "root", "", "orders_db", 3307);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// start transaction
$conn->begin_transaction();

try {
    // total amount 
    $totalAmountSql = "SELECT SUM(price * quantity) AS total FROM cart WHERE user_id = ?";
    $totalAmountStmt = $conn->prepare($totalAmountSql);
    $totalAmountStmt->bind_param("i", $user_id);
    $totalAmountStmt->execute();
    $totalAmountResult = $totalAmountStmt->get_result();
    $totalAmountRow = $totalAmountResult->fetch_assoc();
    $total_amount = $totalAmountRow['total'] ?? 0;

    if ($total_amount == 0) {
        throw new Exception("Error: Cart is empty!");
    }

    // insert into orders table 
    $orderSql = "INSERT INTO orders (user_id, status, total_amount) VALUES (?, 'Pending', ?)";
    $orderStmt = $conn->prepare($orderSql);
    $orderStmt->bind_param("id", $user_id, $total_amount);

    if (!$orderStmt->execute()) {
        throw new Exception("Error placing order: " . $orderStmt->error);
    }

    // get the last inserted order id
    $order_id = $conn->insert_id;

    // fetch cart items for this user
    $cartSql = "SELECT name, price, quantity, description, restaurant_id, image_path FROM cart WHERE user_id = ?";
    $cartStmt = $conn->prepare($cartSql);
    $cartStmt->bind_param("i", $user_id);
    $cartStmt->execute();
    $cartResult = $cartStmt->get_result();


    while ($row = $cartResult->fetch_assoc()) {
        $description = !empty($row['description']) ? $row['description'] : 'No description';
        $image_path = $row['image_path'];  

        // insert order details h
        $insertDetailSql = "INSERT INTO order_details (order_id, item_name, quantity, price, restaurant_id, description, image_path) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)";    

        $insertDetailStmt = $conn->prepare($insertDetailSql);
        
       
        $insertDetailStmt->bind_param("isidiss", 
            $order_id, 
            $row['name'], 
            $row['quantity'], 
            $row['price'], 
            $row['restaurant_id'], 
            $description, 
            $image_path
        );

        if (!$insertDetailStmt->execute()) {
            throw new Exception("Error inserting order details: " . $insertDetailStmt->error);
        }
    }

    // clear the cart after order 
    $deleteCartSql = "DELETE FROM cart WHERE user_id = ?";
    $deleteCartStmt = $conn->prepare($deleteCartSql);
    $deleteCartStmt->bind_param("i", $user_id);
    if (!$deleteCartStmt->execute()) {
        throw new Exception("Error clearing cart: " . $deleteCartStmt->error);
    }

    $conn->commit();

    echo "Order placed successfully!";
} catch (Exception $e) {
    $conn->rollback(); 
    die("Transaction failed: " . $e->getMessage());
}
?>
