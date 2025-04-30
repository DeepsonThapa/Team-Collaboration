<?php
session_start();
if (!isset($_SESSION['orderdetails_id'])) {
    header("Location: Home.php");
    exit();
}
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
    <form action="place_order.php" method="POST">
        <input type="hidden" name="orderdetails_id" value="<?php echo $_SESSION['orderdetails_id']; ?>">
        <div class="buttom2">
        <button type="Submit" name = "payment">Payment</button>
        <button type="submit" name="cod">Cash on Delivery</button>
    </div>
    </form>
</body>
</html>
