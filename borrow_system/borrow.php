<?php
session_start();
include "db.php";

if (isset($_POST["item_id"])) {
$item_id = $_POST["item_id"];
$user_id = $_SESSION["user_id"];

$query = "INSERT INTO borrow_records (user_id, item_id, borrow_date, status) VALUES ('$user_id', '$item_id', NOW(), 'borrowed')";
mysqli_query($conn, $query);

$update = "UPDATE items SET status='borrowed' WHERE id='$item_id'";
mysqli_query($conn, $update);

echo "ยืมสำเร็จ!";
}
?>