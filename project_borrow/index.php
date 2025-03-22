<?php
// รวมฐานข้อมูล
include 'db.php';

// รับค่าค้นหาจากฟอร์ม
$search = isset($_GET['search']) ? $_GET['search'] : '';  // ค่า default ถ้าไม่มีการค้นหา

// สร้าง SQL Query ที่ใช้ LIKE % สำหรับค้นหาข้อมูล
$sql = "SELECT * FROM equipment WHERE name LIKE ? OR type LIKE ?";  // ใช้ OR สำหรับค้นหาทั้งชื่อและประเภทอุปกรณ์

// เตรียมคำสั่ง SQL และผูกตัวแปร
$stmt = $conn->prepare($sql);

// คำค้นหาจะถูกเพิ่ม % ที่ทั้งสองข้าง
$searchTerm = "%" . $search . "%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);

// ดำเนินการ query
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Equipment Borrowing System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="nav-container">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?status=borrowed">Borrowed</a></li>
                    <li><a href="index.php?status=available">Available</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="search-container">
        <form action="index.php" method="GET">
            <input type="text" name="search" placeholder="Search equipment..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
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
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . ucfirst($row['status']) . "</td>";
                    echo "<td><button class='borrow-btn' data-id='" . $row['id'] . "'>Borrow</button></td>";
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
