<?php
session_start();

$user_id = $_SESSION['user_id'];

$conn = new mysqli("localhost", "root", "", "orders_db", 3307);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$orderSql = "SELECT o.order_id, o.status, o.total_amount, od.item_name, od.quantity, od.price, rt.restaurant_name, 
                    rt.img_path AS restaurant_img, od.image_path, od.description 
             FROM orders o
             JOIN order_details od ON o.order_id = od.order_id
             JOIN restaurants.restaurant_table rt ON od.restaurant_id = rt.id
             WHERE o.user_id = ?";
$orderStmt = $conn->prepare($orderSql);
$orderStmt->bind_param("i", $user_id);
$orderStmt->execute();
$orderResult = $orderStmt->get_result();

if ($orderResult->num_rows == 0) {
    echo "<p>No orders found!</p>";
    exit;
}

$orders = [];
while ($row = $orderResult->fetch_assoc()) {
    $orders[$row['order_id']]['status'] = $row['status'];
    $orders[$row['order_id']]['total_amount'] = $row['total_amount'];
    $orders[$row['order_id']]['items'][] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodly</title>
  <link rel="stylesheet" href="List_Of_Food.css">
  <link rel="icon" href="image.jpeg">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style>
     * {
          margin: 0;
          padding: 0;
          font-family: 'Poppins';
      }
      .one1 {
        margin-top:20px;
          margin-left: 70px;
          color: rgba(194, 192, 192, 0.64);
      }

      .section3 {
          display: flex;
         
          margin: 20px 40px 40px 40px;
      }

      .cart-items-container {
          height: 400px;
          padding: 10px;
          width: 100%;
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          gap: 20px;
      }

      .image-container {
          object-fit: cover;
          height: 100%;
          width: 70%;
          margin-right: 5px;
          overflow: hidden;
          border-radius: 5px;
      }

      .box2 {
          height: 200px;
          width: 150px;
          border: 1px solid #ddd;
          border-radius: 5px;
          padding: 10px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .box2 h2 {
          text-align: center;
          margin-bottom: 10px;
      }

      .box2 ul {
          list-style: none;
          padding: 0;
      }

      .box2 ul li a {
          display: block;
          padding: 8px 10px;
          text-decoration: none;
          color: #333;
          transition: background-color 0.3s;
          font-size: 14px;
      }

      .box2 ul li a:hover {
          color: #FC8A06;
      }

      .box3 {
          flex: 1;
          margin: 12px;
          display: flex;
      }

      .b {
          flex: 1;
      }

      .box3-1 {
          border-bottom: 1px solid #ddd;
          padding: 15px;
          display: flex;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          margin-bottom: 10px;
          background-color: white;
          border-radius: 5px;
      }

      .first {
          align-items: center;
      }

      .c {
          flex: 1;
      }

      .c h3 {
          font-size: 16px;
          margin-bottom: 5px;
      }

      .c p {
          font-size: 13px;
          color: #666;
      }

      .d p {
          font-size: 12px;
      }

      .box3-2 {
          width: 290px;
          border: 1px solid #ddd;
          border-radius: 5px;
          padding: 10px;
          margin-left: 20px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          background-color: white;
      }

      .top {
          background-color: rgb(2, 108, 2);
          color: white;
          padding: 10px;
          text-align: center;
          border-radius: 5px 5px 0 0;
          font-size: 16px;
      }

      .top-1 {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 8px 10px;
          border-bottom: 1px solid #eee;
      }

      .totalprice-1 {
          display: flex;
          justify-content: space-between;
          padding: 10px;
          border-top: 1px solid #eee;
      }

      .bar {
          background-color: #FC8A06;
          color: white;
          padding: 10px;
          text-align: center;
          border-radius: 5px;
          margin-top: 10px;
      }

      .bar p {
          font-size: 14px;
          margin-bottom: 5px;
      }

      .bar h3 {
          font-size: 18px;
      }

      .buttom2 {
          margin-top: 40px;
          background-color: green;
          height: 45px;
          width: 100%;
          border-radius: 10px;
          display: flex;
          justify-content: center;
          align-items: center;
      }

      .buttom2 button {
          width: 100%;
          height: 100%;
          border: none;
          background-color: green;
          color: white;
          font-size: 14px;
      }

      .buttom2 button:hover {
          color: black;
      }

      #cart-items {
          max-height: 200px;
          overflow-y: auto;
      }

      #cart-items::-webkit-scrollbar {
          width: 8px;
      }

      #cart-items::-webkit-scrollbar-track {
          background: #f1f1f1;
          border-radius: 4px;
      }

      #cart-items::-webkit-scrollbar-thumb {
          background: #888;
          border-radius: 4px;
      }

      #cart-items::-webkit-scrollbar-thumb:hover {
          background: #555;
      }

      .remove-from-cart {
          background: none;
          border: none;
          cursor: pointer;
          color: red;
          font-size: 20px;
      }

      /* Responsive Styles */
      @media screen and (max-width: 768px) {
          .section3 {
              flex-direction: column;
          }

          .cart-items-container {
              grid-template-columns: 1fr; 
          }

          .box3-2 {
              width: 100%;
              margin-left: 0;
          }

          .box2 {
              width: 100%;
          }

          .menu-toggle {
              display: block;
              cursor: pointer;
          }

          .navlinks {
              display: none;
              flex-direction: column;
              margin-top: 20px;
          }

          .navlinks.active {
              display: flex;
          }

          .navlinks li {
              margin-bottom: 10px;
          }

          .login-signup {
              margin-top: 10px;
          }
      }
.dropdown-menu {
  display: none; 
  position: absolute;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  top: 50px;
  right: 20px;
  width: 150px;
  padding: 10px;
  z-index: 100;
}

.dropdown-menu a {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: black;
  transition: background 0.3s ease;
}

.dropdown-menu a:hover {
  background-color: #FC8A06;
  color: white;
}
      </style>
</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo">
            <img src="Images/Logo.png" alt="Foodly Logo" title="www.Foodly.com.np">
        </div>
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        <ul class="navlinks">
        <li><a href="Home.php">Home</a></li>
    <li><a href="Home.php#menu-details">Browse Menu</a></li>
    <li><a href="List_Of_Restaurants.php">Restaurants</a></li>
    <li><a href="Home.php#about-us">About Us</a></li>
        </ul>
        <div class="login-signup">
    <a href="Login.php" class="btn" id="loginSignupButton">Login/Signup</a>
    <div class="dropdown-menu" id="accountDropdown">
        <a href="profile.php">Profile</a>
        <a href="List_of_Food.php">Cart Details</a>
        <a href="orders.php">My Orders</a>
        <a href="logout.php" id="logoutLink">Logout</a>
    </div>
</div>

<script src = "update_login.js"></script>
        </script>
    </nav>
</header>

<script>
function toggleMenu() {
    document.querySelector(".navlinks").classList.toggle("active");
}
</script>


<div class="one1">
    <h3>My Orders</h3>
</div>


<section class="section3">
    <div class="box3">
        <div class="cart-items-container">
            <?php foreach ($orders as $order_id => $order): ?>
                <?php foreach ($order['items'] as $item): ?>
                    <div class="box3-1">
                    <div class="image-container">
    <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="<?= htmlspecialchars($item['item_name']) ?>" class="item-image">
</div>

                        <div class="box3-1-1">
                            <div class="first">
                                <div class="c">
                                    <h3><?= htmlspecialchars($item['item_name']) ?></h3>
                                    <p><?= nl2br(htmlspecialchars($item['description'])) ?></p>
                                </div>
                                <div class="d">
                                    <p class="price">Rs.<?= htmlspecialchars($item['price']) ?> x <?= htmlspecialchars($item['quantity']) ?></p>
                                    <p>(From: <?= htmlspecialchars($item['restaurant_name']) ?>)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="box3-2">
        <div class="top">
            <h3>Order Summary</h3>
        </div>
        <?php foreach ($orders as $order_id => $order): ?>
            <div class="top-1">
                <p>Order ID: <?= $order_id ?></p>
                <p>Status: 
                    <?php
                        $statusColor = [
                            'Pending' => 'orange',
                            'Processing' => 'blue',
                            'Completed' => 'green',
                            'Cancelled' => 'red'
                        ];
                        $color = $statusColor[$order['status']] ?? 'gray';
                        echo "<span style='color: $color;'>{$order['status']}</span>";
                    ?>
                </p>
            </div>
            <div class="totalprice-1">
                <p>Total Amount: Rs. <?= htmlspecialchars($order['total_amount']) ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
</section>

    
</section>

</body>
</html>

