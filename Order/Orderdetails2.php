<?php
session_start();

// check if the order item is set in the session
if (!isset($_SESSION['direct_order'])) {
    echo "Error: No item selected for direct order.";
    exit;
}

$item = $_SESSION['direct_order'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="Orderdetails2.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins';
        }
        .container {
            height: 490px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h2>Order Details:</h2>
            <p>Please fill up your details.</p>

            <!-- Form starts here -->
            <form method="POST" action="save_order2.php">

            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($item['name']); ?>">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="<?php echo $item['price']; ?>">
                <input type="hidden" name="restaurant_id" value="<?php echo $item['restaurant_id']; ?>">
                <input type="hidden" name="description" value="<?php echo htmlspecialchars($item['description']); ?>">
                <input type="hidden" name="image_path" value="<?php echo htmlspecialchars($item['image']); ?>">
                <div class="name">
                    <div>
                        <h5>Your First Name</h5>
                        <input type="text" name="user_first_name" placeholder="First Name" required>
                    </div>
                    <div>
                        <h5>Your Last Name</h5>
                        <input type="text" name="user_last_name" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="address">
                    <div>
                        <h5>Address</h5>
                        <input type="text" name="address" placeholder="Your Address for the order" required>
                    </div>
                    <div>
                        <h5>Contact Number</h5>
                        <input type="tel" name="contact_number" placeholder="Your Contact Number" required>
                    </div>
                </div>
                <div class="address1">
                    <div>
                        <h5>City</h5>
                        <input type="text" name="City" placeholder="Please choose your City" required>
                    </div>
                    <div>
                        <h5>Province</h5>
                        <input type="text" name="Province" placeholder="Please enter your Province" required>
                    </div>
                </div>
                <div class="address2">
                    <div>
                        <h5>House.No And Street.No</h5>
                        <input type="text" name="address2" placeholder="Your house number and street number" required>
                    </div>
                    <div>
                        <h5>Area</h5>
                        <input type="text" name="Area" placeholder="Please enter your Area" required>
                    </div>
                </div>
                <div class="request-btn1">
                    <button type="submit">Save</button>
                </div>
            </form>
           
        </div>
    </div>
</body>
</html>
