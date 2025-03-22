<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // อัปเดตสถานะอุปกรณ์เป็นยืม
    $sql = "UPDATE equipment SET status='borrowed' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
