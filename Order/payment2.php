<?php
session_start();

if (!isset($_SESSION['order_id'])) {
    echo "Error: Order ID not found. Please try again.";
    exit;
}

$order_id = $_SESSION['order_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Options</title>
    <style>
         .buttom2 {
            align-items:center;
            justify-content:center;
          margin-top: 40px;
          background-color: green;
          height: 45px;
          width: 100%;
          border-radius: 10px;
          display: grid;
          justify-content: center;
          align-items: center;
      }

      .buttom2 button {
          width: 100%;
          height: 100%;
          border: none;
          background-color: green;
          color: white;
          font-size: 14px;
      }

      .buttom2 button:hover {
          color: black;
      }
        </style>
</head>
<body>
    <h2>Choose Payment Method</h2>
    <form action="place_order2.php" method="POST">
        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
        <div class="buttom2">
            <button type="submit" name="payment">Pay Now</button>
            <button type="submit" name="cod">Cash on Delivery</button>
        </div>
    </form>
</body>
</html>
