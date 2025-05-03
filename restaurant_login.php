<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurants"; 
$port = "3307";

//connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email_address']);
    $password = $_POST['password'];

    // check approved restaurant login
    $stmt = $conn->prepare("SELECT * FROM restaurant_table WHERE email_address = ? AND approval_status = 'approved'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // verify
    if ($result->num_rows == 1) {
        $restaurant = $result->fetch_assoc();

        if (password_verify($password, $restaurant['password'])) {
            $_SESSION['restaurant_logged_in'] = true;
            $_SESSION['restaurant_id'] = $restaurant['id']; // Store restaurant ID
            $_SESSION['restaurant_name'] = $restaurant['restaurant_name'];

            header("Location: Menu1_res.php"); 
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Invalid email or restaurant not approved.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Login Panel</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0; 
        }

        .login-panel {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        .login-panel h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333; 
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #555; 
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-button {
            background-color: #FC8A06; 
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .login-button:hover {
            background-color: rgb(238, 123, 0);
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="login-panel">
        <h2>RESTAURANT LOGIN PANEL</h2>

        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <label for="email_address">Email</label>
                <input type="email" id="email_address" name="email_address" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-button">Sign in</button>
        </form>
    </div>

</body>
</html>
