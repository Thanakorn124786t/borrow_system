<?php
session_start();

// ลบ session
session_unset();
session_destroy();

// เปลี่ยนเส้นทางไปยังหน้า home
header("Location: index.php");
exit();
?>
