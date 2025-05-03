<?php
session_start();
include("Menu_Conn.php");

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents("php://input"), true, 512, JSON_THROW_ON_ERROR);
} catch (Exception $e) {
    http_response_code(400);
    die(json_encode(['success' => false, 'message' => 'Invalid JSON format.']));
}

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    die(json_encode(['success' => false, 'message' => 'User not logged in.']));
}

$user_id = $_SESSION['user_id'];
$restaurant_id = 1;


$food_name = trim($data['food_name'] ?? '');
$description = trim($data['description'] ?? '');
$price = filter_var($data['price'] ?? 0, FILTER_VALIDATE_FLOAT);
$image = filter_var($data['image'] ?? '', FILTER_SANITIZE_URL);
$quantity = filter_var($data['quantity'] ?? 0, FILTER_VALIDATE_INT);

if (!$food_name || !$description || !$price || !$image || !$quantity || $price <= 0 || $quantity <= 0) {
    http_response_code(400);
    die(json_encode(['success' => false, 'message' => 'Invalid or missing input data.']));
}

// validate Image URL
if (!filter_var($image, FILTER_VALIDATE_URL)) {
    http_response_code(400);
    die(json_encode(['success' => false, 'message' => 'Invalid image URL.']));
}

// order data
$order_items = [[
    'name' => $food_name,
    'description' => $description,
    'price' => $price,
    'image' => $image,
    'quantity' => $quantity
]];

$total_price = $price * $quantity;

// JSON with error handling
try {
    $order_items_json = json_encode($order_items, JSON_THROW_ON_ERROR);
} catch (Exception $e) {
    http_response_code(500);
    die(json_encode(['success' => false, 'message' => 'Error encoding order items.']));
}

// insert into orders
$stmt = $conn->prepare("INSERT INTO orders (user_id, restaurant_id, order_items, total_price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iissd", $user_id, $restaurant_id, $order_items_json, $total_price);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'order_id' => $stmt->insert_id]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error creating order: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
