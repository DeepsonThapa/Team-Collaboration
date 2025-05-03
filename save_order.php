<?php
include 'db_connect.php'; 
session_start(); 
//for user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST['user_first_name'];
    $last_name = $_POST['user_last_name'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $city = $_POST['City'];
    $province = $_POST['Province'];
    $house_street = $_POST['address2'];
    $area = $_POST['Area'];

    // insert into orderdetails table
    $sql = "INSERT INTO orderdetails (user_first_name, user_last_name, address, contact_number, city, province, house_street, area)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $first_name, $last_name, $address, $contact_number, $city, $province, $house_street, $area);

    if ($stmt->execute()) {
       
        $orderdetails_id = $stmt->insert_id;

      
        $_SESSION['orderdetails_id'] = $orderdetails_id;

        // redirect to payment options page
        header("Location: payment.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>


