<?php
// เชื่อมต่อฐานข้อมูล
session_start();
include "../db.php";

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "user") {
    header("Location: ../index.php");
    exit;
}

// ดึงข้อมูลอุปกรณ์ทั้งหมด
$query = "SELECT * FROM items";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css"> <!-- ตรวจสอบเส้นทางไฟล์ CSS -->
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile">
            <img src="../images/user.jpg" alt="User Profile">
            <p>ผู้ใช้</p>
        </div>
        <ul>
            <li><a href="#">อุปกรณ์ที่ยืม</a></li>
            <li><a href="#">ประวัติการยืม</a></li>
            <li><a href="#">⚙︎</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container mt-5">
            <h1 class="mb-4">รายการอุปกรณ์ IT</h1>
            <div class="row">
                <?php
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="../images/<?= htmlspecialchars($row['image']) ?>" 
                                 class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                                <p class="card-text">สถานะ: <?= htmlspecialchars($row['status']) ?></p>
                                <p class="card-text">คงเหลือ: <?= htmlspecialchars($row['quantity']) ?> ชิ้น</p>
                                <button class="btn btn-primary">ยืม</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
