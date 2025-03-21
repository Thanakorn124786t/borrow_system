<?php
$host = "localhost";  // หรือใส่เป็น IP ของเซิร์ฟเวอร์
$user = "root";       // ชื่อผู้ใช้ของ MySQL
$pass = "";           // รหัสผ่าน (ถ้ามี)
$dbname = "borrow_system";  // ชื่อฐานข้อมูล

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($host, $user, $pass, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}

// ตั้งค่าการอ่านข้อมูลให้รองรับ UTF-8
mysqli_set_charset($conn, "utf8");
?>
