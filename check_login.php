<?php
session_start();
include("Conn.php"); 

$response = ['logged_in' => false];

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    
    $query = $conn->prepare("SELECT fname, lname, Email FROM form WHERE id = ?");
    $query->bind_param("i", $user_id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $response['logged_in'] = true;
        $response['user_id'] = $user_id;
        $response['fname'] = $user['fname']; 
        $response['lname'] = $user['lname']; 
        $response['Email'] = $user['Email']; 
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>