<?php
$servername = "localhost"; // ชื่อเซิร์ฟเวอร์
$username = "root";        // ชื่อผู้ใช้ฐานข้อมูล
$password = "";            // รหัสผ่านฐานข้อมูล
$dbname = "it";  // ชื่อฐานข้อมูล

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
