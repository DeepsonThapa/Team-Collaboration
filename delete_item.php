<?php
include("Menu_Conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM menu_items WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: Menu1_res.php?msg=Item deleted successfully");
    } else {
        echo "Error deleting item.";
    }
}
?>
