<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="Orderdetails.css">
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
            <form method="POST" action="save_order.php">
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
