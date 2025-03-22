<?php
// เริ่ม session
session_start();

// ตรวจสอบว่า session 'logged_in' มีค่าเป็น true หรือไม่
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php'); // ถ้ายังไม่ได้ล็อกอินให้ไปที่หน้าล็อกอิน
    exit();
}

// รวมฐานข้อมูล
include 'db.php';

// แสดงข้อมูลทั้งหมดจากฐานข้อมูล
$sql = "SELECT * FROM equipment";
$result = $conn->query($sql);

// ฟังก์ชันการลบอุปกรณ์
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_sql = "DELETE FROM equipment WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header('Location: admin.php');
}

// ฟังก์ชันการเพิ่มอุปกรณ์
if (isset($_POST['add_equipment'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $status = $_POST['status'];

    $insert_sql = "INSERT INTO equipment (name, type, status) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sss", $name, $type, $status);
    $stmt->execute();
    header('Location: admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - IT Equipment Borrowing System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="nav-container">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="admin.php">Admin Panel</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- ฟอร์มสำหรับเพิ่มอุปกรณ์ใหม่ -->
    <div class="form-container">
        <h2>Add New Equipment</h2>
        <form action="admin.php" method="POST">
            <label for="name">Equipment Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="type">Equipment Type:</label>
            <input type="text" id="type" name="type" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="available">Available</option>
                <option value="borrowed">Borrowed</option>
            </select>

            <button type="submit" name="add_equipment">Add Equipment</button>
        </form>
    </div>

    <!-- ตารางแสดงข้อมูลอุปกรณ์ทั้งหมด -->
    <div class="equipment-table">
        <h2>All Equipment</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Equipment</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . ucfirst($row['status']) . "</td>";
                    echo "<td><a href='admin.php?delete=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2025 IT Equipment Borrowing System</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
