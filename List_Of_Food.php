<?php
include('db_connect.php');
session_start(); 

$restaurantsConn = new mysqli("localhost", "root", "", "restaurants", "3307");

if ($restaurantsConn->connect_error) {
    die("Connection to restaurants database failed: " . $restaurantsConn->connect_error);
}


$cartItems = [];
$message = "";

// if the user is logged in
if (isset($_SESSION['user_id'])) {
    $sql = "
    SELECT cart.*, restaurant_table.restaurant_name
    FROM orders_db.cart AS cart
    INNER JOIN restaurants.restaurant_table AS restaurant_table
    ON cart.restaurant_id = restaurant_table.id  
    WHERE cart.user_id = " . $_SESSION['user_id'];

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cartItems[] = $row;
        }
    }
} else {
    $message = "You need to log in to view the cart.";
}

$restaurantsConn->close();
$conn->close();


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

      /* General Styles */
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
              grid-template-columns: 1fr; /* One column on smaller screens */
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
.item-image {
    margin-right:0px;
  width: 150px;          
  height: 150px;         
  object-fit: cover;     
  border-radius: 8px;    
}
/* Hide default checkbox */
.checkbox-container {

  align-items: left;
  cursor: pointer;
  position: relative;
  padding-left: 10px;
  margin-right: 10px;
  user-select: none;
}

.checkbox-container input[type="checkbox"] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.checkbox-container .checkmark {
  position: absolute;
  left: 0;
  top: 0;
  height: 10px;
  width: 10px;
  background-color: #eee;
  border: 2px solid #ccc;
  border-radius: 4px;
  transition: background-color 0.2s, border-color 0.2s;
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
<h3>Cart Details</h3>
</div>

<section class="section3">
<?php if (!isset($_SESSION['user_id'])): ?>
    <!-- if the user is not logged in -->
    <p>You need to <a href="Login.php">Login</a> to view your cart.</p>
<?php else: ?>

        <div class="box3">
    <div class="cart-items-container">
        <!-- Cart Items Section -->
        <?php if (!empty($cartItems)): ?>
            <?php foreach ($cartItems as $item): ?>
                <div class="box3-1">
            <div class="image-container">
                        <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="item-image">
                    </div>
                    <div class="box3-1-1">
                        <div class="first">
                            <div class="c">
                                <h3><?= htmlspecialchars($item['name']) ?> 
                                <p><?= nl2br(htmlspecialchars($item['description'])) ?></p>
                            </div>
                            <div class="d">
                                <p class="price">Rs.<?= htmlspecialchars($item['price']) ?></p>
                                <p>(From: <?= htmlspecialchars($item['restaurant_name']) ?>)</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No items in the cart.</p>
        <?php endif; ?>
    </div>
</div>

    <div class="box3-2">
            <div class="top"><h3>My Basket</h3></div>
            <div id="cart-items">
                <?php if (!empty($cartItems)): ?>
                    <?php foreach ($cartItems as $item): ?>
                        <div class="top-1" id="cart-item-<?= $item['id'] ?>">
                            <div class="top-1-1">
                                <h4><?= htmlspecialchars($item['name']) ?></h4>
                                <p>Rs.<?= htmlspecialchars($item['price']) ?></p>
                                <button class="remove-from-cart" onclick="removeFromCart(<?= $item['id'] ?>, <?= $item['price'] ?>)">&times;</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No items in the cart.</p>
                <?php endif; ?>
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
        <iframe src="orderdetails.php" width="100%" height="500px" frameborder="0"></iframe>
    </div>
</div>
</div>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>
   
<script>
let cartTotal = <?= array_sum(array_column($cartItems, 'price')) ?>; // Fetch total from PHP
updateTotals();

function removeFromCart(itemId, itemPrice) {
    if (!confirm("Are you sure you want to remove this item?")) return;

    fetch('remove_from_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=' + encodeURIComponent(itemId)
    })
    .then(response => response.text())
    .then(data => {
        console.log("Server Response:", data); 
        if (data.trim() === "success") {
            document.getElementById("cart-item-" + itemId).remove();

            let subTotalElement = document.getElementById("sub-total");
            let totalElement = document.getElementById("total-price");
            
            let subTotal = parseFloat(subTotalElement.innerText.replace('Rs.', '')) - itemPrice;
            subTotalElement.innerText = "Rs." + subTotal;
            
            let total = subTotal + 100; // delivery fee
            totalElement.innerText = "Rs." + total;
        } else {
            alert("Failed to remove item from cart: " + data);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Error removing item from cart.");
    });


    updateTotals();
}

function updateTotals() {
    const subTotalElem = document.getElementById('sub-total');
    const totalPriceElem = document.getElementById('total-price');
    
    const deliveryFee = 100;
    const total = cartTotal + deliveryFee;
    
    subTotalElem.textContent = `Rs.${cartTotal}`;
    totalPriceElem.textContent = `Rs.${total}`;
}
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
