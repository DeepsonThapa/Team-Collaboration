<?php
session_start();

//ensuring admin login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "orders_db";
$port = "3307";

$conn = new mysqli($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//ststus update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status']) && isset($_POST['order_id']) && isset($_POST['status'])) {
    $orderId = intval($_POST['order_id']);
    $newStatus = $conn->real_escape_string($_POST['status']);
    $conn->query("UPDATE orders SET status = '$newStatus' WHERE order_id = $orderId");
    
}

// fetching orders
$sql = "
    SELECT
        o.order_id, o.user_id, o.status, o.total_amount, o.order_date,
        u.fname AS user_name,
        r.restaurant_name AS restaurant_name,
        GROUP_CONCAT(od.item_name, ' (Quantity: ', od.quantity, ')') AS order_items,
        GROUP_CONCAT('Price: Rs. ', od.price, ' x ', od.quantity SEPARATOR '<br>') AS item_prices
    FROM orders_db.orders o
    JOIN users.form u ON o.user_id = u.id
    LEFT JOIN orders_db.order_details od ON o.order_id = od.order_id
    LEFT JOIN restaurants.restaurant_table r ON od.restaurant_id = r.id
    GROUP BY o.order_id, o.user_id, o.status, o.total_amount, o.order_date, u.fname, r.restaurant_name
    ORDER BY o.order_date DESC
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Orders</title>
    <link rel="stylesheet" href="admin_orders.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style type="text/css">
             * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins';
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .status-dropdown-container {
            position: relative;
            display: inline-block;
        }
        .status-dropdown {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f8f9fa;
            font-size: 13px;
            cursor: pointer;
        }
        .status-buttons {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 10;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f8f9fa;
            display: none;
            min-width: 120px;
        }
        .status-buttons.show {
            display: block;
        }
        .status-button {
            display: block;
            width: 100%;
            padding: 8px;
            text-align: left;
            border: none;
            background-color: transparent;
            cursor: pointer;
            font-size: 13px;
        }
        .status-button:hover {
            background-color: #e9ecef;
        }
        .pending { color: #ffc107; }
        .processing { color: #007bff; }
        .completed { color: #28a745; }
        .cancelled { color: #dc3545; }
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <img src="Images/Logo.png" alt="Foodly Logo" />
            </div>
            <nav>
                <p>MAIN</p>
                <ul>
                    <a href="Admin_Dashboard.php"><li>Dashboard</li></a>
                    <a href="admin_orders.php"><li class="active">Orders</li></a>
                    <a href="admin_restaurants.php"><li>Restaurants</li></a>
                    <a href="admin_requests.php"><li>Requests</li></a>
                </ul>
                <ul>
          <a href="admin_logout.php"><li class="logout">Logout</li></a>
        </ul>
            </nav>
          
        </aside>

    <div class="main-content">
        <header class="header">
            <div class="header-left">
                <h1>Administration Panel</h1>
            </div>
        </header>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User Name</th>
                        <th>Restaurant Name</th>
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
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['restaurant_name']; ?></td>
                            <td>
                                <?php echo $row['order_items']; ?>
                                <br>
                                <?php echo $row['item_prices']; ?>
                            </td>
                            <td>Rs. <?php echo $row['total_amount']; ?></td>
                            <td><?php echo $row['order_date']; ?></td>
                            <td><?php echo $row['payment_type'] = "COD";?></td>
                            <td>

                            <!--for updating status-->
                            <div class="status-dropdown-container">
                                    <div class="status-dropdown" onclick="toggleStatusDropdown(this)">
                                        <span class="<?php echo strtolower($row['status']); ?>"><?php echo ucfirst($row['status']); ?></span>
                                    </div>
                                    <div class="status-buttons">
                                        <form method="post" style="display: inline;">
                                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                            <input type="hidden" name="status" value="Pending">
                                            <button type="submit" name="update_status" class="status-button pending">Pending</button>
                                        </form>
                                        <form method="post" style="display: inline;">
                                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                            <input type="hidden" name="status" value="Processing">
                                            <button type="submit" name="update_status" class="status-button processing">Processing</button>
                                        </form>
                                        <form method="post" style="display: inline;">
                                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                            <input type="hidden" name="status" value="Completed">
                                            <button type="submit" name="update_status" class="status-button completed">Completed</button>
                                        </form>
                                        <form method="post" style="display: inline;">
                                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                            <input type="hidden" name="status" value="Cancelled">
                                            <button type="submit" name="update_status" class="status-button cancelled">Cancelled</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>
    </div>

    <script>
        function toggleStatusDropdown(dropdownElement) {
            const statusButtons = dropdownElement.nextElementSibling;
            statusButtons.classList.toggle('show');
            
            const allDropdownContainers = document.querySelectorAll('.status-dropdown-container');
            allDropdownContainers.forEach(container => {
                if (container !== dropdownElement.parentNode) {
                    container.querySelector('.status-buttons').classList.remove('show');
                }
            });
        }
        //to close dropdown if elsewhere id clicked
        window.onclick = function(event) {
            if (!event.target.matches('.status-dropdown')) {
                const dropdowns = document.querySelectorAll('.status-buttons');
                dropdowns.forEach(dropdown => {
                    if (dropdown.classList.contains('show')) {
                        dropdown.classList.remove('show');
                    }
                });
            }
        }
    </script>
    <?php
    $conn->close();
    ?>
</body>
</html>