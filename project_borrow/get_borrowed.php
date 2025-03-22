<?php
include 'db.php';

// ดึงข้อมูลอุปกรณ์ที่ยืมแล้ว
$sql_borrowed = "SELECT * FROM equipment WHERE status = 'borrowed'";
$result_borrowed = $conn->query($sql_borrowed);
$borrowed = [];

while ($row = $result_borrowed->fetch_assoc()) {
    $borrowed[] = $row;
}

// ดึงข้อมูลอุปกรณ์ที่ต้องคืน (สมมติว่าในฐานข้อมูลมีการเก็บวันคืน)
$sql_returning = "SELECT * FROM equipment WHERE status = 'returning'";
$result_returning = $conn->query($sql_returning);
$returning = [];

while ($row = $result_returning->fetch_assoc()) {
    $returning[] = $row;
}

echo json_encode(['borrowed' => $borrowed, 'returning' => $returning]);
?>
