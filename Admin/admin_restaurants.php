
<?php

session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "restaurants";
$port = "3307"; 

$conn = new mysqli($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// fetching data from database
$sql = "SELECT * FROM restaurant_table WHERE approval_status = 'approved'";
$result = $conn->query($sql);

$restaurants = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $restaurants[] = $row;
    }
}

// edit or delte
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $res_id = $_POST['res_id'];

      
        $delete_sql = "DELETE FROM restaurant_table WHERE id = $res_id";
        if ($conn->query($delete_sql) === TRUE) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
        exit();
    }

    if (isset($_POST['restaurant_id'])) {
        //  updating
        $id = $_POST['restaurant_id'];
        $name = $_POST['name'];
        $cuisine = $_POST['cuisine'];
        $location = $_POST['location'];
        
        $update_sql = "UPDATE restaurant_table SET restaurant_name = '$name', cuisine = '$cuisine', Address = '$location' WHERE id = $id";

        if ($conn->query($update_sql) === TRUE) {
            echo json_encode(['status' => 'success', 'id' => $id, 'res_name' => $name, 'res_cuisine' => $cuisine, 'res_location' => $location]);
        } else {
            echo json_encode(['status' => 'error']);
        }
        exit();
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin-Restaurants</title>
  <link rel="stylesheet" href="admin_restaurants.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style type="text/css">
      * {
          margin: 0;
          padding: 0;
          font-family: 'Poppins';
        }
        .restaurant-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .restaurant-card img {
            width: 100%; 
            max-height: 200px; 
            object-fit: cover;
            border-radius: 8px 8px 0 0; 
        }
  </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="logo">
        <img src="Images/Logo.png" alt="Foodly Logo" />
      </div>
      <nav>
        <p>MAIN</p>
        <ul>
            <a href="Admin_Dashboard.php"><li>Dashboard</li></a>
            <a href="admin_orders.php"><li >Orders</li></a>
            <a href="admin_restaurants.php"><li class="active">Restaurants</li></a>
            <a href="admin_requests.php"><li>Requests</li></a>
          </ul>
          <ul>
          <a href="admin_logout.php"><li class="logout">Logout</li></a>
        </ul>
      </nav>
     
    </aside>

  
    <div class="main-content">
        <!-- Header -->
        <header class="header">
          <div class="header-left">
            <h1>Administration Panel</h1>
          </div>
        </header>
  
        <p>List of Restaurants</p>

        <div class="admin-panel">
    <div class="restaurant-list">
        <?php if (!empty($restaurants)): ?>
            <?php foreach ($restaurants as $restaurant): ?>
                <div class="restaurant-card">
                    <img src="<?= $restaurant['img_path']; ?>" alt="">
                    <h2><?= $restaurant['restaurant_name']; ?></h2>
                    <p>Cuisine: <?= $restaurant['cuisine']; ?></p>
                    <p>Location: <?= $restaurant['Address']; ?></p>
                    <a href="<?= $restaurant['menu_path']; ?>" class="menu-link">View Menu</a>
                    <div class="actions">
                        <input type="hidden" name="id" value="<?= $restaurant['id']; ?>">
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No restaurants found.</p>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById('restaurantModal');
        const closeBtn = document.querySelector('.close-btn');

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        document.querySelector('.restaurant-list').addEventListener('click', (event) => {
            if (event.target.classList.contains('delete-btn')) {
                // msg
                const confirmation = confirm("Are you sure you want to delete this restaurant?");
                
                if (confirmation) {
                    const card = event.target.closest('.restaurant-card');
                    const id = card.querySelector('input[name="id"]').value;

                    fetch('admin_restaurants.php', {
                        method: 'POST',
                        body: new URLSearchParams({
                            action: 'delete',
                            res_id: id
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            card.remove();
                        } else {
                            alert("Error deleting restaurant.");
                        }
                    });
                } else {
                    
                    console.log("Restaurant deletion canceled.");
                }
            } else if (event.target.classList.contains('edit-btn')) {
                const card = event.target.closest('.restaurant-card');
                const id = card.querySelector('input[name="id"]').value;
                const name = card.querySelector('h2').textContent;
                const cuisine = card.querySelector('p:nth-of-type(1)').textContent.split(': ')[1];
                const location = card.querySelector('p:nth-of-type(2)').textContent.split(': ')[1];

                document.getElementById('restaurantId').value = id;
                document.getElementById('name').value = name;
                document.getElementById('cuisine').value = cuisine;
                document.getElementById('location').value = location;

                modal.style.display = 'block';
            }
        });

        document.getElementById('restaurantForm').addEventListener('submit', (event) => {
            event.preventDefault();

            const formData = new FormData(document.getElementById('restaurantForm'));

            fetch('admin_restaurants.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    const card = document.querySelector(`.restaurant-card input[name="id"][value="${data.id}"]`).closest('.restaurant-card');
                    card.querySelector('h2').textContent = data.res_name;
                    card.querySelector('p:nth-of-type(1)').textContent = `Cuisine: ${data.res_cuisine}`;
                    card.querySelector('p:nth-of-type(2)').textContent = `Location: ${data.res_location}`;

                    modal.style.display = 'none';
                } else {
                    alert("Error updating restaurant.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>


    
        </div>
    
         <!-- for editing restaurants -->
         <div id="restaurantModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Edit Restaurant</h2>
                <form id="restaurantForm" method="POST">
                    <input type="hidden" id="restaurantId" name="restaurant_id">
                    <label for="name">Restaurant Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="cuisine">Cuisine:</label>
                    <input type="text" id="cuisine" name="cuisine" required>
                    
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
                    
                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
  </div>
    </body>
    </html>
    
    <?php
    $conn->close();
    ?>