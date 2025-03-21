<?php
session_start();
include "db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["role"] = $user["role"];
        
        if ($user["role"] == "admin") {
            header("Location: admin/admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
    } else {
        echo "เข้าสู่ระบบล้มเหลว";
    }
}
?>