<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodly</title>
  <link rel="stylesheet" href="Restaurant.css">
  <link rel="icon" href="image.jpeg">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style type="text/css">
      * {
          margin: 0;
          padding: 0;
          font-family: 'Poppins';
        }
  </style>
</head>
<body>

  <header>
    <nav class="navbar">
      <!-- Logo Section -->
      <div class="logo">
        <img src="Logo.png" alt="Foodly Logo" title="www.Foodly.com.np">
      </div>

      <!--Links-->
      <ul class="navlinks">
        <li><a href="home.php">Home</a></li>
        <li><a href="Menu1.php">Browse Menu</a></li>
        <li><a href="List_of_restaurant.php">Restaurants</a></li>
        <li><a href="#AboutUs">About Us</a></li>
        <li> <a href="Login.php" > <img src="vector-add-to-cart-vector-icon.jpg" alt="" height="40" width="40"> </a></li>
      </ul>

      <!-- Login-Signup Button or My Account Button -->
      <div class="login-signup">
        <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            // User is logged in, show "My Account" button
            echo '<a href="my_account.php" class="btn">My Account</a>';
        } else {
            // User is not logged in, show "Login/Signup" button
            echo '<a href="Login.php" class="btn">Login/Signup</a>';
        }
        ?>
      </div>
    </nav>
  </header>
  

  <section class="section1">
    <div class="content">

        <pre>          Inside Openhouse Restro   
        </pre>
       
        <div class="search-bar">
          <input type="text" placeholder="Search Food">
          <button>Search</button>
        </div>
    </div>

      <div class="image1">
        <img src="eating food.jpg" alt="Food Image">
      </div>
   
</div>

  </section>
    <h2>Food Menu</h2>  
    
      <!-- Breakfast-->
  <div class="menu-section">
    <h2>Breakfast</h2>
    <div class="card-container">
      <div class="card">
        <img src="breakfast1.jpg" alt="Selroti and Achar">
        <div class="card-content">
          <h3>Selroti and Achar</h3>
          <p>2 selrotis with home-cooked achar and tea.</p>
          <p class="price">Nrs. 200</p>
          <button class="add-btn" onclick="addToCart('Selroti and Achar', '2 selrotis with home-cooked achar and tea.', 200, 'breakfast1.jpg')">+</button>
        </div>
      </div>
      <div class="card">
        <img src="Breakfast 3.jpg" alt="Bread Omelette">
        <div class="card-content">
          <h3>Bread Omelette</h3>
          <p>2 pieces of bread with an omelette.</p>
          <p class="price">Nrs. 200</p>
          <button class="add-btn" onclick="addToCart('Bread Omelette', '2 pieces of bread with an omelette.', 200, 'Breakfast 3.jpg')">+</button>
        </div>
      </div>
      <div class="card">
        <img src="samosa.jpg" alt="Samosas">
        <div class="card-content">
          <h3>Samosas</h3>
          <p>4 pieces of samosas with chutney.</p>
          <p class="price">Nrs. 200</p>
          <button class="add-btn" onclick="addToCart('Samosas', '4 pieces of samosas with chutney.', 200, 'samosa.jpg')">+</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Lunch-->
  <div class="menu-section">
    <h2>Lunch</h2>
    <div class="card-container">
      <div class="card">
        <img src="Lunch1.jpg" alt="Thakali Khana Set">
        <div class="card-content">
          <h3>Thakali Khana Set</h3>
          <p>A khana set with rice, chicken curry, achar, and vegetables.</p>
          <p class="price">Nrs. 600</p>
          <button class="add-btn" onclick="addToCart('Thakali Khana Set', 'A khana set with rice, chicken curry, achar, and vegetables.', 600, 'Lunch1.jpg')">+</button>
        </div>
      </div>
      <div class="card">
        <img src="Fried rice.jpg" alt="Fried Rice">
        <div class="card-content">
          <h3>Fried Rice</h3>
          <p>A plate of fried rice with vegetables.</p>
          <p class="price">Nrs. 200</p>
          <button class="add-btn" onclick="addToCart('Fried Rice', 'A plate of fried rice with vegetables.', 200, 'Fried rice.jpg')">+</button>
        </div>
      </div>
      <div class="card">
        <img src="dish.jpg" alt="Momo">
        <div class="card-content">
          <h3>Momo</h3>
          <p>A plate of chicken momo.</p>
          <p class="price">Nrs. 200</p>
          <button class="add-btn" onclick="addToCart('Momo', 'A plate of chicken momo.', 200, 'dish.jpg')">+</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Dinner-->
  <div class="menu-section">
    <h2>Dinner</h2>
    <div class="card-container">
      <div class="card">
        <img src="Dinner2.jpg" alt="Parathas">
        <div class="card-content">
          <h3>Parathas</h3>
          <p>Soft parathas with curry.</p>
          <p class="price">Nrs. 200</p>
          <button class="add-btn" onclick="addToCart('Parathas', 'Soft parathas with curry.', 200, 'Dinner2.jpg')">+</button>
        </div>
      </div>
      <div class="card">
        <img src="Lunch1.jpg" alt="Thakali Khana Set">
        <div class="card-content">
          <h3>Thakali Khana Set</h3>
          <p>A khana set with rice, chicken curry, achar, and vegetables.</p>
          <p class="price">Nrs. 600</p>
          <button class="add-btn" onclick="addToCart('Thakali Khana Set', 'A khana set with rice, chicken curry, achar, and vegetables.', 600, 'Lunch1.jpg')">+</button>
        </div>
      </div>
      <div class="card">
        <img src="roti.jpg" alt="Roti">
        <div class="card-content">
          <h3>Roti</h3>
          <p>Roti with vegetable curry.</p>
          <p class="price">Nrs. 200</p>
          <button class="add-btn" onclick="addToCart('Roti', 'Roti with vegetable curry.', 200, 'roti.jpg')">+</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Cold Drink-->
  <div class="menu-section">
    <h2>Cold Drinks</h2>
    <div class="card-container">
      <div class="card">
        <img src="coke.jpeg" alt="">
        <div class="card-content">
          <h3>Coke</h3>
          <p>Chilled coke can (500ml).</p>
          <p class="price">Nrs. 100</p>
          <button class="add-btn" onclick="addToCart('Coke', 'chilled coke can', 100, 'coke.jpeg')">+</button>
        </div>
      </div>
      <div class="card">
        <img src="sprite.jpeg" alt="Sprite">
        <div class="card-content">
          <h3>Sprite</h3>
          <p>Chilled sprite bottle (500ml).</p>
          <p class="price">Nrs. 100</p>
          <button class="add-btn" onclick="addToCart('Sprite', 'Chilled sprite bottle.', 100, 'sprite.jpeg')">+</button>
        </div>
      </div>
      <div class="card">
        <img src="fanta.jpeg" alt="Fanta">
        <div class="card-content">
          <h3>Fanta</h3>
          <p>Chilled fanta bottle (500ml).</p>
          <p class="price">Nrs. 100</p>
          <button class="add-btn" onclick="addToCart('Fanta', 'chilled fanta bottle.', 100, 'fanta.jpeg')">+</button>
        </div>
      </div>
    </div>
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

<section class="section-res">
    <div class="top">
    <h2>More Restaurants</h2>
    <button>></button>
    
    </div>
    <div class="more">
    <div class="image11"></div>
    <div class="image22"></div>
    <div class="image33"></div>
  </div>
  </section>

  <footer class="footer">
    <div class="logo9"><img src="Logo.png" alt="logo" height="50px" width="100px">
    <div><p>Company #490039-445, Registered with House of companies.</p></div>
    </div>
    <div class="social">
      <h4>Connect With Us On</h4>
      <div class="log">
      <div><img src="fb_logo.jpeg" alt="faceboook" height="17px" width="20px"></div>
      <div><img src="ins_logo.jpeg" alt="instagram"  height="17px" width="20px"></div>
      <div><img src="t_logo.png" alt="tiktok"  height="17px" width="20px"></div>
      <div><img src="snap_logo.jpeg" alt="snapchat"  height="17px" width="20px"></div>
    </div>
    </div>
    <div class="info">
      <div class="first1">
        <h4>Legal Pages</h4>
        <nav class="info1last">
        <ul class="info-1">
          <li><a href="#">Terms and conditions </a></li>  
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Cookies</a></li>
          <li><a href="#">Modern slavery statement</a></li>
        </ul>
      </nav>
      </div>
      <div class="second2">
        <h4>Important Links</h4>
        <nav class="info1last">
        <ul class="info-1">
          <li><a href="#">Get Help</a></li>
          <li><a href="Restaurant.html">Add your restaurant</a></li>
          <li><a href="#">Create a bussiness account</a></li>
        </ul>
      </nav>
      </div>
    </div>
  </footer>
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
  </html>

    <script>
        function addToCart(name, description, price, image) {
            fetch('Save_item_menu1.php', {     // link to save_item_menu1.php
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ name, description, price, image })
            })
            .then(response => response.text())
            .then(data => alert(data))
            .catch(error => console.error('Error:', error));
        }
    </script>

</body>
</html>
