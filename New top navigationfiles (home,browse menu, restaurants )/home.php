<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodly</title>
  <link rel="stylesheet" href="home.css">
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
        <li><a href="List_of_restaurant.html">Restaurants</a></li>
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
        <img src="image.jpeg" alt="Food Image">
      </div>

</div>

  </section>
  <p></p>

  <!--section2 - courses-->
  <section class="section2">
   
     <h3>Courses</h3>
     <div class="courses">
     <ul class="courses-list">
      
          <li><a href="Menu1.php">Breakfast</a></li>
          <li><a href="Menu1.php">Lunch</a></li>
          <li><a href="Menu1.php">Dinner</a></li>
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
    <div class="Res-1">
      <img src="Roadhouse Cafe.jpg" alt="restaurant" >
      <a href="#">Roadhouse Cafe</a>
    </div>
    <div class="Res-2">
      <img src="Byanjan Restaurant.jpg" alt="restaurant" >
      <a href="#">Byanjan Restaurant</a>
    </div>
    <div class="Res-3">
      <img src="French Creperie.jpg"  alt="restaurant" >
      <a id="res-3" href="#">French Creperie</a>
    </div>
    </section>

    <section class="section5-2">

    <div class="Res-4">
      <img src="fresh-elements-restaurant.jpg"  alt="restaurant" >
      <a href="#">Fresh Elements Restaurant</a>
    </div>
    <div class="Res-5">
      <img src="Soul Origin Cafe and Restaurant.jpg"  alt="restaurant" >
      <a href="#">Soul Origin Cafe and Restaurant</a>
    </div>
    <div class="Res-6">
      <img src="Open House.jpg"  alt="restaurant">
      <a id="res-6" href="#">Open House Restro</a>
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
      
    <button> <a href= "Restaurant_form.php" > GET STARTED  </a> </button>
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

<!--Logo links-->

  <div class="logo9"><img src="Logo.png" alt="logo" height="20px" width="50px">

    <p>Company #490039-445, Registered with House of companies.</p>
  
  </div>
  
  <div class="social">

    <h4>Connect With Us On</h4>

    <div class="log"><!--Different social media image-->

    <div id="facebook">
      <a href="https://www.facebook.com/"><img src="fb_logo.jpeg" alt="faceboook" height="15" width="20px"></a>
    </div>

    <div id="instagram">
      <a href="https://www.instagram.com/"><img src="ins_logo.jpeg" alt="Instagram" height="15" width="20px"></a>
      </div>

    <div id="tiktok">
      <a href="https://www.tiktok.com/"><img src="t_logo.png" alt="Tiktok" height="15" width="20px"></a>
    </div>

    <div id="snapchat">
      <a href="https://www.snapchat.com/"><img src="snap_logo.jpeg" alt="Snapchat" height="15" width="20px"></a>
    </div>
    
  </div>

  </div>


<!--legal links-->
  <div class="info">
    <div class="first">
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
        <li><a href="Restaurant_form.php">Add your restaurant</a></li>
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


</html>
