<?php
include 'connection.php';

if (isset($_GET['deleteid'])) {
   
    $id = intval($_GET['deleteid']); 

    
    $stmt = $con->prepare("DELETE FROM `mycrud` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($result) {
        //echo "Deleted successfully";
        header('location:display.php');
    } else {
        die("Error: " . $stmt->error);
    }

    $stmt->close();
}
?>

