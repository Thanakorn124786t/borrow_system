<?php
// เริ่ม session
session_start();

// เช็คว่ามีการส่งข้อมูลหรือไม่
if (isset($_POST['login'])) {
    // รับข้อมูลจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];

    // กำหนดค่า username และ password สำหรับ admin
    $admin_user = 'admin';
    $admin_pass = '12345';

    // ตรวจสอบการเข้าสู่ระบบ
    if ($username === $admin_user && $password === $admin_pass) {
        // ตั้งค่า session เมื่อเข้าสู่ระบบสำเร็จ
        $_SESSION['logged_in'] = true;
        header('Location: admin.php'); // เปลี่ยนเส้นทางไปยัง admin.php
        exit();
    } else {
        // แสดงข้อความผิดพลาดหากล็อกอินไม่ถูกต้อง
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IT Equipment Borrowing System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Login to Admin Panel</h2>

        <?php
        if (isset($error)) {
            echo "<div class='error-message'>$error</div>";
        }
        ?>

        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
