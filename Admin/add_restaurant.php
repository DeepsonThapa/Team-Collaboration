<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "admin";
$port = '3307'; 

$conn = new mysqli($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// check if form data is sent
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $cuisine = $_POST["cuisine"];
    $location = $_POST["location"];
    $img_path = "";
    $menu_path = "";
    

     // check if menu file is uploadedd
     if (isset($_FILES["menu_path"]) && $_FILES["menu_path"]["error"] === UPLOAD_ERR_OK) {
        $menu_path = "Form/" . basename($_FILES["menu_path"]["name"]);
        move_uploaded_file($_FILES["menu_path"]["tmp_name"], $menu_path);
    } else {
        echo "Error uploading menu file.";
    }

    // check if image file is uploaded
    if (isset($_FILES["img_path"]) && $_FILES["img_path"]["error"] === UPLOAD_ERR_OK) {
        $img_path = "Images/" . basename($_FILES["img_path"]["name"]);
        move_uploaded_file($_FILES["img_path"]["tmp_name"], $img_path);
    } else {
        echo "Error uploading image file.";
    }
    
}  

$stmt = $conn->prepare("INSERT INTO admin_res (res_name, res_cuisine, res_location, img_path, res_menu) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $cuisine, $location, $img_path, $menu_path);

if ($stmt->execute()) {
    echo "Restaurant added successfully!";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
?>
