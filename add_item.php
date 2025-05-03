<?php
session_start();
include("Menu_Conn.php");

$restaurant_id = $_SESSION['restaurant_id'] ?? null;
if (!$restaurant_id) {
    die("Restaurant not logged in.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // handling image upload
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = "uploads/" . basename($image_name);

    if (move_uploaded_file($image_tmp, $image_path)) {
        $stmt = $conn->prepare("INSERT INTO menu_items (restaurant_id, name, description, price, image_path, category) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issdss", $restaurant_id, $name, $desc, $price, $image_path, $category);

        if ($stmt->execute()) {
            header("Location: Menu1_res.php?msg=Item added successfully");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Food Item</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f3f3;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 400px;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    input, textarea, select {
      width: 100%;
      padding: 10px;
      margin: 12px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }
    input[type="file"] {
      padding: 5px;
    }
    button {
      background-color: #FC8A06;
      color: white;
      padding: 12px;
      border: none;
      width: 100%;
      font-size: 16px;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
    }
    button:hover {
      background-color: #e67e00;
    }
  </style>
</head>
<body>
  <form method="POST" enctype="multipart/form-data" action="add_item.php">
    <h2>Add New Food Item</h2>
    <input type="text" name="name" placeholder="Food Name" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="number" step="0.01" name="price" placeholder="Price (e.g., 200)" required>
    <select name="category" required>
      <option value="">Select Category</option>
      <option>Breakfast</option>
      <option>Lunch</option>
      <option>Dinner</option>
      <option>Cold Drinks</option>
    </select>
    <label for="image">Choose Image</label>
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Add Item</button>
  </form>
</body>
</html>
