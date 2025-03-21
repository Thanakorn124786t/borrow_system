<?php
// เริ่ม session และเชื่อมต่อฐานข้อมูล
session_start();
include "../db.php";

// ตรวจสอบสิทธิ์แอดมิน
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: ../index.php");
    exit;
}

// ดึงข้อมูลอุปกรณ์ทั้งหมดจากฐานข้อมูล
$query = "SELECT * FROM items";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แผงควบคุมแอดมิน - ระบบยืมคืนอุปกรณ์ IT</title>
    <!-- ลิงค์ไปยัง Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">

</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- แสดงข้อมูลโปรไฟล์ของ Admin -->
        <div class="profile">
            <img src="../images/admin-profile.jpg" alt="Admin Profile">
            <p>Admin</p>
        </div>

        <!-- เมนู Sidebar -->
        <ul>
            <li><a href="#">อุปกรณ์ที่ยืม</a></li>
            <li><a href="#">พอยืม</a></li>
            <li><a href="#">ตั้งค่า</a></li>
        </ul>
    </div>

    <!-- Content Section -->
    <div class="main-content">
        <div class="container">
            <h1>แผงควบคุมแอดมิน</h1>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../images/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['name'] ?></h5>
                                <p class="card-text">สถานะ: <?= $row['status'] ?> คงเหลือ: <?= $row['quantity'] ?> ชิ้น</p>
                                <button class="btn btn-primary">ยืม</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- ลิงค์ไปยัง Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
