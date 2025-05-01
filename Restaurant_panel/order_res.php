<?php
session_start();
$isLoggedIn = isset($_SESSION['restaurant_id']);

$servername = "localhost";
$username = "root";
$password = "";
$database = "orders_db";
$port = "3307";

$conn = new mysqli($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update Order Status Securely
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'], $_POST['order_id'], $_POST['status'])) {
    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE order_id = ?");
    $stmt->bind_param("si", $_POST['status'], $_POST['order_id']);
    $stmt->execute();
    $stmt->close();
}

// Fetch Orders for Logged-in Restaurant
$restaurantId = intval($_SESSION['restaurant_id']);

$sql = "
    SELECT
        o.order_id, o.user_id, o.status, o.total_amount, o.order_date,
        u.fname AS user_name,
        r.restaurant_name,
        GROUP_CONCAT(od.item_name, ' (Quantity: ', od.quantity, ')') AS order_items,
        GROUP_CONCAT('Price: Rs. ', od.price, ' x ', od.quantity SEPARATOR '<br>') AS item_prices
    FROM orders o
    JOIN users.form u ON o.user_id = u.id
    LEFT JOIN order_details od ON o.order_id = od.order_id
    LEFT JOIN restaurants.restaurant_table r ON od.restaurant_id = r.id
    WHERE od.restaurant_id = ?
    GROUP BY o.order_id
    ORDER BY o.order_date DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $restaurantId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Restaurant Orders - Foodly</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
  <style>
    * { margin: 0; padding: 0; font-family: 'Poppins'; }
    table { margin: 40px; width: 90%; border-collapse: collapse; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    .pending { 
        color: #ffc107; }
    .processing { 
        color: #007bff; }
    .completed { 
        color: #28a745; }
    .cancelled { 
        color: #dc3545; }

    .status-dropdown-container { 
        position: relative; 
        display: inline-block;
     }
    .status-dropdown { 
        padding: 5px;
         border: 1px solid #ccc; 
         border-radius: 4px; 
         cursor: pointer;
         }
    .status-buttons { 
        display: none;
         position: absolute;
          background: #f8f9fa;
           border: 1px solid #ccc; 
           z-index: 10; }
    .status-buttons.show { 
        
        display: block; 
    }
    .status-button { 
        background: transparent; 
        border: none; 
        width: 100%;
         padding: 8px;
          cursor: pointer; 
          text-align: left; 
        }
    .status-button:hover { 
        background-color: #e9ecef; 
    }

    header { 
        width: 94%; 
    }
    .navbar {
      display: flex; justify-content: space-between; align-items: center;
      padding: 10px 30px; background-color: white;
    }
    .logo img { 
        height: 70px; }
    .navlinks { 
        list-style: none; display: flex; gap: 50px; }
    .navlinks a {
      text-decoration: none; font-size: 13px; color: black;
      padding: 10px; transition: 0.3s ease;
    }
    .navlinks a:hover {
      background-color: #FC8A06; color: white; border-radius: 20px;
    }
    .dropdown-menu {
      display: none; position: absolute; background: white; right: 0;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2); z-index: 1000;
    }
    .dropdown-menu.show { 
        display: block; }
    .dropdown-menu a {
      padding: 10px 16px; display: block; color: black; text-decoration: none;
    }
    .dropdown-menu a:hover { background-color: #FC8A06; }

    .dropdown.button{
        background-color: #FC8A06;
    }
    .account-btn {
  padding: 8px 16px;
  background-color: #FC8A06; /* or any theme color */
  color: white;
  border: none;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.account-btn:hover {
  background-color: #e65c00;
}

  </style>
</head>
<body>

<header>
  <nav class="navbar">
    <div class="logo"><img src="Images/Logo.png" alt="Foodly Logo"></div>
   <h3>Restaurant Panel - Orders</h3>
    <div class="login-signup">
      <?php if ($isLoggedIn): ?>
        <div class="dropdown">
          <button onclick="toggleDropdown()" class="account-btn">Account</button>
          <div class="dropdown-menu" id="accountDropdown">
            <a href="Menu1_res.php">Menu</a>
            <a href="order_res.php">Orders</a>
            <a href="logout.php">Logout</a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </nav>
</header>

<main style="padding: 20px;">
  <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>Order ID</th>
          <th>User Name</th>
          <th>Restaurant</th>
          <th>Order Items</th>
          <th>Total Price</th>
          <th>Order Time</th>
          <th>Payment Type</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['order_id'] ?></td>
            <td><?= $row['user_name'] ?></td>
            <td><?= $row['restaurant_name'] ?></td>
            <td><?= $row['order_items'] ?><br><?= $row['item_prices'] ?></td>
            <td>Rs. <?= $row['total_amount'] ?></td>
            <td><?= $row['order_date'] ?></td>
            <td>COD</td>
            <td>
              <div class="status-dropdown-container">
                <div class="status-dropdown" onclick="toggleStatusDropdown(this)">
                  <span class="<?= strtolower($row['status']) ?>"><?= ucfirst($row['status']) ?></span>
                </div>
                <div class="status-buttons">
                  <?php foreach (['Pending', 'Processing', 'Completed', 'Cancelled'] as $status): ?>
                    <form method="post">
                      <input type="hidden" name="order_id" value="<?= $row['order_id'] ?>">
                      <input type="hidden" name="status" value="<?= $status ?>">
                      <button type="submit" name="update_status" class="status-button <?= strtolower($status) ?>">
                        <?= $status ?>
                      </button>
                    </form>
                  <?php endforeach; ?>
                </div>
              </div>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No orders found.</p>
  <?php endif; ?>
</main>

<script>
  function toggleDropdown() {
    document.getElementById('accountDropdown').classList.toggle('show');
  }

  function toggleStatusDropdown(el) {
    const allDropdowns = document.querySelectorAll('.status-buttons');
    allDropdowns.forEach(d => d.classList.remove('show'));
    el.nextElementSibling.classList.toggle('show');
  }

  window.onclick = function(event) {
    if (!event.target.matches('.status-dropdown, .status-dropdown *')) {
      document.querySelectorAll('.status-buttons').forEach(d => d.classList.remove('show'));
    }
  };
</script>

</body>
</html>
