<?php
include("Menu_Conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // fetch current data
    $stmt = $conn->prepare("SELECT * FROM menu_items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $item = $stmt->get_result()->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE menu_items SET name=?, description=?, price=? WHERE id=?");
    $stmt->bind_param("ssdi", $name, $desc, $price, $id);

    if ($stmt->execute()) {
        header("Location: Menu1_res.php?msg=Item updated successfully");
    } else {
        echo "Error updating item.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Item</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 30px;
    }

    form {
      max-width: 400px;
      margin: auto;
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    input[type="text"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #FC8A06;
      color: white;
      border: none;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color:rgb(239, 133, 11);
    }
  </style>
</head>
<body>

<form method="POST">
  <h2>Edit Food Item</h2>
  <h3>Item Name</h3>
  <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
  <h3>Description</h3>
  <textarea name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
  <h3>Price</h3>
  <input type="number" step="0.01" name="price" value="<?php echo $item['price']; ?>" required>
  <button type="submit">Update</button>
</form>

</body>
</html>
