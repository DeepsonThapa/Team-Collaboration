<?php

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "restaurants"; 
$port = "3307";

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//restaurants that are approved
$sql = "SELECT id, restaurant_name, Address, img_path, menu_path, cuisine FROM restaurant_table WHERE approval_status = 'approved'";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodly</title>
  <link rel="stylesheet" href="List_Of_Restaurants.css">
  <link rel="icon" href="image.jpeg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
   .restaurants {
        padding: 30px;
       
    }

    .restaurant-card {
        display: flex;
        
        background: white;
        margin: 20px auto;
        padding: 20px;
        width: 90%;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .image-container img {
        width: 300px; 
        height: 150px;
        border-radius: 10px;
        object-fit: cover;
        margin-right: 20px;
    }

    .restaurant-info {
      flex:1;
        text-align: left;
    }

    .restaurant-info h3 {
        margin: 5px 0;
        font-size: 22px;
    }

    .restaurant-info p {
        margin: 5px 0;
        font-size: 16px;
    }

    .menu-link {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 15px;
        background-color: #fC8A06;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    }

    .menu-link:hover {
        background-color: #cc5500;
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
  </style>
</head>
<body>
   
  <header>
    <nav class="navbar">
      <!-- Logo Section -->
      <div class="logo">
        <img src="Images/Logo.png" alt="Foodly Logo" title="www.Foodly.com.np">
        
      </div>

      
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
  </header>

  <!--Section 1-->
  <section class="section1">
    <div class="content">
        <h1>"When hunger calls, we deliver-<br>not just food,but an experience to<br>savor."</h1>

      </div>
      <div class="image">
        <img src="Images/eating food.jpg" alt="" height="300px" width="400px">
      </div>
  </section>
  <section class="Search">
    <div class="search-bar">
      <input type="text" placeholder="Search For Restaurants">
      <button>Search</button>
    </div>
  </section>

  <section class="restaurants">
  <h2>List of Restaurants</h2>

  <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
        echo '<div class="restaurant-card">
                <div class="image-container">
                  <img src="' . $row["img_path"] . '" alt="' . $row["restaurant_name"] . '">
                </div>
                <div class="restaurant-info">
                  <h3>' . $row["restaurant_name"] . '</h3>
                  <p>Location: ' . $row["Address"] . '</p>
                  <p>Cuisine: ' . $row["cuisine"] . '</p>
                  <a href="' . htmlspecialchars($row["menu_path"]) . '" class="menu-link">View Menu</a>
                </div>
              </div>';
    }
} else {
    echo "<p>No approved restaurants available.</p>";
}
$conn->close();
?>


</section>

  
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
const cards = document.querySelectorAll(".restaurants");

const slideIn = () => {
    cards.forEach(card => {
        const cardPosition = card.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.2;

        if (cardPosition < screenPosition) {
            card.classList.add("show");
        }
    });
};

window.addEventListener("scroll", slideIn);
window.addEventListener("load", slideIn);

</script>

</body>
</html>
