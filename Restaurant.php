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
        .login-signup {
            display: flex;
            gap: 10px;
            align-items: center; 
        }

        .login-signup .btn {
          padding: 12px 10px; 
            
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            background-color: #FC8A06; 
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-signup .btn:hover {
            background-color: rgb(238, 123, 0); 
        }
        .navbar{
          width:97%;
          
        }
  </style>

</head>
<body>

  <header>
    <nav class="navbar">
      <!-- Logo Section -->
      <div class="logo">
        <img src="Images/Logo.png" alt="Foodly Logo" title="www.Foodly.com.np">
        
      </div>

      <!--Links-->
      <ul class="navlinks">
      <li><a href="Home.php">Home</a></li>
    <li><a href="Home.php#menu-details">Browse Menu</a></li>
    <li><a href="List_Of_Restaurants.php">Restaurants</a></li>
    <li><a href="Home.php#about-us">About Us</a></li>
        
      </ul>

      <!-- Login-Signup Button -->
      <div class="login-signup">
      <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "restaurants";
                $port = "3307";

                $conn = new mysqli($servername, $username, $password, $dbname, $port);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT COUNT(*) FROM restaurant_table WHERE approval_status = 'approved'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $approvedRestaurants = $row['COUNT(*)'];

                if ($approvedRestaurants > 0) {
                    echo '<a href="restaurant_login.php" class="btn">Restaurant Login</a>';
                    echo '<a href="Login.php" class="btn">User Mode</a>'; // Added User Mode button
                } else {
                    echo '<a href="Login.php" class="btn">Login/Signup</a>';
                }

                $conn->close();
                ?>
            </div>
        </nav>
  </header>
  <!--Section 1-->
  <section class="section1">
    <div class="box1">
        <div class="content1">
          
<pre>Partner with us, 
 and grow your
      business</pre>
            <p>Get started - It only takes 10 minutes</p>
        </div>
        <div class="button1">
            <a href="Restaurant_form.php"><button type="button">Register Your restaurant</button></a>
            
        </div>
    </div>
  </section>
  <!--Section 2-->
  <section class="section2">
    <div class="box2"><hr></div>
    <div class="box3"><pre>
   Why Should you
   partner up with
           Foodly?
    </pre></div>
    <div class="box4"><hr></div>
  </section>
  <!--Section 3-->
  <section class="section3">
    <div class="first">
        <div class="icon1"><img src="Images/icon1.png" alt="Customers" height="160px" width="180px"></div><!--image of the icone-->
        <h1>Attract new<br>Customers</h1>
        <p>Reach thousands of people</p>
        <p>ordering on Foodly</p>
    </div>
    <div class="second">
        <div class="icon2"><img src="Images/icon2.png" alt="Convenience"></div><!--image of the icone-->
        <h1>Convenience</h1>
        <p>Get your favorite food</p>
        <p>at your</p>
        <p>doorstep with just few clicks</p>
    </div>
    <div class="third">
        <div class="icon3"><img src="Images/icon3.jpeg" alt="Help"></div><!--image of the icone-->
        <h1>Help</h1>
        <p>Help and support for</p>
        <p>any issues</p>
    </div>
  </section>
  <section class="section4">
    <div class="first11">
      <h1>1000+</h1>
        <p>Users</p>        
    </div>
    <div class="second22">
      <h1>10,000+</h1>
      <p>Orders Delivered</p>
    </div>
    <div class="third3">
      <h1>50+</h1>
      <p>Restaurants</p>
    </div>
    <div class="fourth4">
      <h1>100+</h1>
      <p>Food Items</p>
    </div>
      </section>
    </body>
    

<!--FOOTER-->



<footer class="footer">
  <div class="logo9"><img src="Images/Logo.png" alt="logo" height="50px" width="100px">
  <div><p>Company #490039-445, Registered with House of companies.</p></div>
  </div>
  <div class="social">
    <h4>Connect With Us On</h4>
    <div class="log">
    <div><img src="Images/fb_logo.jpeg" alt="faceboook" height="17px" width="20px"></div>
    <div><img src="Images/ins_logo.jpeg" alt="instagram"  height="17px" width="20px"></div>
    <div><img src="Images/t_logo.png" alt="tiktok"  height="17px" width="20px"></div>
    <div><img src="Images/snap_logo.jpeg" alt="snapchat"  height="17px" width="20px"></div>
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
