<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodly</title>
  <link rel="stylesheet" href="Home.css">
  <link rel="icon" type="image/x-icon" href="Images/favicon.ico.png">

  <meta name="theme-color" content="#000000" />
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
            <img src="Images/Logo.png" alt="Foodly Logo" title="www.Foodly.com.np">
        </div>

        
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>


        <ul class="navlinks">
    <li><a href="Home.php">Home</a></li>
    <li><a href="#">Browse Menu</a></li>
    <li><a href="List_Of_Restaurants.php">Restaurants</a></li>
    <li><a href="#AboutUs">About Us</a></li>
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



  <!--Section 1-->
  <section class="section1">
    <div class="content">
        <h1>Where food meets convenience</h1>
        <p>Anytime. Anywhere.<br><br> Your favorite food is just a bite away.</p>
        <div class="search-bar">
          <input type="text" placeholder="Search Food">
          <button>Search</button>
        </div>
      </div>


      <div class="image1">
        <img src="Images/image.jpeg" alt="Food Image">
      </div>

</div>

  </section>
  <p></p>

  <!--section2 - courses-->
  <section class="section2">
   
     <h3>Courses</h3>
     <div class="courses">
     <ul class="courses-list">
      
          <li><a href="#">Breakfast</a></li>
          <li><a href="#">Lunch</a></li>
          <li><a href="#">Dinner</a></li>
        </ul>
        </div>
   
  </div>
  </section>
  
    <section class="section3">
      <div class="courses-img">

      <div class="coursesimg1">
        <p>Breakfast</p>
        
      </div>
      <div class="coursesimg2">
        <p>Lunch</p>
        
      </div>
      <div class="coursesimg3">
        <p>Dinner</p>
        
      </div>
    </div>
  </section>
  </section>
  <section class="section4">
    <h3>Foodly Popular categories</h3>

    <div class="all"><!--image of different food items-->
      <div class="food-img1">
        <p>MO:MO</p>
      </div>
      <div class="food-img2">
        <p>Salads</p>
      </div>
      <div class="food-img3">
        <p>Keema Noodels</p>
      </div>
      <div class="food-img4">
        <p>Pizza</p>
      </div>
      <div class="food-img5">
        <p>Chowmein</p>
      </div>
      <div class="food-img6">
        <p>Soup</p>
      </div>
   </div>
  </section>

  <!--Restaurants-->

  <section class="section5">
    <h3>Popular Restaurants</h3>
    </section>
    <section class="section5-1">
    <div class="Res1">
      <img src="Images/Roadhouse Cafe.jpg" alt="restaurant" >
      <a href="Menu1.php">Roadhouse Cafe</a>
    </div>
    <div class="Res1">
      <img src="Images/Byanjan Restaurant.jpg" alt="restaurant" >
      <a href="Menu1.php">Byanjan Restaurant</a>
    </div>
    <div class="Res1">
      <img src="Images/French Creperie.jpg"  alt="restaurant" >
      <a href="Menu1.php">French Creperie</a>
    </div>
    </section>

    <section class="section5-2">

    <div class="Res2">
      <img src="Images/fresh-elements-restaurant.jpg"  alt="restaurant" >
      <a href="Menu1.php">Fresh Elements Restaurant</a>
    </div>
    <div class="Res2">
      <img src="Images/Soul Origin Cafe and Restaurant.jpg"  alt="restaurant" >
      <a href="Menu1.php">Soul Origin Cafe and Restaurant</a>
    </div>
    <div class="Res2">
      <img src="Images/Open House.jpg"  alt="restaurant">
      <a href="Menu1.php">Open House Restro</a>
    </div>
  </section>


    <section class="section6"><hr></section>

    <!--About Us-->

     <section class="section7">
    <h3>Know More About Us</h3>
     </section>


     <section class="section8">
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
   </section>

  <section class="section9">
  <div>
    <p>Signup as a restaurant</p>
    
    <h1>Partner With us<h1>
      
      <a href="Restaurant.php"><button type="button">GET STARTED</button></a>
  </div>
  </section>
   <br>

    <section class="section10">
  <div>
    <p>Foodly simplifies the food ordering processes. Browse through our diverse menu, select your favorite dishes, 
      and proceed to checkout. Your order will be delivered to your doorstep within the specified time frame.</p>
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
        <li><a href="Restaurant.php">Add your restaurant</a></li>
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
