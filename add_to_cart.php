<?php

$servername = "localhost";  
$username = "root";  
$password = "";   
$dbname = "orders_db"; 
$port = "3307";

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection successful!";

$data = json_decode(file_get_contents("php://input"), true); 


if (!$data) {
    die("❌ No data received.");
}

//extract input
$name = $data['name'] ?? "";
$description = $data['description'] ?? "";
$price = $data['price'] ?? 0;
$image_path = $data['image_path'] ?? "";
$user_id = $data['user_id'] ?? 0;
$quantity = $data['quantity'] ?? 1;  
$restaurant_id = $data['restaurant_id'] ?? 0;

if (!$user_id || !$name) {
    die("Invalid request! User ID or item name is missing.");
}

$checkQuery = "SELECT Quantity FROM cart WHERE user_id = ? AND name = ? AND restaurant_id = ?";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->bind_param("isi", $user_id, $name, $restaurant_id);
$checkStmt->execute();
$checkStmt->store_result();



if ($checkStmt->num_rows > 0) {
    //  update quantity 
    $checkStmt->bind_result($existingQuantity);
    $checkStmt->fetch();
    $newQuantity = $existingQuantity + $quantity;

    $updateQuery = "UPDATE cart SET Quantity = ? WHERE user_id = ? AND name = ? AND restaurant_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("iisi", $newQuantity, $user_id, $name, $restaurant_id);

    if ($updateStmt->execute()) {
        echo "Item quantity updated to $newQuantity! ✅";
    } else {
        echo "Error updating quantity: " . $updateStmt->error;
    }

    $updateStmt->close();
} else {
    // insert new item 
    $insertQuery = "INSERT INTO cart (user_id, name, description, price, image_path, Quantity, restaurant_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param("issssii", $user_id, $name, $description, $price, $image_path, $quantity, $restaurant_id);

    if ($insertStmt->execute()) {
        echo "Item added to cart successfully! ✅";
    } else {
        echo "Error: " . $insertStmt->error;
    }

    $insertStmt->close();
}

$checkStmt->close();
$conn->close();
?>