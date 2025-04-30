<?php
session_start();

if (isset($_GET['id'], $_GET['name'], $_GET['description'], $_GET['price'], $_GET['image'], $_GET['restaurant_id'])) {
    $itemId = $_GET['id'];
    $name = $_GET['name'];
    $description = $_GET['description'];
    $price = $_GET['price'];
    $image = $_GET['image'];
    $restaurantId = $_GET['restaurant_id'];

    // store order details in the session
    $_SESSION['direct_order'] = [
        'id' => $itemId,
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'image' => $image,
        'restaurant_id' => $restaurantId,
        'quantity' => 1 
    ];
   
} else {
    echo "Invalid request. Missing menu item details.";
    exit;
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
            margin-top: 20px;
            margin-left: 70px;
            color: rgba(194, 192, 192, 0.64);
        }
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin: 20px 50px;
            gap: 30px;
        }
        .section3 {
            flex: 0 0 auto;
            width: 200px;
            margin-top: 10px;
        }
        .box2 {
            height: auto;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            box-sizing: border-box;
        }
        .box2 h2 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 1.5em;
        }
        .box2 ul {
            list-style: none;
            padding: 0;
        }
        .box2 ul li a {
            display: block;
            padding: 10px 12px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s;
            font-size: 1em;
            border-bottom: 1px solid #eee;
        }
        .box2 ul li a:last-child {
            border-bottom: none;
        }
        .box2 ul li a:hover {
            color: #FC8A06;
            background-color: #f9f9f9;
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

      .section4 {
            flex: 1 1 auto;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            min-width: 300px;
        }
        .food-details {
          flex: 1;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            box-sizing: border-box;
        }
        .food-details img {
            width: 80%;
           
            height: 240px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .food-details h2 {
            font-size: 2em;
            margin-bottom: 12px;
            color: #333;
        }
        .food-details p {
            font-size: 1em;
            margin-bottom: 10px;
            color: #555;
            line-height: 1.6;
        }
        .box3-2 {
            width: 100%;
            max-width: 400px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            box-sizing: border-box;
        }
        .top {
            background-color: rgb(2, 108, 2);
            color: white;
            padding: 12px;
            text-align: center;
            border-radius: 5px 5px 0 0;
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        #order-items .top-1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        #order-items .top-1:last-child {
            border-bottom: none;
        }
        .top-1-1 .item-name {
            font-weight: bold;
            font-size: 1em;
            color: #333;
        }
        .top-1-1 .item-price {
            color: #FC8A06;
            font-size: 0.9em;
        }
        .totalprice-1 {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-top: 1px solid #eee;
            font-size: 1em;
        }
        .totalprice-1 .totalitems p,
        .totalprice-1 .totalprice p {
            margin-bottom: 8px;
        }
        .bar {
            background-color: #FC8A06;
            color: white;
            padding: 12px;
            text-align: center;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 1em;
        }
        .bar p {
            margin-bottom: 5px;
        }
        .bar h3 {
            font-size: 1.4em;
        }
        .buttom {
            margin-top: 20px;
        }
        .buttom2 {
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
            font-size: 1em;
            cursor: pointer;
            border-radius: 10px;
        }
        .buttom2 button:hover {
            color: black;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-height: 90%;
            overflow-y: auto;
            box-sizing: border-box;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        @media screen and (max-width: 768px) {
            .flex-container {
                flex-direction: column;
                margin: 20px;
                gap: 20px;
            }
            .section3 {
                width: 100%;
            }
            .section4 {
                width: 100%;
            }
            .box3-2 {
                width: 100%;
                margin-left: 0;
            }
        }

    
      /* responsive styles */
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
        <a href="order_details.php">My Orders</a>
        <a href="logout.php" id="logoutLink">Logout</a>
    </div>
</div>

<script src = "update_login.js">
    
</script>
    </nav>
</header>

<script>
function toggleMenu() {
    document.querySelector(".navlinks").classList.toggle("active");
}
</script>

<div class="one1">
<h3>Order</h3>
</div>

<section class="flex-container">
  <div class="section3">
    <div class="box2">
      <h2>Menu</h2>
      <ul>
        <li><a href="Menu1.php">Breakfast</a></li>
        <li><a href="Menu1.php">Lunch</a></li>
        <li><a href="Menu1.php">Dinner</a></li>
        <li><a href="Menu1.php">Cold Drinks</a></li>
      </ul>
    </div>
</div>

  <div class="section4">
    <div class="food-details">
      <img src="<?php echo $image; ?>" alt="">
      <h2><?php echo $name; ?></h2>
      <p><?php echo $description; ?></p>
      <p>Price: Nrs. <?php echo $price; ?></p>
    </div>

    <?php
    $name = $_GET['name'] ?? '';
    $price = $_GET['price'] ?? '';
    $deliveryFee = 100;
    $price = floatval($price);
    $subTotal = $price *1;
    $totalPrice = $subTotal + $deliveryFee;
    ?>

    <div class="box3-2">
      <div class="top"><h3>My Basket</h3></div>
      <div id="order-items">
        <div class="top-1">
          <div class="top-1-1">
            <span class="item-name"><?php echo htmlspecialchars($name); ?></span>
            <br><span class="item-price">Rs. <?php echo number_format($price, 2); ?></span>
          </div>
        </div>
      </div>

      <div class="totalprice-1">
        <div class="totalitems">
          <p>Sub Total:</p>
          <p>Discounts:</p>
          <p>Delivery Fee:</p>
        </div>
        <div class="totalprice">
          <p id="sub-total">Rs.0</p>
          <p>0.00</p>
          <p>Rs.100</p>
        </div>
      </div>

      <div class="bar">
        <p>Total to pay</p>
        <h3 id="total-price">Rs.100</h3>
      </div>

      <div class="buttom">
        <div class="buttom2">
          <button id="openOrderDetailsBtn">Place Order</button>
        </div>
        <div id="orderModal" class="modal">
          <div class="modal-content">
            <span class="close" id="closeOrderDetailsBtn">&times;</span>
            <iframe src="orderdetails2.php" width="100%" height="500px" frameborder="0"></iframe>
          </div>
        </div>
      </div>
    </div>
</div>
</section>


   
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const subTotal = <?= $subTotal ?>;
        const deliveryFee = <?= $deliveryFee ?>;
        const total = subTotal + deliveryFee;

        document.getElementById("sub-total").textContent = `Rs. ${subTotal.toFixed(2)}`;
        document.getElementById("total-price").textContent = `Rs. ${total.toFixed(2)}`;
    });
</script>
<script>
        function openOrderDetails() {
            document.getElementById('orderModal').style.display = 'block';
        }

        function closeOrderDetails() {
            document.getElementById('orderModal').style.display = 'none';
        }

        var modal = document.getElementById("orderModal");
        var btn = document.getElementById("openOrderDetailsBtn");
        var span = document.getElementById("closeOrderDetailsBtn");

        btn.onclick = function() {
            openOrderDetails();
        }

        span.onclick = function() {
            closeOrderDetails();
        }

        window.onclick = function(event) {
            if (event.target === modal) {
                closeOrderDetails();
            }
        }
    </script>

</body>
</html>