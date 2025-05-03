<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodly</title>
  <link rel="stylesheet" href="Menu1.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style type="text/css">
      * {
          margin: 0;
          padding: 0;
          font-family: 'Poppins';
        }

.add-btn {
  background: #FC8A06;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
  transition: background 0.3s ease;
}

.add-btn:hover {
  background: #e17903;
}

.buttons {
  display: flex;
  gap: 10px;
  align-items: center;
  flex-wrap: wrap;
  justify-content: space-between; 
}

.order-btn {
  margin-left: auto; 

  background: #4CAF50;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
  transition: background 0.3s ease;
}



@media (max-width: 768px) {
  .order-btn {
    margin-left: 0; 
    width: 100%;
  }
}
.order-btn:hover {
  background: #45a049;
}

.top h2{
margin:50px;
}

@media screen and (max-width: 768px) {
  .more {
    flex-direction: column;
    align-items: center;
    gap: 20px;
    margin: 20px;
  }

  .more img {
    width: 90%;
    height: auto;
  }

  .footer {
    flex-direction: column;
    align-items: center;
    height: auto;
    padding: 20px 10px;
  }

  .logo9 {
    padding: 10px;
    text-align: center;
  }

  .social {
    padding: 10px;
    text-align: center;
  }

  .info {
    flex-direction: column;
    align-items: center;
    padding: 10px;
    text-align: center;
  }

  .navbarlast {
    flex-direction: column;
    height: auto;
    text-align: center;
    gap: 10px;
  }

  .navlinkslast {
    flex-direction: column;
    gap: 10px;
    padding: 0;
  }
}
.logo9 img{
  height:60px;
  width:120px;
  padding: 30px 5px 5px 80px;
}

.logo9 p{
padding-top: 120px;
margin-left:20px;
}

.info-1{
  list-style-type: none;

 
}

.info1last a{
  text-decoration: none;
  color: black;
}
.titlelast{
  display: flex;
  align-items: center;
}


.navlinkslast li {
  display: inline;
}

.navlinkslast a {
  text-decoration: none;
  font-size: 14px;
  color: white;
}
.more{
  margin:50px;
display:flex;
gap:30px;
}
.more img{
 width:370px;
  height:200px;
}
    
  /* Button Styling */
  .add-btn {
    flex:1;
  background: #FC8A06;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
  transition: background 0.3s ease;
  }
  
  .add-btn:hover {
  background: #e17903;
  }
  
  /* FOR responsive */
  @media (max-width: 768px) {
  .card {
    width: calc(50% - 20px);
  }
  }
  
  @media (max-width: 480px) {
  .card {
    width: 100%;
  }
  
  
  
  }
  
  
  /*Operational times*/
  
  .body2 {
  text-align: center;
  display: flex;
  justify-content: center; 
  margin-top:60px;
  }
  
  .operational-times {
  background-color: #FC8A06;
  padding: 20px;
  width: 90%;
  max-width: 600px;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  color: #000;
  }
  
  
  .operational-times h2 {
  margin-top: 20px;;
  font-size: 24px;
  font-weight: bold;
  text-align: center;
  }
  
  .operational-times ul {
  list-style-type: none;
  
  }
  
  .operational-times ul li {
  font-size: 15px;
  
  margin-bottom: 10px;
  }
  
  
  .footer{
    margin-left:0px;
    margin-right:0px;
    height: 300px;
    width: 100%;
    background-color: #f9f9f9;
    display: flex;
  }
  
  
  .logo9 img{
    height:60px;
    width:120px;
    padding: 30px 5px 5px 80px;
    opacity:80%;
  }
  
  .logo9 p{
  padding-top: 150px;
  margin-left:20px;
  }
  
  .social{
    flex:1;
   margin:30px 40px;
  
  }
  
  .info{
    
   padding:30px;
    display:flex;
    gap:30px;
  }
  .info-1{
    margin-top:10px;
    font-size:15px;
    list-style-type: none;
   
  }
  
  .info1last a{
    text-decoration: none;
    color: black;
  }
  
  .titlelast{
    display: flex;
    align-items: center;
  }
  .navbarlast {
    display:flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    margin: 0;
    background-color: #03081f;
    color: white;
    height: 30px;
    
  }
  .navlinkslast {
    padding:10px ;
    list-style: none;
    display: flex;
    gap: 50px;
  }
  
  .navlinkslast li {
    display: inline;
  }
  
  .navlinkslast a {
    text-decoration: none;
    font-size: 14px;
    color: white;
  }
  </style>

</head>
<body>
  <a id="top"></a>
  <header>
    <nav class="navbar">
        <!-- Logo Section -->
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

  function closeLoginPopup() {
      document.getElementById("loginPopup").style.display = "none";
  }
</script>

<section class="section1">
  <div class="content">
      <h2>Inside <br>RoadHouse Restro</h2>

      <div class="search-bar">
          <input type="text" placeholder="Search Food">
          <button>Search</button>
      </div>
  </div>

  <div class="image1">
      <img src="Images/eating food.jpg" alt="Food Image">
  </div>
</section>

<!-- Breakfast -->
<div class="menu-section">
  <h2>Breakfast</h2>
  <div class="card-container">

    <?php
    include("Menu_Conn.php");

    // menu items from database for breakfast
    $sql = "SELECT id, name, description, price, image_path, restaurant_id FROM menu_items WHERE category='Breakfast'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $itemId = $row["id"];
            $name = addslashes($row["name"]);
            $desc = addslashes($row["description"]);
            $price = $row["price"];
            $img = $row["image_path"];
            $rest_id = $row["restaurant_id"];
    ?>
            <div class="card">
              <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($name); ?>">
              <div class="card-content">
                <h3><?php echo htmlspecialchars($name); ?></h3>
                <p><?php echo htmlspecialchars($desc); ?></p>
                <p class="price">Nrs. <?php echo $price; ?></p>
                <div class="buttons">
                  <button class="add-btn" onclick="addToCart('<?php echo $name; ?>', '<?php echo $desc; ?>', <?php echo $price; ?>, '<?php echo $img; ?>', <?php echo $rest_id; ?>)">Add to Cart</button>
                  <button class="order-btn" onclick="orderNow('<?php echo $itemId; ?>', '<?php echo $name; ?>', '<?php echo $desc; ?>', <?php echo $price; ?>, '<?php echo $img; ?>', <?php echo $rest_id; ?>)">Order Now</button>
                </div>
              </div>
            </div>
    <?php
        }
    } else {
        echo "<p>No menu items found.</p>";
    }

    $conn->close();
    ?>
  </div>
</div>


<!--Lunch-->
   <div class="menu-section">
            <h2>Lunch</h2>
            <div class="card-container">
             
            <?php
    include("Menu_Conn.php");

    // menu items from database for breakfast
    $sql = "SELECT id, name, description, price, image_path, restaurant_id FROM menu_items WHERE category='Lunch'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $itemId = $row["id"];
            $name = addslashes($row["name"]);
            $desc = addslashes($row["description"]);
            $price = $row["price"];
            $img = $row["image_path"];
            $rest_id = $row["restaurant_id"];
    ?>
            <div class="card">
              <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($name); ?>">
              <div class="card-content">
                <h3><?php echo htmlspecialchars($name); ?></h3>
                <p><?php echo htmlspecialchars($desc); ?></p>
                <p class="price">Nrs. <?php echo $price; ?></p>
                <div class="buttons">
                  <button class="add-btn" onclick="addToCart('<?php echo $name; ?>', '<?php echo $desc; ?>', <?php echo $price; ?>, '<?php echo $img; ?>', <?php echo $rest_id; ?>)">Add to Cart</button>
                  <button class="order-btn" onclick="orderNow('<?php echo $itemId; ?>', '<?php echo $name; ?>', '<?php echo $desc; ?>', <?php echo $price; ?>, '<?php echo $img; ?>', <?php echo $rest_id; ?>)">Order Now</button>
                </div>
              </div>
            </div>
    <?php
        }
    } else {
        echo "<p>No menu items found.</p>";
    }

    $conn->close();
    ?>
      </div>
  </div>

  <!-- Dinner-->
  <div class="menu-section">
            <h2>Dinner</h2>
            <div class="card-container">
             
            <?php
    include("Menu_Conn.php");

    // menu items from database for dinner
    $sql = "SELECT id, name, description, price, image_path, restaurant_id FROM menu_items WHERE category='Dinner'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           
            $itemId = $row["id"];
            $name = addslashes($row["name"]);
            $desc = addslashes($row["description"]);
            $price = $row["price"];
            $img = $row["image_path"];
            $rest_id = $row["restaurant_id"];
    ?>
            <div class="card">
              <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($name); ?>">
              <div class="card-content">
                <h3><?php echo htmlspecialchars($name); ?></h3>
                <p><?php echo htmlspecialchars($desc); ?></p>
                <p class="price">Nrs. <?php echo $price; ?></p>
                <div class="buttons">
                  <button class="add-btn" onclick="addToCart('<?php echo $name; ?>', '<?php echo $desc; ?>', <?php echo $price; ?>, '<?php echo $img; ?>', <?php echo $rest_id; ?>)">Add to Cart</button>
                  <button class="order-btn" onclick="orderNow('<?php echo $itemId; ?>', '<?php echo $name; ?>', '<?php echo $desc; ?>', <?php echo $price; ?>, '<?php echo $img; ?>', <?php echo $rest_id; ?>)">Order Now</button>
                </div>
              </div>
            </div>
    <?php
        }
    } else {
        echo "<p>No menu items found.</p>";
    }

    $conn->close();
    ?>
  </div>
</div>

  <!--Drinks-->
  <div class="menu-section">
            <h2>Cold Drinks</h2>
            <div class="card-container">
            <?php
    include("Menu_Conn.php");

    // menu items from database for breakfast
    $sql = "SELECT id, name, description, price, image_path, restaurant_id FROM menu_items WHERE category='Cold Drinks'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $itemId = $row["id"];
            $name = addslashes($row["name"]);
            $desc = addslashes($row["description"]);
            $price = $row["price"];
            $img = $row["image_path"];
            $rest_id = $row["restaurant_id"];
    ?>
            <div class="card">
              <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($name); ?>">
              <div class="card-content">
                <h3><?php echo htmlspecialchars($name); ?></h3>
                <p><?php echo htmlspecialchars($desc); ?></p>
                <p class="price">Nrs. <?php echo $price; ?></p>
                <div class="buttons">
                  <button class="add-btn" onclick="addToCart('<?php echo $name; ?>', '<?php echo $desc; ?>', <?php echo $price; ?>, '<?php echo $img; ?>', <?php echo $rest_id; ?>)">Add to Cart</button>
                  <button class="order-btn" onclick="orderNow('<?php echo $itemId; ?>', '<?php echo $name; ?>', '<?php echo $desc; ?>', <?php echo $price; ?>, '<?php echo $img; ?>', <?php echo $rest_id; ?>)">Order Now</button>
                </div>
              </div>
            </div>
    <?php
        }
    } else {
        echo "<p>No menu items found.</p>";
    }

    $conn->close();
    ?>
  </div>
</div>

<!-- Login Popup -->
<div id="loginPopup" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%);
     background:#fff; padding:20px; box-shadow:0px 0px 10px rgba(0,0,0,0.2);">
    <a href="Login.php">Login to order</a>
    <button onclick="closeLoginPopup()">Close</button>
</div>
<!--Operational Times-->


<div class="body2">
  <div class="operational-times">
    <div class="icon-title">
     
      <h2>Operational Times</h2>
    </div>
    <ul>
      <li>Monday: 8:00 AM–3:00 AM</li>
      <li>Tuesday: 8:00 AM–3:00 AM</li>
      <li>Wednesday: 8:00 AM–3:00 AM</li>
      <li>Thursday: 8:00 AM–3:00 AM</li>
      <li>Friday: 8:00 AM–3:00 AM</li>
      <li>Saturday: 8:00 AM–3:00 AM</li>
      <li>Sunday: 8:00 AM–3:00 AM</li>
    </ul>
  </div>
</div>



<section class="section2">
  <div class="top">
    <h2>More Restaurants</h2>
  </div>
  <div class="more">
    <div class="restaurant-card">
      <img src="Images/Byanjan Restaurant.jpg" alt="Byanjan Restaurant">
      <p class="restaurant-name">Byanjan Restaurant</p>
    </div>
    <div class="restaurant-card">
      <img src="Images/Soul Origin Cafe and Restaurant.jpg" alt="Soul Origin Cafe">
      <p class="restaurant-name">Soul Origin Cafe</p>
    </div>
    <div class="restaurant-card">
      <img src="Images/French Creperie.jpg" alt="French Creperie">
      <p class="restaurant-name">French Creperie</p>
    </div>
  </div>
</section>

  
<!--FOOTER-->

<footer class="footer">

<!--Logo links-->

  <div class="logo9"><img src="Images/Logo.png" alt="logo" height="20px" width="50px">

    <p>Company #490039-445, Registered with House of companies.</p>
  
  </div>
  
  <div class="social">

    <h4>Connect With Us On</h4>

    <div class="log"><!--Different social media image-->

    <div id="facebook">
      <a href="https://www.facebook.com/"><img src="Images/fb_logo.jpeg" alt="faceboook" height="15" width="20px"></a>
    </div>

    <div id="instagram">
      <a href="https://www.instagram.com/"><img src="Images/ins_logo.jpeg" alt="Instagram" height="15" width="20px"></a>
      </div>

    <div id="tiktok">
      <a href="https://www.tiktok.com/"><img src="Images/t_logo.png" alt="Tiktok" height="15" width="20px"></a>
    </div>

    <div id="snapchat">
      <a href="https://www.snapchat.com/"><img src="Images/snap_logo.jpeg" alt="Snapchat" height="15" width="20px"></a>
    </div>
    
  </div>

  </div>


<!--legal links-->
  <div class="info">
    <div>
      <h4>Legal Pages</h4>
      <nav class="info1last">
      <ul class="info-1">
        <li><a href="#">Terms and conditions </a></li>  
        <li><a href="#">Privacy</a></li>
        
      </ul>
    </nav>
    </div>

    <!--second link-->

    <div class="second">
      <h4>Important Links</h4>
      <nav class="info1last">
      <ul class="info-1">
        <li><a href="#">Get Help</a></li>
        <li><a href="#">Add your restaurant</a></li>
        <li><a href="#">Create a bussiness account</a></li>
      </ul>
    </nav>
    </div>
 
  </div>
</footer>

<!--last nav bar-->
<section>
  <nav class="navbarlast">
      <div class="titlelast">
        <p>Foodly Copyright 2025, All Rights Reserved.</p>
        
      </div>
      <ul class="navlinkslast">
          <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Terms</a></li>
                  <li><a href="#">Pricing</a></li>
                  <li><a href="#">Do not sell or share my personal information</a></li>
      </ul>
    </nav>

</section>

  

  <script>

function orderNow(itemId, name, description, price, imagePath, restaurantId) {
    fetch('check_login.php')
        .then(response => response.json())
        .then(data => {
            if (data.logged_in) {
                //  redirect to details page 
                const url = new URL('Code/Form/order_item.php', window.location.origin);
                url.searchParams.set('id', itemId); 
                url.searchParams.set('name', name);
                url.searchParams.set('description', description);
                url.searchParams.set('price', price);
                url.searchParams.set('image', imagePath);
                url.searchParams.set('restaurant_id', restaurantId);
                window.location.href = url.toString();
            } else {
                // redirect to login page
                alert('Please log in to place an order.');
                window.location.href = 'login.php';
            }
        })
        .catch(error => {
            console.error('Error checking login status:', error);
        });
}




   function addToCart(name, description, price, image_path, restaurant_id, quantity = 1) {
    

  fetch('check_login.php')
    .then(response => response.json())
    .then(data => {
        if (data.logged_in) {
            console.log("User ID:", data.user_id);
            console.log("First Name:", data.fname);
            console.log("Last Name:", data.lname);
            console.log("Email:", data.email);

          
            const cartData = {
                name: name.trim(),
                description: description.trim(),
                price: parseFloat(price),
                image_path: image_path.trim(),  
                user_id: data.user_id,
                quantity: quantity, 
                restaurant_id: restaurant_id
            };
            console.log("Data being sent:", cartData);
            fetch('add_to_cart.php', {   
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(cartData)
            })
            .then(response => response.text())
            .then(data =>{ alert(data);
           
            })
            .catch(error => console.error('Error:', error)); 
        } else {
            // redirect to login page if the user is not logged in
            window.location.href = "Login.php"; 
        }
    })
    .catch(error => console.error('Error checking login:', error)); 
}


    </script>

  



   
</body>
</html>