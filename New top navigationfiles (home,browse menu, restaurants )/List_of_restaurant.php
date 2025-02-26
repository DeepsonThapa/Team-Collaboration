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
  <!--Section 1-->
  <section class="section1">
    <div class="content">
        <h1>"When hunger calls, we deliver-<br>not just food,but an experience to<br>savor."</h1>

      </div>
      <div class="image">
        <img src="Food Image">
      </div>
  </section>
  <section class="Search">
    <div class="search-bar">
      <input type="text" placeholder="Search For Restaurants">
      <button>Search</button>
    </div>
  </section>
  <section class="restaurants">
    <h2>List of Restaurants In Pokhara</h2>
    <div class="first">
    <div class="res1">
      <div class="circle1"><img src="" alt=""></div>
      <div class="res-name"><h3>ROADHOUSE CAFE AND RESTRO</h3>
      <a href="#">Baidam road, Pokhara</a>
      </div>
      </div>
      <div class="ratingbody">
        <div class="rating">
          <input type="radio" id="star5" name="rating" value="5">
          <label for="star5">&#9733;</label>
          <input type="radio" id="star4" name="rating" value="4">
          <label for="star4">&#9733;</label>
          <input type="radio" id="star3" name="rating" value="3">
          <label for="star3">&#9733;</label>
          <input type="radio" id="star2" name="rating" value="2">
          <label for="star2">&#9733;</label>
          <input type="radio" id="star1" name="rating" value="1">
          <label for="star1">&#9733;</label>
        </div>
      </div>
    </div>
    <div class="first">
    <div class="res2">
      <div class="circle2"><img src="" alt=""></div>
      <div class="res-name"><h3>BYANJAN RESTAURANTS</h3>
        <a href="#">Barahi road, Lakeside-6, Pokhara</a>
        </div>
    </div>
    <div class="ratingbody">
      <div class="rating">
        <input type="radio" id="star5a" name="rating1" value="5">
        <label for="star5a">&#9733;</label>
        <input type="radio" id="star4a" name="rating1" value="4">
        <label for="star4a">&#9733;</label>
        <input type="radio" id="star3a" name="rating1" value="3">
        <label for="star3a">&#9733;</label>
        <input type="radio" id="star2a" name="rating1" value="2">
        <label for="star2a">&#9733;</label>
        <input type="radio" id="star1a" name="rating1" value="1">
        <label for="star1a">&#9733;</label>
      </div>
    </div>
    </div>
    <div class="first">
    <div class="res3">
      <div class="circle3"><img src="" alt=""></div>
      <div class="res-name"><h3>FRENCH CREPERIE</h3>
        <a href="#">Baidam road, Pokhara</a>
        </div>
    </div>
    <div class="ratingbody">
      <div class="rating">
        <input type="radio" id="star5b" name="rating2" value="5">
        <label for="star5b">&#9733;</label>
        <input type="radio" id="star4b" name="rating2" value="4">
        <label for="star4b">&#9733;</label>
        <input type="radio" id="star3b" name="rating2" value="3">
        <label for="star3b">&#9733;</label>
        <input type="radio" id="star2b" name="rating2" value="2">
        <label for="star2b">&#9733;</label>
        <input type="radio" id="star1b" name="rating2" value="1">
        <label for="star1b">&#9733;</label>
      </div>
    </div>
    </div>
    <div class="first">
    <div class="res4">
      <div class="circle4"><img src="" alt=""></div>
      <div class="res-name"><h3>HOTEL BARAHI</h3>
        <a href="#">Lakeside Rd 6, Pokhara</a>
        </div>
    </div>
    <div class="ratingbody">
      <div class="rating">
        <input type="radio" id="star5c" name="rating3" value="5">
        <label for="star5c">&#9733;</label>
        <input type="radio" id="star4c" name="rating3" value="4">
        <label for="star4c">&#9733;</label>
        <input type="radio" id="star3c" name="rating3" value="3">
        <label for="star3c">&#9733;</label>
        <input type="radio" id="star2c" name="rating3" value="2">
        <label for="star2c">&#9733;</label>
        <input type="radio" id="star1c" name="rating3" value="1">
        <label for="star1c">&#9733;</label>
      </div>
    </div>
  </div>
  <div class="first">
    <div class="res5">
      <div class="circle5"><img src="" alt=""></div>
      <div class="res-name"><h3>FRESH ELEMENTS RESTAURANTS</h3>
        <a href="#">Lakeside street 16, Pokhara</a>
        </div>
    </div>
    <div class="ratingbody">
      <div class="rating">
        <input type="radio" id="star5d" name="rating4" value="5">
        <label for="star5d">&#9733;</label>
        <input type="radio" id="star4d" name="rating4" value="4">
        <label for="star4d">&#9733;</label>
        <input type="radio" id="star3d" name="rating4" value="3">
        <label for="star3d">&#9733;</label>
        <input type="radio" id="star2d" name="rating4" value="2">
        <label for="star2d">&#9733;</label>
        <input type="radio" id="star1d" name="rating4" value="1">
        <label for="star1d">&#9733;</label>
      </div>
    </div>
    </div>
    <div class="first">
    <div class="res6">
      <div class="circle6"><img src="" alt=""></div>
      <div class="res-name"><h3>TEMPLE TREE RESORT AND SPA</h3>
        <a href="#">Pargati Marga, Pokhara</a>
        </div>
    </div>
    <div class="ratingbody">
      <div class="rating">
        <input type="radio" id="star5e" name="rating5" value="5">
        <label for="star5e">&#9733;</label>
        <input type="radio" id="star4e" name="rating5" value="4">
        <label for="star4e">&#9733;</label>
        <input type="radio" id="star3e" name="rating5" value="3">
        <label for="star3e">&#9733;</label>
        <input type="radio" id="star2e" name="rating5" value="2">
        <label for="star2e">&#9733;</label>
        <input type="radio" id="star1e" name="rating5" value="1">
        <label for="star1e">&#9733;</label>
      </div>
    </div>
    </div>
    <div class="first">
    <div class="res7">
      <div class="circle7"><img src="" alt=""></div>
      <div class="res-name"><h3>POKHARA GRANDE</h3>
        <a href="#">Pardi Bazaar, Pokhara</a>
        </div>
    </div>
    <div class="ratingbody">
      <div class="rating">
        <input type="radio" id="star5f" name="rating6" value="5">
        <label for="star5f">&#9733;</label>
        <input type="radio" id="star4f" name="rating6" value="4">
        <label for="star4f">&#9733;</label>
        <input type="radio" id="star3f" name="rating6" value="3">
        <label for="star3f">&#9733;</label>
        <input type="radio" id="star2f" name="rating6" value="2">
        <label for="star2f">&#9733;</label>
        <input type="radio" id="star1f" name="rating6" value="1">
        <label for="star1f">&#9733;</label>
      </div>
    </div>
    </div>
  </section>  
  <section class="section2">
    <div class="top">
    <h2>More Restaurants</h2>
    <button>></button>
    <!--<button><p><</p></button>-->
    </div>
    <div class="more">
    <div class="image1"></div>
    <div class="image2"></div>
    <div class="image3"></div>
  </div>
  </section>
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

</body>
</html>
