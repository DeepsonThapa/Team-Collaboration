<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
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
    box-sizing: border-box;
    font-family: 'Poppins';
  }
  
  body {
    background-color: #f8f9fa;
    color: #333;
  }
  
  .dashboard {
    display: grid;
    grid-template-columns: 200px 1fr;
    height:100vh;
  }
  

  .sidebar {
   
    background-color: #fffcfc;
    border-right: 1px solid #000000;
    display: flex;
    flex-direction: column;
    
    padding:17px;
   
  }
  
  .logo img {
    height:80%;
    width: 80%;
    
  }
  nav p{
    font-size: 14px;
    font-weight: bold;
    opacity:0.3;
    text-align: left;
    margin-bottom:17px;
   
  }
  nav ul {
    list-style: none;
   width:100%;
  }
  
  nav ul li {
   padding:10px;
    margin-bottom: 10px;
    border-radius: 8px;
    cursor: pointer;
    text-align: center;
    font-size: 14px;
    font-weight: 500;
  }
  nav ul a{
    text-decoration: none;
    color:black;
  }
  nav ul li.active {
    background-color: #FC8A06;
    color: #fff;
  }
  
  nav ul li.active:hover {
    background-color: #d77505;
    color:white;
  }
  nav ul li:hover {
    color: #FC8A06;
  
  }
  
  /* Main Content */
  .main-content {
    background-color: #f4efe9;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
  }
  .main-content p{
    margin-left:20px;
    margin-top:10px;
    font-size: 14px;
  }

       
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 20px;
            background-color: #fff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            border-radius: 8px; 
            overflow: hidden; 
        }

        thead {
            background-color: #fc8a06; 
            color: #fff; 
            text-align: left;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd; 
        }

        th {
            font-weight: bold;
        }

        tbody tr:last-child td {
            border-bottom: none; 
        }

        tbody tr:hover {
            background-color: #f5f5f5; 
        }

        
        a {
            color: #fc8a06; 
            text-decoration: none;
            font-weight: 500; 
        }

        a:hover {
            text-decoration: underline;
        }

      
        td:last-child {
            text-align: center; 
        }

        
        td[colspan="4"] {
            text-align: center;
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>
    
<div class="dashboard">
    
    <aside class="sidebar">
      <div class="logo">
        <img src="Images/Logo.png" alt="Foodly Logo" />
      </div>
      <nav>
        <p>MAIN</p>
        <ul>
            <a href="Admin_Dashboard.php"><li>Dashboard</li></a>
            <a href="admin_orders.php"><li >Orders</li></a>
            <a href="admin_restaurants.php"><li >Restaurants</li></a>
            <a href="admin_requests.php"><li class="active">Requests</li></a>

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
  
        <p>Requests</p>

<table>
    <thead>
        <tr>
            <th>Restaurant Name</th>
            <th>Owner Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
       
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "restaurants";
        $port = "3307";

        $conn = new mysqli($servername, $username, $password, $database, $port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $sql = "SELECT id, restaurant_name, owner_name, approval_status FROM restaurant_table WHERE approval_status = 'pending'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['restaurant_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['owner_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['approval_status']); ?></td>
                    <td>
                        <?php if ($row['approval_status'] == 'pending'): ?>
                            <a href="approve_deny.php?id=<?php echo htmlspecialchars($row['id']); ?>&action=approve">Approve</a> |
                            <a href="approve_deny.php?id=<?php echo htmlspecialchars($row['id']); ?>&action=deny">Deny</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='4'>No pending requests found.</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>
</body>
</html>