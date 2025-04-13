<?php
session_start();


if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$port = 3307; 

// database connections
$menu_conn = new mysqli($servername, $username, $password, "menu_db", $port);
$order_conn = new mysqli($servername, $username, $password, "orders_db", $port);
$user_conn = new mysqli($servername, $username, $password, "users", $port);
$restaurant_conn = new mysqli($servername, $username, $password, "restaurants", $port);


    if ($menu_conn->connect_error) {
    die("Connection failed to menu_db: " . $menu_conn->connect_error);
        }
      if ($order_conn->connect_error) {
    die("Connection failed to orders_db: " . $order_conn->connect_error);
    }
      if ($user_conn->connect_error) {
    die("Connection failed to users: " . $user_conn->connect_error);
        }
          if ($restaurant_conn->connect_error) {
    die("Connection failed to restaurants: " . $restaurant_conn->connect_error);
        }


// menu-items
$menu_result = $menu_conn->query("SELECT COUNT(*) AS total_menus FROM menu_items");
if ($menu_result) {
    $menu_count = $menu_result->fetch_assoc()['total_menus'];
    $menu_result->free_result();
} else {
    $menu_count = 0;
    echo "Error counting menu items: " . $menu_conn->error;
}

// orders
$order_result = $order_conn->query("SELECT COUNT(*) AS total_orders FROM orders");
if ($order_result) {
    $order_count = $order_result->fetch_assoc()['total_orders'];
    $order_result->free_result();
} else {
    $order_count = 0;
    echo "Error counting orders: " . $order_conn->error;
}

// users
$user_result = $user_conn->query("SELECT COUNT(*) AS total_users FROM form");
if ($user_result) {
    $user_count = $user_result->fetch_assoc()['total_users'];
    $user_result->free_result();
} else {
    $user_count = 0;
    echo "Error counting users: " . $user_conn->error;
}

// restaurants
$restaurant_result = $restaurant_conn->query("SELECT COUNT(*) AS total_restaurants FROM restaurant_table");
if ($restaurant_result) {
    $restaurant_count = $restaurant_result->fetch_assoc()['total_restaurants'];
    $restaurant_result->free_result();
} else {
    $restaurant_count = 0;
    echo "Error counting restaurants: " . $restaurant_conn->error;
}

// earningg chart
$monthly_earnings = array_fill(1, 12, 0);
$earning_query = $order_conn->query("SELECT total_amount, order_date FROM orders");
if ($earning_query) {
    while ($row = $earning_query->fetch_assoc()) {
        $month = date('n', strtotime($row['order_date']));
        $monthly_earnings[$month] += $row['total_amount'];
    }
    $earning_query->free_result();
} else {
    echo "Error fetching monthly earnings: " . $order_conn->error;
}


$menu_conn->close();
$order_conn->close();
$user_conn->close();
$restaurant_conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="Admin_Dashboard.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style>
      * {
          margin: 0;
          padding: 0;
          font-family: 'Poppins';
      }
      .chart-container {
          width: 100%;
          height: 400px;
          margin: 20px 0;
      }
      .chart {
          width: 100%;
          height: 400px;
          margin-top: 20px;
      }
  </style>
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
          <a href="Admin_Dashboard.php"><li class="active">Dashboard</li></a>
          <a href="admin_orders.php"><li>Orders</li></a>
          <a href="admin_restaurants.php"><li>Restaurants</li></a>
          <a href="admin_requests.php"><li>Requests</li></a>
        </ul>
        <ul>
          <a href="admin_logout.php"><li class="logout">Logout</li></a>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Header -->
      <header class="header">
        <div class="header-left">
          <h1>Administration Panel</h1>
        </div>
      </header>

      <p>Dashboard</p>

     
      <section class="stats">
        <div class="stat-card">
          <h2>Total Menus</h2>
          <p><?= $menu_count ?></p>
        </div>
        <div class="stat-card">
          <h2>Total Orders</h2>
          <p><?= $order_count ?></p>
        </div>
        <div class="stat-card">
          <h2>Active Users</h2>
          <p><?= $user_count ?></p>
        </div>
        <div class="stat-card">
          <h2>New Restaurants</h2>
          <p><?= $restaurant_count ?></p>
        </div>
      </section>

      <section class="charts">
        <div class="chart">
          <canvas id="lineChart"></canvas>
        </div>
        <div class="chart">
          <canvas id="doughnutChart"></canvas>
        </div>
      </section>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
  <script>
        // line Chart - Monthly Earnings
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ],
                datasets: [{
                    label: 'Monthly Earnings (NPR)',
                    data: <?= json_encode(array_values($monthly_earnings)) ?>,
                    backgroundColor: '#FC8A06', 
                    borderColor: '#FC8A06',     
                    borderWidth: 2,
                    tension: 0.3 
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    // pie chart
    const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
    new Chart(doughnutCtx, {
        type: 'doughnut',
        data: {
            labels: ['Orders', 'Users', 'Restaurants', 'Menus'],
            datasets: [{
                label: 'System Data',
                data: [
                    <?= $order_count ?>,
                    <?= $user_count ?>,
                    <?= $restaurant_count ?>,
                    <?= $menu_count ?>
                ],
                backgroundColor: [
                    'rgb(247, 137, 18)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(120, 46, 139, 1)'
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
  </script>
</body>
</html>
